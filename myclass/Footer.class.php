<?php

class Footer
{
  public static function output()
  {
   $str = <<<EOD
      </main>
      </body>
      </html>
 EOD;
   echo $str;
  }

}
