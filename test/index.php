<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//require "../src/nd.php";
require "../src/orm/protoObject.php";
require "../src/nd.php";

$config_file = file_get_contents("config.json");
$config_json = json_decode($config_file);
var_dump($config_json);
nd::setup($config_json);
nd::init("local");



?>