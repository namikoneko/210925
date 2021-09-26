<?php

class Header
{
  private $cdnLink = <<<EOD
      <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
      <link rel="stylesheet" href="http://localhost/210923/style.css">
EOD;

  public function output()
  {
   $str = <<<EOD
     <!doctype>
      <html>
      <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      {$this->cdnLink}
      </head>
      <body>
      <main class='container'>
EOD;
     echo $str;
  }
}
