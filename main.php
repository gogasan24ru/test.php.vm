<?php
require_once("config.php");
require_once("class.php");
echo "demo\n";
$tree = new tree($database,$host,$password,$username);
echo $tree->getRootId()."\n";
var_dump($tree->getChildsOf(1));


?>
