<?php

class GrandInsForm
{
  public $forms;
  public $actionUrl;
  private $parentId;

  public function __construct()
  {
    $this->forms = GrandForms::$forms;
    $this->actionUrl = "./grandinsexe";
  }

  public function exe()
  {
  //部分タグの作成
    $insformpartial = new InsFormPartial();
    $formPartialTags = $insformpartial->exe($this->forms);
    
    $formTags = MakeForm::exe($formPartialTags,$this->actionUrl);
    return $formTags;
  }

  public function makeHtml()
  {
    $formTags = $this->exe();
    $formHtml = "";
    $formHtml .= $formTags["top"];
    $formHtml .= $formTags["title"];
    $formHtml .= $formTags["text"];
    $formHtml .= $formTags["submit"];
    $formHtml .= $formTags["end"];
    return $formHtml;
  }
}
