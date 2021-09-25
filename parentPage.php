<?php
use \ShowRows\ShowRows;

$table = "parent";
//require_once '../libs/flight/Flight.php';

//Flight::route($routeUrl, function(){
Flight::route("/parent/@id", function($id){
//grandへのリンク
  echo LinkHtml::makeLink("../grand","grand");
//grandの1行
  global $grandTable;
  $row = GetRows::getOneArr($grandTable, $id);
  print_r($row);

//parentの複数行
  global $table;
  $rows = GetRows::getRowsParentId($table,$row["id"]);
  //print_r($rows);
  $parentshowrows = new ParentShowRows();
  $rows = $parentshowrows->rowsExe($rows);
  print_r($rows);

  //insformの作成
  $parentinsform = new ParentInsForm($row["id"]);
  $formHtml = $parentinsform->makeHtml();
  echo $formHtml;
});

Flight::route("/parentinsexe", function(){
  global $table;
  $forms = [
      ["type" => "typeText", "name" => "parentId", "column" => "parentId"],
      ["type" => "typeText", "name" => "title", "column" => "title"],
      ["type" => "textarea", "name" => "text", "column" => "text"],
  ];
  $insexe = new InsExe();
  $insexe->createExe($forms,$table);

  $parentId = Flight::request()->data->parentId;
  Flight::redirect("/parent/{$parentId}");
});

Flight::route("/parentupd/@id", function($id){
  global $table;
  $row = GetRows::getOneArr($table, $id);

  $parentupdform = new ParentUpdForm($id, $row);
  $formHtml = $parentupdform->makeHtml();
  echo $formHtml;
});

Flight::route("/parentupdexe", function(){
  global $table;
  $forms = [
    ["type" => "typeText", "name" => "title", "column" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "column" => "text", "showKey" => "text"],
  ];
  $updexe = new UpdExe();
  $updexe->exe($forms, $table);

  $id = Flight::request()->data->id;
  $row = GetRows::getOneArr($table, $id);
  Flight::redirect("/parent/{$row["parentId"]}");
});

Flight::route("/parentdel/@id", function($id){
  global $table;
  $row = GetRows::getOneArr($table, $id);
  $parentId = $row["parentId"];//delete前にデータを取っておく

  Del::exe($table, $id);

  Flight::redirect("/parent/{$parentId}");
});
