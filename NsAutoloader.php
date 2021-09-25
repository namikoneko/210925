<?php

spl_autoload_register(function($fqcn){
  if($fqcn === "Flight" or substr($fqcn,0,6) === "flight"){
    require_once '../libs/flight/Flight.php';
    return;
  }
  idiorm($fqcn);
});

function idiorm($fqcn){
  if($fqcn === "ORM"){
    require_once '../libs/idiorm.php';
    ORM::configure('sqlite:./data.db');
    return;
  }
  myclass($fqcn);
}

function myclass($fqcn){
//    echo $fqcn;
  $prefix = '/Library/WebServer/Documents/210923/myclass/';
  $nsPos = strripos($fqcn, '\\');
  if($nsPos === false){
    $path = $prefix.$fqcn.'.class.php';
  }else{
    $ns = substr($fqcn, 0, $nsPos);
    $scn = substr($fqcn, $nsPos + 1);
    $path = $prefix.str_replace('\\', '/', $ns).'/'.$scn.'.class.php';
  }
    require_once $path;
    //echo $fqcn;
}
