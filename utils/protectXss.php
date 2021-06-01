<?php
  function protectxss($string) {
    $string=iconv(mb_detect_encoding($string, mb_detect_order(), true), "UTF-8", $string);
    $string=addcslashes($string,"'");
    $string=addcslashes($string,'"');
    return htmlspecialchars($string);
}
?>