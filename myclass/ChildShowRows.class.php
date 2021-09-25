<?php

class ChildShowRows
{
  public $addedLinks = [
      ["key" => "upd", "linkUrl" => "../upd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "../del","linkText" => "delete"]
  ];

  public $addedLinksChild = [
      ["key" => "upd", "linkUrl" => "../childupd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "../childdel","linkText" => "delete"]
  ];
//  public $changedColumn = [
//      ["changedColumn" => "title", "linkUrl" => "child","linkText" => "delete"]
//  ];
//  public $showColumns = ["id","title","text","upd","del"];

  public function rowExe($row)
  {
  //upd,delリンク作り
    $makelink = new LinkHtml();
    $row = $makelink->linkAddRow($row, $this->addedLinks);
  
  //titleリンク作り
//    $rows = $makelink->linkChange($rows, $this->changedColumn);
  
  //表示するフィールドを選ぶ
//    $showrows = new ShowRows($rows, $this->showColumns);
//    $rows = $showrows->makeRows();
    return $row;
    //return ["aab"];
  }

  public function rowsExe($row)
  {
  //upd,delリンク作り
    $makelink = new LinkHtml();
    $row = $makelink->linkAdd($row, $this->addedLinksChild);
    return $row;
  }

//作成予定
//  public function makeHtml()
//  {
//    $formTags = $this->exe();
//    $formHtml = "";
//    $formHtml .= $formTags["top"];
//    $formHtml .= $formTags["title"];
//    $formHtml .= $formTags["text"];
//    $formHtml .= $formTags["submit"];
//    $formHtml .= $formTags["end"];
//    return $formHtml;
//  }
}
