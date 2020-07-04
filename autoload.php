<?php 

function autoload($namespace){
    $extension = spl_autoload_extensions();
    require_once $namespace.$extension;
}

spl_autoload_extensions(".php");
spl_autoload_register(__NAMESPACE__."\autoload");

