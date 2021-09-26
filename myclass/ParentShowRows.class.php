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

  public function makeHtml($rows)
  {
      $str = "";
    foreach($rows as $row)
    {
    $str .= <<<EOD
    <div class="parent-rows u-full-width">
    <div class="parent-rows-title">
      NO:{$row["id"]}
      {$row["title"]}
    </div>
    <div class="parent-rows-upd-del">
      {$row["upd"]}
      {$row["del"]}
    </div>
    </div>
EOD;
    }
      echo $str;
  }
}
