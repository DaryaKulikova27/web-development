<?php

$password = $_GET["password"];
$security = 0;
$isCorrect = true;
$i = 0;
$numberOfCapitalLetters = 0;
$numberOfSmallLetters = 0;
$numberOfDigits = 0;
$len = strlen($password);

while (($isCorrect === true) && ($i < strlen($password)))
{
    if (($password[$i] >= 'a') && ($password[$i] <= 'z'))
    {
        $numberOfSmallLetters ++;
    } else if (($password[$i] >= 'A') && ($password[$i] <= 'Z')) 
    {
        $numberOfCapitalLetters ++;
    }
    else if (($password[$i] >= 0) && ($password[$i] <= 9))
    {
        $numberOfDigits ++;
    } else 
    {
        $isCorrect = false;
    }
    $i ++;
}

header("Content-Type: text/plain");
if ($isCorrect)
{
    $security = 4 * $len + 4 * $numberOfDigits; //16
    if ($numberOfCapitalLetters !== 0)
    {
        $security += ($len-$numberOfCapitalLetters) * 2;
    }
    if ($numberOfSmallLetters !== 0)
    {
        $security += ($len-$numberOfSmallLetters) * 2; 
    }
    if (($numberOfDigits === 0) || (($numberOfCapitalLetters === 0)) && ($numberOfSmallLetters === 0))
    {
        $security -= $len; //14
    }
    for ($i = 0; $i < strlen($password); $i ++)
    {
        if ($password[$i] !== '*')
        {
            $numberOfRepetitions = substr_count($password, $password[$i]);
            if ($numberOfRepetitions > 1)
            {
                $security = $security -  $numberOfRepetitions;
            }
            $password = str_replace($password[$i], '*', $password);
        }
    }
    echo ($security);
} else
{
    echo ('Этот пароль не подходит');
}