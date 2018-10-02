<?php
require_once __DIR__ . '/vendor/autoload.php';
// require_once 'Text/LanguageDetect.php';

$text = 'tugas akhir';

$ld = new Text_LanguageDetect();
$language = $ld->detectSimple($text);

echo $language;