<?php
/**
 * Created by JetBrains PhpStorm.
 * User: YWA
 * Date: 4/5/13
 * Time: 3:28 PM
 * To change this template use File | Settings | File Templates.
 */
class AddController extends Controller
{

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        //user_id,country_id,city_id,route_type,user_type,from,to,distance,price,places,date,time,observation
        Session::start();
        if(!empty($_POST)){
           $conf=new ReadConf($GLOBALS['language_file']);
           $db_user=$this->ioc->user;
           $errors=array();
           $data_array=array();
           $data_array[':user_id']=Session::get('user_id');
           $data_array[':country_abr']=$_POST['language'];
            //if route type is  city, get the id of selected city
           $data_array[':city_id']=($_POST['route_type']==2)?($_POST['city']):null;
          if(isset($_POST['route_type'])){
              $data_array[':route_type']=$_POST['route_type'];
          }

          if(isset($_POST['user_type'])){
              $data_array[':user_type']=$_POST['user_type'];
          }
         //get locations
          if(preg_match("/^[A-Za-z0-9-_,\:;\.\s]+$/",$_POST['location1'])){
              $data_array[':from']=$_POST['location1'];
            }else{
                $errors[]=$conf->getParam("location_1_error");
            }

          if(preg_match("/^[A-Za-z0-9-_,\:;\.\s]+$/",$_POST['location2'])){
              $data_array[':to']=$_POST['location2'];
           }else{
              $errors[]=$conf->getParam("location_2_error");
           }
          $data_array[':distance']=(preg_match("/^\d{1,5}$/",$_POST['distance']))?($_POST['distance']):null;
          $data_array[':price']=(preg_match("/^\d{1,4}$/",$_POST['price']))?($_POST['price']):null;

          //get the number of passagers (valid only for drivers)
          if($_POST['user_type']=="driver"){
                if(preg_match("/^\d{1,2}$/",$_POST['places'])){
                    $data_array[':places']=$_POST['places'];
                }else{
                    $errors[]=$conf->getParam("add_places_error");
                }
            }else{
                $data_array[':places']=null;
            }

           // if(isset($_POST['date']) && !empty($_POST['date'])){
            if(preg_match("/^(0?[1-9]|1[0-2])\/(0?[1-9]|[12][0-9]|3[01])\/\d{4}$/",$_POST['date'])){
              list($m,$d,$y)=explode('/',$_POST['date']);
              $data_array[':date']=sprintf("%d/%d/%d",$y,$m,$d);
            }else{
                $errors[]=$conf->getParam("add_date_error");
            }

            $data_array[':time']=(preg_match("/^(0?[0-9]|1[0-2])\:(0?[0-9]|[1-5][0-9]|60)$/",$_POST['time']))?($_POST['time']):null;
            $data_array[':observation']=(isset($_POST['observation']) && !empty($_POST['observation']))?(htmlspecialchars($_POST['observation'])):null;

            //adauga in baza de date
            if(empty($errors)){
                if($db_user->add_route($data_array)){
                    unset($_POST);
                    $message=$conf->getParam("add_success_msg");
                }else{
                    $message=array($conf->getParam("add_error_msg"));
                }
            }else{
                $message=$errors;
            }
            $this->smarty->render("add/index",array("nume"=>"carsharing","flash_messages"=>$message));
        }else{//end if !empty($_POST)
            $this->smarty->render("add/index");
        }
    }
}