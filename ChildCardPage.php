<?php
use \ShowRows\ShowRows;

Flight::route("/childcard/@id", function($id){
  $header = new Header();
  $header->output();

//childの1行のデータを先に取得
  global $childTable;
  $table = $childTable;
  $row = GetRows::getOneArr($table, $id);
  //print_r($row);
//childへのリンク
  $linkhtml = new LinkHtml();
  $str = $linkhtml->makeLinkId("../child","child",$row["parentId"]);
  echo "<div class='pageup-link'>" . $str . "</div>";

//表示する
  $c = new ChildCardShow();
  $row = $c->rowExe($row);
  //print_r($row);
  $c->makeHtml($row);

  Footer::output();
});
