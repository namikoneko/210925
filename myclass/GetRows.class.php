<?php

class GetRows
{
  private $rows;

  public function getAll($table)
  {
    $rows = ORM::for_table($table);
    return $rows;
  }

  public static function getAllArr($table)
  {
    $rows = ORM::for_table($table)->find_array();
    return $rows;
  }

  public function getOne($table, $id)
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

  public function getRowsParentId($table,$parentId)
  {
    $rows = ORM::for_table($table)->where("parentid", $parentId);
    //$rows = ORM::for_table($table)->where("parentid", $parentId)->order_by_asc("title")->find_array();
    return $rows;
  }

  public static function getRowsParentIdArr($table,$parentId)
  {
    $rows = ORM::for_table($table)->where("parentid", $parentId)->find_array();
    return $rows;
  }

  public function orderBy($rows, $column)
  {
    $rows = $rows->order_by_asc($column);
    return $rows;
  }

  public function orderByArr($rows, $column)
  {
    $rows = $rows->order_by_asc($column)->find_array();
    return $rows;
  }

  public function orderByDesc($rows, $column)
  {
    $rows = $rows->order_by_desc($column);
    return $rows;
  }

  public function orderByDescArr($rows, $column)
  {
    $rows = $rows->order_by_desc($column)->find_array();
    return $rows;
  }

  public function makeAsArr($rows)
  {
    $rows = $rows->as_array();
    return $rows;
  }

  public function findText($table,$findStr)
  {
    $rows = ORM::for_table($table)->where_like("text","%{$findStr}%")->find_array();
    return $rows;
  }

}//class
