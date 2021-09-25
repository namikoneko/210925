<?php

class GetRows
{
  private $rows;

  public static function getAll($table)
  {
    $rows = ORM::for_table($table)->find_array();
    return $rows;
  }

  public static function getOne($table, $id)
  {
    $rows = ORM::for_table($table)->find_one($id);
    return $rows;
  }

  public static function getOneArr($table, $id)
  {
    $row = ORM::for_table($table)->find_one($id);
    $row = $row->as_array();
    return $row;
  }

  public static function getRowsParentId($table,$parentId)
  {
    $rows = ORM::for_table($table)->where("parentid", $parentId)->find_array();
    return $rows;
  }

//クラスを独立させたい
  public function findText($table,$findStr)
  {
    $rows = ORM::for_table($table)->where_like("text","%{$findStr}%")->find_array();
    return $rows;
  }

}//class
