<?php
use \ShowRows\ShowRows;

$childTable = "child";

Flight::route("/child/@id", function($id){
  $header = new Header();
  $header->output();

//parentの1行のデータを先に取得
  global $table;
  $row = GetRows::getOneArr($table, $id);

//parentへのリンク
  $linkhtml = new LinkHtml();
  $str = $linkhtml->makeLinkId("../parent","parent",$row["parentId"]);
  echo "<div class='pageup-link'>" . $str . "</div>";

//parentの1行
  MakeTopRowHtml::makeHtml($row);
  //print_r($row);

//insformの作成
  $childinsform = new ChildInsForm($row["id"]);
  $childinsform->makeHtml();

//  $childshowrows = new ChildShowRows();
//  $row = $childshowrows->exe($row);
  //print_r($row);

//childの複数行
  global $childTable;
  $table = $childTable;
//  $rows = GetRows::getRowsParentIdArr($table,$row["id"]);

//データを取得
  $gr = new GetRows();
  $rows = $gr->getRowsParentId($table,$row["id"]);
//並び替え
  $column = "updated";
  //$rows = $gr->orderByArr($rows, $column);
  $rows = $gr->orderByDescArr($rows, $column);
  //print_r($rows);

//表示する
  $childshow = new ChildShowRows();
  $rows = $childshow->rowsExe($rows);
  $childshow->makeHtml($rows);
  //print_r($rows);

  Footer::output();
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
  $header = new Header();
  $header->output();
  global $childTable;
  $table = $childTable;
  $row = GetRows::getOneArr($table, $id);

  $childupdform = new ChildUpdForm($id, $row);
  $childupdform->makeHtml();
  Footer::output();
});

Flight::route("/childupdexe", function(){
  global $childTable;
  $table = $childTable;
  $forms = [
    ["type" => "typeText", "name" => "parentId", "column" => "parentId", "showKey" => "parentId"],
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

Flight::route("/childup/@id", function($id){
  global $childTable;
  $table = $childTable;
  $row = GetRows::getOneArr($table, $id);
  $parentId = $row["parentId"];//

  Up::exe($table, $id);

  Flight::redirect("/child/{$parentId}");
});
