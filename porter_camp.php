<?php
require_once __DIR__ . '/vendor/autoload.php';
$word = 'eating';
$stem = Porter::Stem($word);
echo $stem;
?>