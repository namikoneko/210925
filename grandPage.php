<?php
use \ShowRows\ShowRows;

$grandTable = "grand";

Flight::route("/grand", function(){

  $header = new Header();
  $header->output();

//dbからデータを取得
  global $grandTable;
  $table = $grandTable;
  //$rows = GetRows::GetAllArr($table);
  $gr = new GetRows();
  $rows = $gr->GetAll($table);
//並び替え
  $column = "title";
  $rows = $gr->orderByArr($rows, $column);
  //$rows = $gr->orderByDescArr($rows, $column);
//タイトル表示
  MakeTopRowHtml::grandTitle();
  //insformの作成
  $grandform = new GrandInsForm();
  $grandform->makeHtml();

  //rowsを表示
  $grandshow = new GrandShowRows();
  $rows = $grandshow->rowsExe($rows);
  $grandshow->makeHtml($rows);
  //print_r($rows);

  Footer::output();
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
  $header = new Header();
  $header->output();

  global $grandTable;
  $table = $grandTable;
  $row = GetRows::GetOneArr($table, $id);

  $grandform = new GrandUpdForm($id, $row);
  $grandform->makeHtml();

  Footer::output();
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
