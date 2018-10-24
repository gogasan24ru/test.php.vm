<?php
require_once("config.php");
require_once("class.php");
echo "demo\n";
$tree = new tree($database,$host,$password,$username);
echo "Root ID: ".$tree->getRootId()."\n";
$tree->createElement(1,"B");


var_dump($tree->getChildsOfRec(1));


?>
