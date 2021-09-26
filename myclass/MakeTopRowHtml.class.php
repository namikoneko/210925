<?php

class MakeTopRowHtml
{
  public static function makeHtml($row)
  {
    $str = "";
    $str .= <<<EOD
    <div class="top-row-title u-full-width">
      <h3>
        {$row["title"]}
      </h3>
    </div>
    EOD;
    echo $str;
  }

  public static function grandTitle()
  {
    $str = "";
    $str .= <<<EOD
    <div class="top-row-title u-full-width grand-title">
      <h3>
        grand page
      </h3>
    </div>
    EOD;
    echo $str;
  }
//    $str .= "<h3>";
//    $str .= $row["title"];
//    $str .= "</h3>";
}
