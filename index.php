<?php
//include_once "vendor/autoload.php";
include_once "autoload.php";
include_once "config.php";

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);
// URL Amigavel - Ver .htaccess
//Exemplo de como funciona URL:product/newproduct/query(opcional)
// URL Controller/Method/Params
if (empty($url)) {
    header("Location:".BASE_URL."/Views/home.php");
}else{
    $url = explode("/", $url);
    $options['Controller'] = ucfirst($url[0]);
    $options['Method'] = $url[1];
    $options['Params'] = array();
    if (isset($url[2])) {
        $options['Params'] = explode(",",$url[2]);
    }
    $namespace = "Controllers\\";
    $classPath = $namespace . $options['Controller'] . "Controller";
    
    if(!call_user_func_array(array(new $classPath, $options['Method']), $options["Params"])){
        header("Location:" . BASE_URL);
    }else{
        header("Location:" . BASE_URL);
    }
}


