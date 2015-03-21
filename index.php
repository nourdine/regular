<?php

include './vendor/autoload.php';

$str = "This is a link http://www.nourdine.net to my website! And this is another link www.google.com...";

$r = new regular\Regular("/www.([a-z]{1,}).(com|net|org)/");

$matches = $r->match($str);

print_r($matches->debug());
