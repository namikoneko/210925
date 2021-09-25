<?php

class Del
{
  public static function exe($table, $id)
  {
    $row = ORM::for_table($table)->find_one($id);
    $row->delete();
  }//method
}//class
