<?php
class SearchController extends Controller
{
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
        Session::start();
        $db_user=$this->ioc->user;
        $latest_routes=$db_user->get_latest_routes($GLOBALS['language']);
        $this->smarty->render("search/index",array("nume"=>"carsharing","latest_routes"=>$latest_routes));
    }

    public function get_routes($lang)
    {
        $db_user=$this->ioc->user;
        $user_type=$_POST['type'];
        $table_caption="Rezultatele cautarii";
        if($user_type=='all')
        {
            $routes=$db_user-> get_latest_routes($lang);
            $table_caption="Ultimele anunturi";
        }
        else{
            $location1=$_POST['location1'];
            $location2=$_POST['location2'];
            $search_type=$_POST['select_type'];
            if($search_type==2)
                $city_id=$_POST['select_city'];
            else
                $city_id=null;
            // $date1=$_POST['date1'];
            list($m,$d,$i)=explode('/',$_POST['date1']);
            $date1=sprintf("%04d-%02d-%02d",$i,$m,$d);
            list($m,$d,$i)=explode('/',$_POST['date2']);
            $date2=sprintf("%04d-%02d-%02d",$i,$m,$d);

            $routes=$db_user->get_routes($search_type,$user_type,$location1,$location2,$date1,$date2,$lang,$city_id);
        }
        $table_header=<<<EOD
                <table class="table table-hover" id="my-table-results">
                <caption id="my-table-caption">$table_caption</caption>
                <thead>
                <tr>
                    <th>User</th>
                    <th>Plecare</th>
                    <th>Sosire</th>
                    <th>Data</th>
                    <th>Mai mult</th>
                </tr>
                </thead>
                <tbody>
EOD;
        $table_footer=<<<EOT
 </tbody>
            </table>
EOT;
        $tbody="";
        foreach($routes as $route){
            $tbody.="<tr><td>";
            if($route['user_type']=="passager"){
                $tbody.="<img src='".BASE_PATH."images/user.png'/>";
            }else{
                $tbody.="<img src='".BASE_PATH."images/cars.png'/>";
            }
            $tbody.="</td><td>".$route['from_']."</td><td>".$route['to_']."</td><td>".$route['date']."</td><td><a class=\"btn btn-small btn-success details_btn\" href=\"#\" rel='".$lang."-".$route['from_']."-".$route['to_']."-".$route['route_id']."'>Detalii</a></td></tr>";
        }
        echo $table_header.$tbody.$table_footer;
    }
}