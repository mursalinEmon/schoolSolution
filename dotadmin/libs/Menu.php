<?php
class Menu{
    public static function getmenu(){
        return array(
            0=>array("menu"=>"Home","link"=>URL),
            1=>array("menu"=>"Products","link"=>URL."products"),
            2=>array("menu"=>"Photo Gallery","link"=>URL."home/photogallery"),
            3=>array("menu"=>"Login","link"=>URL."ecomlogin"),
        );
    }
}