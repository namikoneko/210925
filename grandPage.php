<?php
use \ShowRows\ShowRows;

$grandTable = "grand";

Flight::route("/grand", function(){

  //dbからデータを取得
  global $grandTable;
  $table = $grandTable;
  $rows = GetRows::GetAll($table);

  //rowsを表示
  $grandshowrows = new GrandShowRows();
  $rows = $grandshowrows->rowsExe($rows);
  print_r($rows);

  //insformの作成
  $grandform = new GrandInsForm();
  $formHtml = $grandform->makeHtml();
  echo $formHtml;
});

Flight::route("/grandinsexe", function(){
  global $grandTable;
  $table = $grandTable;
  $forms = [
      ["type" => "typeText", "name" => "title", "column" => "title"],
      ["type" => "textarea", "name" => "text", "column" => "text"],
  ];
  $insexe = new InsExe();
  $insexe->createExe($forms,$table);
  Flight::redirect('/grand');
});

Flight::route("/grandupd/@id", function($id){
  global $grandTable;
  $table = $grandTable;
  $row = GetRows::GetOneArr($table, $id);

  $grandform = new GrandUpdForm($id, $row);
  $formHtml = $grandform->makeHtml();
  echo $formHtml;
});

Flight::route("/grandupdexe", function(){
  global $grandTable;
  $table = $grandTable;
  $forms = [
    ["type" => "typeText", "name" => "title", "column" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "column" => "text", "showKey" => "text"],
  ];
  $updexe = new UpdExe();
  $row = $updexe->exe($forms, $table);
  Flight::redirect('/grand');
});

Flight::route("/granddel/@id", function($id){
  global $grandTable;
  $table = $grandTable;
  Del::exe($table, $id);
  Flight::redirect('/grand');
});
