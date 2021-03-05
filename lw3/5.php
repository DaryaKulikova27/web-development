<?php

$dir = 'data/';
$email = $_GET["email"];
$fileName = "$email.txt";

$fl = fopen($dir.$fileName, 'r') or die("не удалось открыть файл");
while(!feof($fl))
{
    $arrayOfData[] = htmlentities(fgets($fl));
}

header("Content-Type: text/plain");
echo ("First Name: $arrayOfData[0]".PHP_EOL);
echo ("Last Name: $arrayOfData[1]".PHP_EOL);
echo ("Email: $arrayOfData[2]".PHP_EOL);
echo ("Age: $arrayOfData[3]".PHP_EOL);

fclose($fl);