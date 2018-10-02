<?php
require_once __DIR__ . '/vendor/autoload.php';
use Wamania\Snowball\English;

$stemmer = new English();
$stem = $stemmer->stem('consisting');
echo $stem;
?>