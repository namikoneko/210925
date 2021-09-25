<?php

class LinkHtml
{
  public function linkChange($rows, $columns)
  {
    $i = 0;
    foreach($rows as $row)
    {
      foreach($columns as $column)
      {
        $rows[$i][$column["changedColumn"]] = $this->makeLinkId($column["linkUrl"], $row[$column["changedColumn"]], $row["id"]);
      }
      $i++;
    }
    return $rows;
  }

  public function linkAdd($rows, $columns)
  {
    $i = 0;
    foreach($rows as $row)
    {
      foreach($columns as $column)
      {
        $rows[$i][$column["key"]] = $this->makeLinkId($column["linkUrl"], $column["linkText"], $row["id"]);
      }
      $i++;
    }
    return $rows;
  }

  public function linkAddRow($row, $columns)
  {
      foreach($columns as $column)
      {
        $row[$column["key"]] = $this->makeLinkId($column["linkUrl"], $column["linkText"], $row["id"]);
      }
      return $row;
  }

  public function makeLinkId($linkUrl, $linkText, $id)
  {
    $hrefStr = $this->makeHrefId($linkUrl, $id);
    $str = "<a href='". $hrefStr ."'>{$linkText}</a>";
    return $str;
  }

  private function makeHrefId($linkUrl, $id)
  {
    $str = "";
    $str .= "./{$linkUrl}/";
    $str .= $id;
    return $str;
  }//method

  public function makeToParentLink($linkUrl, $linkText, $id)
  {
    $table = "parent";
    $row = GetRows::getOneArr($table, $id);
    $parentId = $row["parentId"];
    $str = $this->makeLinkId($linkUrl, $linkText, $parentId);
    return $str;
  }

  public static function makeLink($linkUrl, $linkText)
  {
    //$hrefStr = $this->makeHref($linkUrl);
    $str = "<a href='./". $linkUrl ."'>{$linkText}</a>";
    return $str;
  }

//  private function makeHref($linkUrl)
//  {
//    $str = "";
//    $str .= "./{$linkUrl}";
//    return $str;
//  }//method

}
