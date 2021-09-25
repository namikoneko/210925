<?php

class InsFormPartial
{
  //protected $str;
  protected $strArray = [];

  protected $typeTextStr = <<<EOD
    <input type="text" name="nameStr">
EOD;

  protected $textareaStr =  <<<EOD
    <textarea name="nameStr"></textarea>
EOD;

  protected $checkboxStr =  <<<EOD
    <input type="checkbox" name="nameStr">
EOD;

  public function exe($forms)
  {
    $str = "";
    foreach($forms as $formItem){
      $str = $this->formTypeText($formItem);
      $returnTags[$formItem["showKey"]] =  $str;
    }//foreach
    return $returnTags;
  }//method

  protected function formTypeText($formItem)
  {
    if($formItem["type"] == "typeText"){
      $str = $this->typeTextStr;
      $str = $this->replaceName($formItem, $str);
      return $str;
    }//if
    $str = $this->formTextArea($formItem);
    return $str;
  }//method

  protected function formTextArea($formItem)
  {
    if($formItem["type"] == "textarea"){
      $str = $this->textareaStr;
      $str = $this->replaceName($formItem, $str);
      return $str;
    }//if
    $str = $this->formCheckbox($formItem);//コンストラクタに置くと上書きされる
    return $str;
  }//method

  protected function formCheckbox($formItem)
  {
    if($formItem["type"] == "checkbox"){
      $str = $this->textareaStr;
      $str = $this->replaceName($formItem, $str);
      return $str;
    }//if
  }//method

  protected function replaceName($formItem, $str)
  {
    $str = str_replace("nameStr",$formItem["name"],$str);
    return $str;
  }//method

  public function addHiddenParentId($returnTags, $parentId)
  {
    $str = <<<EOD
        <input type="hidden" name="parentId" value="{$parentId}">
EOD;
    $returnTags["parentId"] = $str;
    return $returnTags;
  }

}
