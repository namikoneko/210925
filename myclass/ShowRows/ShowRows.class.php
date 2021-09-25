<?php
namespace ShowRows;

class ShowRows
{
  protected $rows;
  protected $showRows;
  protected $showColumns;
  protected $ReturnArray = [];

  public function __construct($rows, $showColumns)
  {
    $this->rows = $rows;
    $this->showColumns = $showColumns;
//    $this->makeStrArray();
  }

//メインルーチン的
  public function makeRows()
  {
    $rows = $this->rows;

    foreach($rows as $row)
    {
      $this->makeColArray($row);
      $this->ReturnArray[] = $this->rowArray;
    }//foreach
      return $this->ReturnArray;
  }//method

// ここは適宜オーバーライドする
  protected function makeColArray($row)
  {
    foreach($this->showColumns as $showColName)
    {
        $this->rowArray[$showColName] = $row[$showColName];//すべてのカラムを配列に入れる
    }
  }
}//class
