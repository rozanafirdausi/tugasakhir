<?php
require_once __DIR__ . '/vendor/autoload.php';

$stemmed = \Nadar\Stemming\Stem::stem('drinking', 'en');

echo $stemmed; // output: "drink"
echo \Nadar\Stemming\Stem::stemPhrase('I am playing drums', 'en');
?>