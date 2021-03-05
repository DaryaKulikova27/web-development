<?php

$password = $_GET["password"];
$security = 0;
$state = true;
$i = 0;
$numberOfCapitalLetters = 0;
$numberOfSmallLetters = 0;
$numberOfDigits = 0;
$len = strlen($password);

while (($state === true) && ($i < strlen($password)))
{
    if (($password[$i] >= 'a') && ($password[$i] <= 'z'))
    {
        $numberOfSmallLetters ++;
    } else if (($password[$i] >= 'A') && ($password[$i] <= 'Z')) 
    {
        $numberOfCapitalLetters ++;
    }
    else if (($password[$i] >= 1) && ($password[$i] <= 9))
    {
        $numberOfDigits ++;
    } else 
    {
        $state = false;
    }
    $i ++;
}

header("Content-Type: text/plain");
if ($state)
{
    $security = $security + 4 * $len + 4 * $numberOfDigits;
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
        $security -= $len;
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