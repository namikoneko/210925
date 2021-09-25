<?php
use \ShowRows\ShowRows;

$childTable = "child";

Flight::route("/child/@id", function($id){

//parentの1行
  global $table;
  $row = GetRows::getOneArr($table, $id);
  //print_r($row);

//parentへのリンク
  $linkhtml = new LinkHtml();
  $str = $linkhtml->makeLinkId("../parent","parent",$row["parentId"]);
  echo $str;

//  $childshowrows = new ChildShowRows();
//  $row = $childshowrows->exe($row);
  print_r($row);

//childの複数行
  global $childTable;
  $table = $childTable;
  $rows = GetRows::getRowsParentId($table,$row["id"]);
  //print_r($rows);
  $childshowrows = new ChildShowRows();
  $rows = $childshowrows->rowsExe($rows);
  print_r($rows);

  //insformの作成
  $childinsform = new ChildInsForm($row["id"]);
  $formHtml = $childinsform->makeHtml();
  echo $formHtml;
});

Flight::route("/childinsexe", function(){
  global $childTable;
  $table = $childTable;
  $forms = [
      ["type" => "typeText", "name" => "parentId", "column" => "parentId"],
      ["type" => "typeText", "name" => "title", "column" => "title"],
      ["type" => "textarea", "name" => "text", "column" => "text"],
  ];
  $insexe = new InsExe();
  $insexe->createExe($forms,$table);

  $parentId = Flight::request()->data->parentId;
  Flight::redirect("/child/{$parentId}");
});

Flight::route("/childupd/@id", function($id){
  global $childTable;
  $table = $childTable;
  $row = GetRows::getOneArr($table, $id);

  $childupdform = new ChildUpdForm($id, $row);
  $formHtml = $childupdform->makeHtml();
  echo $formHtml;
});

Flight::route("/childupdexe", function(){
  global $childTable;
  $table = $childTable;
  $forms = [
    ["type" => "typeText", "name" => "title", "column" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "column" => "text", "showKey" => "text"],
  ];
  $updexe = new UpdExe();
  $updexe->exe($forms, $table);

  $id = Flight::request()->data->id;
  $row = GetRows::getOneArr($table, $id);
  Flight::redirect("/child/{$row["parentId"]}");
});

Flight::route("/childdel/@id", function($id){
  global $childTable;
  $table = $childTable;
  $row = GetRows::getOneArr($table, $id);
  $parentId = $row["parentId"];//delete前にデータを取っておく

  Del::exe($table, $id);

  Flight::redirect("/child/{$parentId}");
});

