<?php
require_once "./trait/ImportParsedown.php";

class ChildShowRows
{
  use ImportParsedown;
  public $addedLinks = [
      ["key" => "upd", "linkUrl" => "../upd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "../del","linkText" => "delete"]
  ];

  public $addedLinksChild = [
      ["key" => "upd", "linkUrl" => "../childupd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "../childdel","linkText" => "delete"],
      ["key" => "up", "linkUrl" => "../childup","linkText" => "up"],
      ["key" => "card", "linkUrl" => "../childcard","linkText" => "card"],
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

  public function makeHtml($rows)
  {
    $parse = $this->parsedwonConf();
      $str = "";
    foreach($rows as $row)
    {
      $row["text"] = $parse->text($row["text"]);
      $row["text"] = ReadMore::exe($row["text"],$row["id"]);
    $str .= <<<EOD
    <div class="child-rows-text u-full-width">
      {$row["text"]}
    <div class="child-rows-date-etc">
      <div class="child-rows-date-upd-up-card">
        NO:{$row["id"]}
        {$row["date"]}
        {$row["upd"]}
      <span class="child-rows-up">
        {$row["up"]}
      </span>
        {$row["card"]}
      </div>
      <div class="child-rows-del">
        {$row["del"]}
      </div>
    </div>

    </div>
      <br>
EOD;
      //{$parse->text($row["text"])}
    }
      echo $str;
  }
//      //$str .= "<p>";
//      $str .= $row["text"];
//      $str .= "<br>";
//      $str .= $row["date"];
//      $str .= "  ";
//      $str .= $row["upd"];
//      $str .= "  ";
//      $str .= $row["del"];
//      $str .= "<br>";
//      //$str .= "</p>";
}
