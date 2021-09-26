<?php
//use \GetRows\GetRows;

require_once '../libs/idiorm.php';
ORM::configure('sqlite:./data.db');
require_once '../libs/Parsedown.php';
//require_once "./trait/ImportParsedown.php";

require_once "NsAutoloader.php";
require_once './grandPage.php';
require_once './parentPage.php';
require_once './childPage.php';
require_once './childCardPage.php';

Flight::route("/test", function(){
  echo "test!";
  $gr = new GetRows();
  $row = $gr->getOneArr("parent",1);
  print_r($row);
});

Flight::start();
