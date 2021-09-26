<?php

class ParentInsForm
{
  public $forms;
  public $actionUrl;
  private $parentId;

  public function __construct($parentId)
  {
    $this->forms = ParentForms::$forms;
    $this->actionUrl = "../parentinsexe";
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
//    $formHtml .= $formTags["parentId"];
//    $formHtml .= $formTags["title"];
//    $formHtml .= $formTags["text"];
//    $formHtml .= $formTags["submit"];
//    $formHtml .= $formTags["end"];
//    echo $formHtml;
