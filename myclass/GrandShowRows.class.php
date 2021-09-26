<?php
use \ShowRows\ShowRows;

class GrandShowRows extends ParentShowRows
{
  public $addedLinks = [
      ["key" => "upd", "linkUrl" => "grandupd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "granddel","linkText" => "delete"]
  ];
  public $changedColumn = [
      ["changedColumn" => "title", "linkUrl" => "parent","linkText" => "delete"]
  ];

  public function makeHtml($rows)
  {
      $str = "";
    foreach($rows as $row)
    {
    $str .= <<<EOD
    <div class="grand-rows u-full-width">
    <div class="grand-rows-title">
      NO:{$row["id"]}
      {$row["title"]}
    </div>
    <div class="grand-rows-upd-del">
      {$row["upd"]}
      {$row["del"]}
    </div>
    </div>
EOD;
    }
      echo $str;
  }
}
