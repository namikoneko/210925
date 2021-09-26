<?php

//class ParentUpdForm extends ParentInsForm
class ParentUpdForm
{
  public $id;
  public $row;
  public $forms;
  public $actionUrl;

  public function __construct($id, $row)
  {
    $this->id = $id;
    $this->row = $row;
    $this->forms = ParentForms::$forms;
    $this->actionUrl = "../parentupdexe";
  }

  public function exe()
  {
    $updformpartial = new UpdFormPartial();
    $formPartialTags = $updformpartial->exe($this->forms);
    $formPartialTags = $updformpartial->addHiddenId($formPartialTags, $this->id);
    $formPartialTags = $updformpartial->addParentId($formPartialTags, $this->row);
    $formPartialTags = $updformpartial->replaceValue($formPartialTags, $this->forms, $this->row);
    //print_r($formPartialTags);

    $formTags = MakeForm::exe($formPartialTags,$this->actionUrl);
    return $formTags;

//    $formHtml = $this->makeHtml($formTags);
//    return $formHtml;
  }

  public function makeHtml()
  {
    $row = $this->exe();
    $str = "";
    $str .= <<< EOD
    {$row["top"]}
    {$row["hiddenId"]}
    grandテーブルのid:{$row["parentId"]}
      {$row["title"]}
      {$row["submit"]}
    {$row["end"]}
    EOD;
    echo $str;
  }
}
//    $formTags = $this->exe();
//    $formHtml = "";
//    $formHtml .= $formTags["top"];
//    $formHtml .= $formTags["hiddenId"];
//    $formHtml .= $formTags["title"];
//    $formHtml .= $formTags["text"];
//    $formHtml .= $formTags["submit"];
//    $formHtml .= $formTags["end"];
//    return $formHtml;
