<?php

class UpdExe
{
  protected $row;

  public function getRow($table)
  {
    $id = Flight::request()->data->id;
    $row = GetRows::GetOne($table, $id);
    return $row;
  }

  public function exe($forms,$table)
  {
    $row = $this->getRow($table);
    //return $row;
    foreach($forms as $formItem)
    {
      $name = $formItem["name"];
      $column = $formItem["column"];
      //return Flight::request()->data->$name;
      $row->$column = Flight::request()->data->$name;
    }//foreach
      $row->save();
  }
}//class

//$forms = [
//    //["type" => "typeText", "name" => "xxx", "column" => "xxy"],
//    ["type" => "typeText", "name" => "title", "column" => "title"],
//    ["type" => "textarea", "name" => "text", "column" => "text"]
//];
//$insexe = new InsExe($forms);
//$rows = $insrow->output();
//echo $rows[0]["title"];
//echo $rows[1]["title"];
//echo $rows[2]["title"];
