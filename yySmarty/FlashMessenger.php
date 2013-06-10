<?php
/**
 * FlashMessenger
 */
class FlashMessenger
{
    /**
     * @static
     * @param string $message
     * @return void
     */

    public static function addMessage($message)
    {
        if(session_id()){
            Session::set('session_was_on',true);
        }else{
            Session::start();
            Session::set('session_was_on',false);
        }

        Session::set('flash-messenger',$message);
    }

    /**
     * @static
     * @param null|string $arr_key
     * @return string|null
     */
     public static function getMessage($arr_key=null)
     {
         if(!session_id())
         Session::start();
         $message=(is_null($arr_key))?Session::get('flash-messenger'):Session::get('flash-messenger',$arr_key);
         Session::clear_session('flash-messenger');
         /*If session was not started before Flash Messages, destroy it*/
         $session_was_on=Session::get('session_was_on');
         if($session_was_on===false){
             Session::destroy();
         }

         if($message)
           return $message;
         else
             return null;
     }
}

?>