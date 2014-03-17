<?php
echo 'asd';
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require "../src/nd.php";
require "../src/orm/protoObject.php";

$a = new protoObject();

$a->test = "asdfasdf";

var_dump($a);


?>