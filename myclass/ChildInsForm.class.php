<?php

class ChildInsForm
{
  public $forms;
  public $actionUrl;
  private $parentId;

  public function __construct($parentId)
  {
    $this->forms = ChildForms::$forms;
    $this->actionUrl = "../childinsexe";
    $this->parentId = $parentId;
  }

  public function exe()
  {
  //部分タグの作成
    $insformpartial = new InsFormPartial();
    $formPartialTags = $insformpartial->exe($this->forms);
    $formPartialTags = $insformpartial->addHiddenParentId($formPartialTags, $this->parentId);
    
    $formTags = MakeForm::exe($formPartialTags,$this->actionUrl);
    return $formTags;
  }

  public function makeHtml()
  {
    $row = $this->exe();
    $str = "";
    $str .= <<< EOD
    {$row["top"]}
    {$row["parentId"]}
      {$row["text"]}
      {$row["submit"]}
    {$row["end"]}
    EOD;
    echo $str;
  }
//    $str .= $formTags["top"];
//    $str .= $formTags["parentId"];
//    $str .= "<div>";
//    $str .= $formTags["title"];
//    $str .= $formTags["text"];
//    $str .= $formTags["submit"];
//    $str .= "</div>";
//    $str .= $formTags["end"];
}
