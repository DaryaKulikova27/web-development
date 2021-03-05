<?php

const WRONG_SYMBOL_ERR_CODE = 1;
const FIRST_SYMBOL_DIGIT = 2;

const ERRORS = [
    WRONG_SYMBOL_ERR_CODE => 'нашли не подходящий символ',
    FIRST_SYMBOL_DIGIT => 'первый символ - цифра'
];

$identifier = $_GET["identifier"];
$letter = false;
$digit = false;
$errCode = 0;
$i = 0;

while (($errCode === 0) && ($i < strlen($identifier)))
{
    if ((($identifier[$i] >= 'a') && ($identifier[$i] <= 'z')) || (($identifier[$i] >= 'A') && ($identifier[$i] <= 'Z')))
    {
        $letter = true;
    } else if (($identifier[$i] >= 1) && ($identifier[$i] <= 9))
    {
        if (($i === 0) && ($letter === false))
        {
            $errCode = FIRST_SYMBOL_DIGIT;
        }
        $digit = true;
    } else 
    {
        $errCode = WRONG_SYMBOL_ERR_CODE;
    }
    $i ++;
}

header("Content-Type: text/plain");
if (!$errCode) 
{
    echo ('yes');
} else 
{
  echo ERRORS[$errCode];
}

