<?php

$identifier = $_GET["identifier"];
$letter = false;
$digit = false;
$state = true;
$i = 0;

while (($state === true) && ($i < strlen($identifier)))
{
    if ((($identifier[$i] >= 'a') && ($identifier[$i] <= 'z')) || (($identifier[$i] >= 'A') && ($identifier[$i] <= 'Z')))
    {
        $letter = true;
    } else if (($identifier[$i] >= 1) && ($identifier[$i] <= 9))
    {
        $digit = true;
    } else 
    {
        $state = false;
    }
    $i ++;
}

header("Content-Type: text/plain");
if ($state) 
{
    if ($letter === true) 
    {
        echo ('yes');
    } else if ($digit === true)
    {
        echo ('no, I did not find the letter');
    } 
} else
{
    echo ('there was an inappropriate symbol');
}

