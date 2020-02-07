<?php 
class BDD 
{
    protected static $_instance=null;
    static function getConnection(){
        if(is_null(self::$_instance)){
            $user='root';
            $pass ='0000';
            self::$_instance= new PDO('mysql:host=localhost;dbname=agendaevents', $user, $pass);
        }
      
        return self::$_instance;
    }
}