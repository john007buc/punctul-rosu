<?php
class Admin
{

    public $db_link;
    public function __construct($db)
    {
        $this->db_link=$db;
    }

    public function getCountries()
    {

       $st= $this->db_link->query("select country_id,abr from countries");
        $rows=$st->fetchAll();

        $smarty_options=array();
        foreach($rows as $row)
        {
            $id=$row['country_id'];
            $abr=$row['abr'];
            $smarty_options[$id]=$abr;
        }

        return $smarty_options;

    }

    public function getCategories($lang_id)
    {
        $st=$this->db_link->prepare("select category_id,category from q_categories where language_id=:lang_id");
        $st->bindParam(":lang_id",$lang_id,PDO::PARAM_INT);
        $st->execute();
        $rows=$st->fetchAll();
        $st->closeCursor();
        if(count($rows)>0)
            return $rows;
        else
            return null;

    }

    public function getQuestions($lang_id,$cat_id)
    {

        $st=$this->db_link->prepare("select q.*,GROUP_CONCAT(v.variant SEPARATOR ',') as variants from questions as q INNER JOIN variants as v ON q.question_id=v.question_id and country_id=:country_id and category_id=:category_id GROUP BY q.question_id ");
        $st->bindParam(':country_id',$lang_id,PDO::PARAM_INT);
        $st->bindParam(':category_id',$cat_id,PDO::PARAM_INT);
        $st->execute();
        return $st->fetchAll();

    }

    public function addCategory($category,$language_id)
    {
        try{
            $st=$this->db_link->prepare("insert into q_categories(language_id,category) values(:language_id,:category)");
            $st->bindParam(":language_id",$language_id,PDO::PARAM_INT);
            $st->bindParam(":category",$category,PDO::PARAM_STR);
            if($st)
            {
                $result=$st->execute();
                if($result)
                    return true;
                else
                    return false;
            } else{
                return false;
            }

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return false;
        }
    }
    public function updateCategory($category_id,$category,$language_id)
    {
        try{
            $st=$this->db_link->prepare("update q_categories set category=:category where category_id=:category_id and language_id=:language_id");
            $st->bindParam(":language_id",$language_id,PDO::PARAM_INT);
            $st->bindParam(":category_id",$category_id,PDO::PARAM_INT);
            $st->bindParam(":category",$category,PDO::PARAM_STR);
            if($st)
            {
                $result=$st->execute();
                if($result)
                    return true;
                else
                    return false;
            } else{
                return false;
            }

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return false;
        }
    }

    public function add_question($question,$points,$discount,$country_id,$category,$variants_array)
    {

        try{
            $st=$this->db_link->prepare("insert into questions (question,points,discount,country_id,category_id) values(:question,:points,:discount,:country_id,(SELECT category_id FROM q_categories where category=:category))");
            $st->bindParam(":question",$question,PDO::PARAM_STR);
            $st->bindParam(":points",$points,PDO::PARAM_INT);
            $st->bindParam(":discount",$discount,PDO::PARAM_INT);
            $st->bindParam(":country_id",$country_id,PDO::PARAM_INT);
            $st->bindParam(":category",$category,PDO::PARAM_STR);
            if($st){
               $result= $st->execute();
                if($result)
                {
                    $last_insert_id=$this->db_link->lastInsertId();

                    $this->add_variants($last_insert_id,$variants_array);

                }

            }

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }




    }

    public function update_question($question_id,$question,$points,$discount,$category,$variants_array)
    {

        try{
            $st=$this->db_link->prepare("update questions set question=:question,points=:points,discount=:discount,category_id=(SELECT category_id FROM q_categories where category=:category) where question_id=:question_id");
            $st->bindParam(":question_id",$question_id,PDO::PARAM_INT);
            $st->bindParam(":question",$question,PDO::PARAM_STR);
            $st->bindParam(":points",$points,PDO::PARAM_INT);
            $st->bindParam(":discount",$discount,PDO::PARAM_INT);
            $st->bindParam(":category",$category,PDO::PARAM_STR);

           if($st){
                $result= $st->execute();
                if($result)
                {
                    if($this->remove_variants($question_id))
                    $this->add_variants($question_id,$variants_array);
                }

            }

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }

    }

    public function remove_variants($question_id)
    {
        return $this->db_link->exec("DELETE from variants where question_id={$question_id}");


    }

    public function add_variants($question_id,$variants_array)
    {

        $insert_variants_query="insert into variants (question_id,variant) values ";

        for($i=1;$i<=count($variants_array);$i++)
        {

            $insert_variants_query.="({$question_id},?),";
        }

        $insert_variants_query=substr($insert_variants_query,0,-1);

        $st=$this->db_link->prepare($insert_variants_query);
        $j=0;
        foreach($variants_array as $variant)
        {
            $j++;
            $st->bindValue($j,$variant,PDO::PARAM_STR);
        }
        $st->execute();


    }

    public function delete_question($question_id)
    {
        return $this->db_link->exec("DELETE from questions where question_id={$question_id}");


    }
    public function delete_category($cat_id)
    {
        return $this->db_link->exec("DELETE from q_categories where category_id={$cat_id}");


    }

    public function get_news($lang_id){
        try{
            $st=$this->db_link->prepare("select news_id,language_id,title,CONCAT(SUBSTRING(news,1,800),'.....')as news,date_posted from news where language_id=:language_id ORDER BY date_posted DESC");
            $st->bindParam(":language_id",$lang_id,PDO::PARAM_INT);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            return $st->fetchAll();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function add_news($language_id,$title,$news_body)
    {

        try{
            $st=$this->db_link->prepare("insert into news (language_id,title,news) values(:language_id,:title,:news)");
            $st->bindParam(":language_id",$language_id,PDO::PARAM_INT);
            $st->bindParam(":title",$title,PDO::PARAM_STR);
            $st->bindParam(":news",$news_body,PDO::PARAM_STR);
            $result=$st->execute();
            $st->closeCursor();
            if($result)
                return $this->db_link->lastInsertId();
            else
                return null;

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return false;
        }

    }
    public function update_news($news_id,$language_id,$title,$news_body)
    {

        try{
            $st=$this->db_link->prepare("update news SET language_id=:language_id,title=:title,news=:news where news_id=:news_id");
            $st->bindParam(":news_id",$news_id,PDO::PARAM_INT);
            $st->bindParam(":language_id",$language_id,PDO::PARAM_INT);
            $st->bindParam(":title",$title,PDO::PARAM_STR);
            $st->bindParam(":news",$news_body,PDO::PARAM_STR);
            $result=$st->execute();
            $st->closeCursor();
            return $result;

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
            return false;
        }

    }
    public function delete_news($news_id)
    {
        return $this->db_link->exec("delete from news where news_id={$news_id}");

    }

    public function get_one_news($news_id)
    {

        try{
            $st=$this->db_link->prepare("select * from news where news_id=:news_id");
            $st->bindParam(":news_id",$news_id,PDO::PARAM_INT);
            $st->execute();
            $st->setFetchMode(PDO::FETCH_ASSOC);
            return $st->fetchAll();

        }catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }


    }






}

?>