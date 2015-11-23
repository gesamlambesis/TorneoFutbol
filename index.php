<?php

    require_once("config.php");
    require_once("autoload.php");
    require_once("utils/errorLogging.php");

    /*use libs\CookieUtils;
   // echo "<pre>";
    $obj = new CookieUtils();
    //var_dump($obj->getAllCookies());

    $obj->set("preferencia", "pepe");
    $obj->set("color", "negro");
    $obj->set("credenciales", sha1("pepe"."#!#$F3"));*/

   // var_dump($obj->getAllCookies());
    //echo $obj->get("preferencia");






    $url = ( isset($_GET['url']) ) ? $_GET['url'] : "Main/index"; 
    //echo $url."</br>";
    //Dividiendo la url
    $url = explode("/", $url);
    //print_r($url);

    $controller = ( isset($url[0]) ) ? $url[0] : "Main";

    $method = ( isset($url[1]) ) ? $url[1] : "index";
    
    //Si me enviaron parametros en la peticion por GET los guardo en $params
    $params=array();
    for($i=2;$i < count($url);$i++){
        $params[]=$url[$i];
    }
    //Le agrego los parametros enviados por POST
    $params=array_merge($params, $_POST);
    


    $controller_path = "./controllers/".$controller.".php";
    
    if(file_exists($controller_path)){
        require_once($controller_path);
        $controller = "controllers\\".$controller;
        $controlador = new $controller();

        if(method_exists($controlador, $method)){
            if( count($params)>0 ){
                //Ejecuto el metodo del controlador con los parametros si se enviaron en la peticion
                $controlador->$method($params);
            }
            else{
                //Ejecuto el metodo del controlador sin parametros
                $controlador->$method();
            }
        }
        else{
            //Invocando al controlador que genera las paginas de errores
            libs\View::renderErrors(array("No existe el metodo ".$method." en el controlador ".$controller));
            
        }
            
    }
    else{
        libs\View::renderErrors(array("Error procesando la petición: No existe el controlador $controller a ejecutar")); 
    }
        
?>