<?php
use \ShowRows\ShowRows;

class ParentShowRows
{
  public $addedLinks = [
      ["key" => "upd", "linkUrl" => "../parentupd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "../parentdel","linkText" => "delete"]
  ];
  public $changedColumn = [
      ["changedColumn" => "title", "linkUrl" => "../child"]
  ];
  //public $showColumns = ["id","title","text","upd","del"];

  public function rowsExe($rows)
  {

  //upd,delリンク作り
    $makelink = new LinkHtml();
    $rows = $makelink->linkAdd($rows, $this->addedLinks);
  
  //titleリンク作り
    $rows = $makelink->linkChange($rows, $this->changedColumn);
  
  //表示するフィールドを選ぶ
//    $showrows = new ShowRows($rows, $this->showColumns);
//    $rows = $showrows->makeRows();
    return $rows;
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
