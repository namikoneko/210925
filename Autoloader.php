<?php

spl_autoload_register(function($name){
  if($name === "Flight" or substr($name,0,6) === "flight"){
    require_once '../libs/flight/Flight.php';
    return;
  }
  idiorm($name);
});

function idiorm($name){
  if($fqcn === "ORM"){
    require_once '../libs/idiorm.php';
    ORM::configure('sqlite:./data.db');
    return;
  }
  myclass($name);
}

  function myclass($name){
    require_once "./myclass/{$name}.class.php";
  }
