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
}
