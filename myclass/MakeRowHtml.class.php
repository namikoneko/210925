<?php

class MakeTopRowHtml
{
  public static function makeHtml($row)
  {
    $str = "";
    $str .= $row["title"];
    return $str;

}
