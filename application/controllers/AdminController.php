<?php
class AdminController extends Controller
{


    public function __construct()
    {

        parent::__construct();

    }

    public function index()
    {

        $this->smarty->render("admin/index",array("name"=>"John"));

    }

    public function categorii($questions_language=null,$category=null)
    {

        $db_admin=$this->ioc->admin;
        $countries=$db_admin->getCountries();
        $countries_flip=array_flip($countries);
        $country=($questions_language!=null)?($questions_language):"ro";
        $selected_country_id=$countries_flip[$country];

        /****stabileste tagul option cu atributul selected=selected din lista <select> cu tari****/

         $categories=$db_admin->getCategories($selected_country_id);


        /****Daca este trimis paramterul $category, selecteaza id-ul pentru aceasta categorie****/

        /**** Categoria implicita este prima din lista****/
        $selected_category_id=$categories[0]['category_id'];
        $selected_category=$categories[0]['category'];

        if($category!=null)
        {

            foreach($categories as $cat)
            {
                if($cat["category"]==$category)
                {
                    $selected_category_id=$cat["category_id"];
                    $selected_category=$category;
                    break;
                }
            }

        }


         /*****selecteaza intrebarile din categoria selectata*********/

         $questions=$db_admin->getQuestions($selected_country_id,$selected_category_id);


         $this->smarty->render("admin/categories",array(
                                                         "countries"=>$countries,
                                                         "selected_country"=>$selected_country_id,
                                                         "categories"=>$categories,
                                                         "questions"=>$questions,
                                                         "selected_category_id"=>$selected_category_id,
                                                         "selected_category"=>$selected_category)
                                                        );
    }

//    public function ajax($scope)
//    {
//        //IN CAZ DE EROARE SE RETURNEAZA "*ERROR*"
//        $db_admin=$this->ioc->admin;
//
//        /**** Sectiune pentru adaygare si update categorii *****/
//        /*************************************************************************************************/
//        if($scope=="add_category")
//        {
//            if($_POST['Submit']=="Salveaza" && $_POST['category']!="" && is_numeric($_POST['language']))
//            {
//                $response=$db_admin->addCategory($_POST['category'],$_POST['language']);
//                if($response)
//                {
//                    echo "Categorie adaugata";
//                }
//                else
//                {
//                    echo "*ERROR*";
//                }
//            }
//        }elseif($scope=="update_category"){
//
//            if($_POST['Submit']=="Modifica" && $_POST['category']!="" && is_numeric($_POST['language']))
//            {
//                $response=$db_admin->updateCategory($_POST['category_id'],$_POST['category'],$_POST['language']);
//                if($response)
//                {
//                    echo "Categorie adaugata";
//                }
//                else
//                {
//                    echo "*ERROR*";
//                }
//            }
//            /*************************************************************************************************/
//        } elseif($scope=="question")
//        {
//            $errors=array();
//            if(isset($_POST['language'])&& !empty($_POST['language']))
//            {
//                $language=$_POST['language'];
//            }else{
//                array_push($errors,"- Limba curenta lipsa");
//            }
//
//            if(isset($_POST['category'])&& !empty($_POST['category']))
//            {
//                 $category=$_POST['category'];
//            }else{
//               array_push($errors,"- Categorie lipsa");
//             }
//
//
//            if(isset($_POST['question'])&& !empty($_POST['question']))
//            {
//                $question=$_POST['question'];
//            }else{
//                array_push($errors,"- Adauga intrebarea");
//            }
//
//            if(isset($_POST['punctaj'])&& is_numeric($_POST['punctaj']))
//            {
//                $punctaj=$_POST['punctaj'];
//            }else{
//                array_push($errors,"- Adauga punctajul");
//            }
//
//            if(isset($_POST['discount'])&& is_numeric($_POST['discount']))
//            {
//                $discount=$_POST['discount'];
//            }else{
//                array_push($errors,"- Adauga discount");
//            }
//
//
//            if(isset($_POST['variant'])&& count($_POST['variant'])>0 && count(array_filter($_POST['variant'],array("Helpers","filter_variants")))==0)
//            {
//                $variant_array=$_POST['variant'];
//            }else{
//                array_push($errors,"- Adauga varianta");
//            }
//
//            if(!empty($errors))
//                echo implode($errors,"</br>");
//            else{
//
//                if($_POST['Submit']=="Modifica")
//                {
//                    $question_id=end(explode('_',$_POST['question_id']));
//
//                    $db_admin->update_question($question_id,$question,$punctaj,$discount,$category,$variant_array);
//                    echo "OK";
//
//                }else if($_POST['Submit']=="Salveaza")
//                {
//
//                   $db_admin->add_question($question,$punctaj,$discount,$language,$category,$variant_array);
//
//
//                }
//
//            }
//
//        }elseif($scope=="delete_question")
//        {
//             $db_admin->delete_question(end(explode('_',$_POST['id'])));
//
//        }elseif($scope=="delete_category")
//        {
//            $db_admin->delete_category($_POST['id']);
//
//        }elseif($scope=="add_news")
//        {
//           $language_id= (isset($_POST['language_id'])?($_POST['language_id']):null);
//           $article=((isset($_POST['article'])?($_POST['article']):null));
//           $language=((isset($_POST['language'])?($_POST['language']):null));
//
//            if($language_id && $article)
//            {
//                require_once ('../application/libraries/Zend/Search/Lucene.php') ;
//                try
//                {
//                    $lucene_index = Zend_Search_Lucene::open($GLOBALS['index_path']);
//                }catch(Zend_Search_Lucene_Exception $e)
//                {
//                    $lucene_index = Zend_Search_Lucene::create($GLOBALS['index_path']);
//                }
//
//
//                $myHelper=new Helpers();
//                list($title,$body)=$myHelper->token_news($_POST['article']);
//
//                $news_id=$db_admin->add_news($language_id,$title,$body);
//
//                if($news_id)
//                {
//
//                    $doc = new Zend_Search_Lucene_Document();
//                    //$titleUrl=str_replace(' ','-',$title);
//                     $title_url=str_replace(" ","-",$title);
//                      $title_url.="-".$news_id;
//                    $docUrl= BASE_PATH."{$language}/news/details/{ $title_url}";
//                    $doc->addField(Zend_Search_Lucene_Field::UnIndexed('url', $docUrl));
//                    $doc->addField(Zend_Search_Lucene_Field::keyword('news_id', $news_id));
//                    $doc->addField(Zend_Search_Lucene_Field::Text('title',$title));
//                    $doc->addField(Zend_Search_Lucene_Field::UnStored('contents', $body));
//                    $lucene_index->addDocument($doc);
//                    $lucene_index->commit();
//                    echo "The article was added succefully";
//                }
//                else{
//                    echo "*ERROR*</br>Articolul nu a putut fi adaugat.Contacteaza administratorul";
//                }
//            }
//
//
//        }elseif($scope=="delete_news"){
//
//            if($db_admin->delete_news($_POST['news_id']))
//            {
//                echo "Articolul a fost sters din baza de date";
//            }
//            else{
//                echo "*ERROR*<BR/>Eroare la stergerea articolului.contactati administratorul";
//            }
//        }elseif($scope=="get_one_news")
//        {
//
//            $news_id=$_POST['news_id'];
//            $news=$db_admin->get_one_news($news_id);
//
//            $title='<h2 style="text-align:center">[['.$news[0]['title'].']]</h2>';
//            $body=$news[0]['news'];
//            echo $title.$body;
//        }elseif($scope=="update_news"){
//            $news_id=$_POST['news_id'];
//            $language_id= (isset($_POST['language_id'])?($_POST['language_id']):null);
//            $article=((isset($_POST['article'])?($_POST['article']):null));
//
//            if($language_id && $article)
//            {
//                $myHelper=new Helpers();
//                list($title,$body)=$myHelper->token_news($_POST['article']);
//                if($db_admin->update_news($news_id,$language_id,$title,$body))
//                {
//                    echo "The article was updated succefully";
//                }
//                else{
//                    echo "*ERROR*</br>Articolul nu a putut fi modificat.Contacteaza administratorul";
//                }
//            }
//
//        }
//
//    }*/

    public function news($language=null)
    {
        //select language and language id
        $db_admin=$this->ioc->admin;
        $countries=$db_admin->getCountries();
        $countries_flip=array_flip($countries);
        $country=($language!=null)?($language):"ro";
        $selected_country_id=$countries_flip[$country];

        //GETTING NEWS
        $news=$db_admin->get_news($selected_country_id);
        //var_dump($news);







        $this->smarty->render("admin/news",array(
                "name"=>"Administrator",
                "countries"=>$countries,
                "selected_country"=>$selected_country_id,
                "news"=>$news
                )
        );



    }











}

?>