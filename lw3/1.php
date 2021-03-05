<?php

$text = $_GET["text"];
$bsp = true; //true - предыдущий символ пробел, false - предыдущий символ не пробел
$resultText = '';
for ($i = 0; $i < strlen($text); $i++)
{
    if (($text[$i] === ' ') && ($bsp === false))
    {
        $resultText .= $text[$i];
        $bsp = true;
    } else if ($text[$i] !== ' ')
    {
        $resultText .=  $text[$i];
        $bsp = false;
    }
}
if ($resultText[strlen($resultText)-1] === ' ')
{
    $resultText =  substr($resultText, 0, -1);
}

header("Content-Type: text/plain");
echo ($resultText);    