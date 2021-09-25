<?php
namespace testDir;

class GetRows
{
  //private $table;

//  public function __construct($table)
//  {
//    $this->table = $table;
//  }

  public static function getAll($table)
  {
    $rows = ORM::for_table($table)->find_array();
    return $rows;
  }

  public static function getOne($table)
  {
    //$rows = ORM::for_table($table)->find_one()->as_array();
    $rows = ORM::for_table($table)->find_one();
    $rows = $rows->as_array();
    return $rows;
  }

  public function findText($table,$findStr)
  {
    $rows = ORM::for_table($table)->where_like("text","%{$findStr}%")->find_array();
    return $rows;
  }

}//class

//$table = "parent";
////$getrows = new GetRows($table);
////$rows = $getrows->getAll();
////$rows = GetRows::getAll($table);
////$rows = GetRows::getOne($table);
//$rows = GetRows::findText($table,"x");
//print_r($rows);
