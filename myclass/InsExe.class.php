<?php

class InsExe
{
  protected $row;

  public function createExe($forms, $table)
  {
    $this->createRow($table);
    $this->exe($forms);
  }

  private function createRow($table)
  {
    $this->row = ORM::for_table($table)->create();
  }

  private function exe($forms)
  {
    foreach($forms as $formItem)
    {
      $name = $formItem["name"];
      $column = $formItem["column"];
      $this->row->$column = Flight::request()->data->$name;
    }//foreach
      $this->row->date = date("Y-m-d");
      $this->row->updated = time();
      $this->row->save();
  }
}//class
