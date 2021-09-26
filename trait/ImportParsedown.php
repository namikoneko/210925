<?php

trait ImportParsedown
{
  public function parsedwonConf()
  {
    $parse = new Parsedown();
    $parse->setBreaksEnabled(true);
    $parse->setMarkupEscaped(true);
    return $parse;
  }
}
