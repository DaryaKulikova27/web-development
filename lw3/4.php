<?php

$dir = 'data/';
$firstName = $_GET["first_name"];
$lastName = $_GET["last_name"];
$email = $_GET["email"];
$age = $_GET["age"];
$fileName = "$email.txt";

$f_hdl = fopen($dir.$fileName, 'w');

fwrite($f_hdl, "$firstName".PHP_EOL);
fwrite($f_hdl, "$lastName".PHP_EOL);
fwrite($f_hdl, "$email".PHP_EOL);
fwrite($f_hdl, "$age".PHP_EOL);

fclose($f_hdl);