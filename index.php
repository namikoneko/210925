<?php
//use \GetRows\GetRows;

require_once '../libs/idiorm.php';
ORM::configure('sqlite:./data.db');

require_once "NsAutoloader.php";
require_once './grandPage.php';
require_once './parentPage.php';
require_once './childPage.php';

Flight::start();
