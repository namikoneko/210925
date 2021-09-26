<?php
require_once "./trait/ImportParsedown.php";

class ChildCardShow
{
  use ImportParsedown;
  public $addedLinks = [
      ["key" => "upd", "linkUrl" => "../childupd","linkText" => "update"],
      ["key" => "del", "linkUrl" => "../childdel","linkText" => "delete"],
      ["key" => "up", "linkUrl" => "../childup","linkText" => "up"],
  ];

  public function rowExe($row)
  {
  //upd,delリンク作り
    $makelink = new LinkHtml();
    $row = $makelink->linkAddRow($row, $this->addedLinks);
  
    return $row;
  }

  public function makeHtml($row)
  {
    $parse = $this->parsedwonConf();
      //$row["text"] = ReadMore::exe($row["text"],$row["id"]);
      //global $flag;
      $flag = "{===}";
      $row["text"] = str_replace($flag, "", $row["text"]);
    $str = "";
    $str .= <<<EOD
    <div class="childcard-text">
      {$parse->text($row["text"])}
    <div class="childcard-etc">
      <div class="childcard-date-upd-up">
        NO:{$row["id"]}
        {$row["date"]}
        {$row["upd"]}
        <span class="childcard-up">
          {$row["up"]}
        </span>
      </div>

      <div class="childcard-del">
        {$row["del"]}
      </div>
    </div>
    </div>
EOD;
      echo $str;
  }
}
