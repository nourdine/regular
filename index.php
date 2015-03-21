<?php

include './vendor/autoload.php';

$haystack = "Can a url be detected inside this string? Who knows! www.nourdine.net... maybe so?!";
$regexp = new regular\Regular("/www.([a-z]{1,}).(com|net|org)/");
$match = $regexp->match($haystack);
$whole = $match->getWholeMatch();
$domainName = $match->getCaptured(0);
$domainExtension = $match->getCaptured(1);
echo $whole->getValue() . PHP_EOL;
echo $whole->getOffset() . PHP_EOL;
echo $domainName->getValue() . PHP_EOL;
echo $domainName->getOffset() . PHP_EOL;
echo $domainExtension->getValue() . PHP_EOL;
echo $domainExtension->getOffset() . PHP_EOL;
