<?php

class UpdFormPartial extends InsFormPartial
{
  protected $row;
  protected $typeTextStr = <<<EOD
          <input type="text" name="nameStr" value="valStr">
EOD;
  protected $textareaStr =  <<<EOD
          <textarea name="nameStr" class="u-full-width updform-textarea">valStr</textarea>
EOD;

  public function addHiddenId($returnTags, $id)
  {
    $str = <<<EOD
        <input type="hidden" name="id" value="{$id}">
EOD;
    $returnTags["hiddenId"] = $str;
    return $returnTags;
  }

  public function addParentId($returnTags, $row)
  {
    $str = <<<EOD
        <input type="text" name="parentId" value="{$row["parentId"]}">
    EOD;
    $returnTags["parentId"] = $str;
    return $returnTags;
  }

  public function replaceValue($returnTags, $forms, $row)
  {
    foreach($forms as $formItem)
    {
      $str = $returnTags[$formItem["showKey"]];//tagを取得
      $valStr = $row[$formItem["column"]];//$rowから当該カラムの文字列を取得

      $str = str_replace("valStr", $valStr, $str);//置換
      $returnTags[$formItem["showKey"]] = $str;//returnTagsに入れ直す
    }
    return $returnTags;
  }//method

}//class
