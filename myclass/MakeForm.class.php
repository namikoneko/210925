<?php

class MakeForm
{
  public function exe($formPartialTags, $actionUrl)
  {
    $str = <<<EOD
      <form action="{$actionUrl}" method="post">
EOD;
    $returnTags["top"] = $str;
    $returnTags = array_merge($returnTags,$formPartialTags);
    $str = <<<EOD
        <input type="submit" value="send">
EOD;
    $returnTags["submit"] = $str;
    $str = <<<EOD
      </form>
EOD;
    $returnTags["end"] = $str;
    return $returnTags;

  }//
}
