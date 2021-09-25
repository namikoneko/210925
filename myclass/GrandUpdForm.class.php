<?php

//class GrandUpdForm
class GrandUpdForm extends ParentUpdForm
{
  public function __construct($id, $row)
  {
    $this->id = $id;
    $this->row = $row;
    $this->forms = GrandForms::$forms;
    $this->actionUrl = "../grandupdexe";
  }
}
