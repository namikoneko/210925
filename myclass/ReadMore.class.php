<?php

class ReadMore
{
  public static function exe($text, $id)
  {
    $flag = "{===}";
    //$flag = ">>>";
    $position = mb_strpos($text, $flag);
    if($position != false)
    {
      $text = mb_substr($text, 0, $position);
      $l = new LinkHtml();
      $str = $l->makeLinkId("../childcard","read more",$id);
      $text .= $str;
      return $text;
      //echo $text;
      //return;
    }
      return $text;
      //echo $text;
  }
}
