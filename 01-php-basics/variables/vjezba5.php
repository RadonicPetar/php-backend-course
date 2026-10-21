<?php

echo "<h1>PREDEFINIRANE VARIJABLE U PHP-U</h1>";

echo "<br>HOST: ".$_SERVER["SERVER_NAME"];
echo "<br>".$_SERVER['PHP_SELF'];
echo "<br>".basename($_SERVER['PHP_SELF']);
echo "<br>".$_SERVER['REQUEST_METHOD'];
echo "<br>".$_SERVER['QUERY_STRING'];
echo "<br>".$_SERVER['DOCUMENT_ROOT'];
echo "<br>".$_SERVER['REQUEST_URI'];
?>