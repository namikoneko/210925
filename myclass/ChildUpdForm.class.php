<?php

class ChildUpdForm extends ParentUpdForm
{
  public $id;
  public $row;
  public $forms;
  public $actionUrl;

  public function __construct($id, $row)
  {
    $this->id = $id;
    $this->row = $row;
    $this->forms = ChildForms::$forms;
    $this->actionUrl = "../childupdexe";
  }

  public function makeHtml()
  {
    $formTags = $this->exe();
    $formHtml = "";
    $formHtml .= $formTags["top"];
    $formHtml .= $formTags["hiddenId"];
    $formHtml .= $formTags["title"];
    $formHtml .= $formTags["text"];
    $formHtml .= $formTags["submit"];
    $formHtml .= $formTags["end"];
    return $formHtml;
  }
}
