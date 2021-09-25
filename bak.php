<?php
//旧parentPageのコード
//##################################################
Flight::route("/parent", function(){
  echo "caseLaw";
  echo "<br>";
  $makelink = new LinkHtml();
  echo $makelink->makeLink("grand","grand");

  //dbからデータを取得
  global $table;
  $rows = GetRows::GetAll($table);

  //rowsを表示
  $parentshowrows = new ParentShowRows();
  $rows = $parentshowrows->exe($rows);
  print_r($rows);
  
  //insformの作成
  $parentform = new ParentInsForm();
  $formHtml = $parentform->makeHtml();
  echo $formHtml;
});

Flight::route("/insexe", function(){
  global $table;
  $forms = [
      ["type" => "typeText", "name" => "title", "column" => "title"],
      ["type" => "textarea", "name" => "text", "column" => "text"],
  ];
  $insexe = new InsExe();
  $insexe->createExe($forms,$table);
  Flight::redirect('/parent');
});

Flight::route("/upd/@id", function($id){
  global $table;
  $row = GetRows::GetOneArr($table, $id);

  $parentform = new ParentUpdForm($id, $row);
  $formHtml = $parentform->makeHtml();
  echo $formHtml;
});

Flight::route("/updexe", function(){
  global $table;
  $forms = [
    ["type" => "typeText", "name" => "title", "column" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "column" => "text", "showKey" => "text"],
  ];
  $updexe = new UpdExe();
  $row = $updexe->exe($forms, $table);
  Flight::redirect('/parent');
});

Flight::route("/del/@id", function($id){
  global $table;
  Del::exe($table, $id);
  Flight::redirect('/parent');
});
