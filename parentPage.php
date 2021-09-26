<?php
use \ShowRows\ShowRows;

$table = "parent";

Flight::route("/parent/@id", function($id){
  $header = new Header();
  $header->output();

//grandの1行のデータを先に取得
  global $grandTable;
  $row = GetRows::getOneArr($grandTable, $id);
//grandへのリンク
  $str = LinkHtml::makeLink("../grand","grand");
  echo "<div class='pageup-link'>" . $str . "</div>";
//grandの1行
  MakeTopRowHtml::makeHtml($row);
  //print_r($row);
//insformの作成
  $parentinsform = new ParentInsForm($row["id"]);
  $parentinsform->makeHtml();

//parentの複数行
  global $table;
//データを取得
  //$rows = GetRows::getRowsParentIdArr($table,$row["id"]);
  $gr = new GetRows();
  $rows = $gr->getRowsParentId($table,$row["id"]);
//並び替え
  $column = "title";
  $rows = $gr->orderByArr($rows, $column);
  //$rows = $gr->orderByDescArr($rows, $column);
  //print_r($rows);
//表示する
  $parentshow = new ParentShowRows();
  $rows = $parentshow->rowsExe($rows);
  $parentshow->makeHtml($rows);
  //print_r($rows);

  Footer::output();
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
  $header = new Header();
  $header->output();
  global $table;
  $row = GetRows::getOneArr($table, $id);

  $parentupdform = new ParentUpdForm($id, $row);
  $parentupdform->makeHtml();
  Footer::output();
});

Flight::route("/parentupdexe", function(){
  global $table;
  $forms = [
    ["type" => "typeText", "name" => "parentId", "column" => "parentId", "showKey" => "parentId"],
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
