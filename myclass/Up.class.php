<?php

class Up
{
  public static function exe($table, $id)
  {
    $row = ORM::for_table($table)->find_one($id);
    $row->updated = time();
    $row->save();
  }//method
}//class
