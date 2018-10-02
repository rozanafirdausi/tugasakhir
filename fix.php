<?php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();
$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
$stopWordRemover = $stopWordRemoverFactory->createStopWordRemover();
$ld = new Text_LanguageDetect();

function clean($string) {
   $string = str_replace(' ', ' ', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$string = "pengaruh Pada penelitian ini diimplementasikan
suatu sistem penangkap citra pelanggaran traffic
light, dimana input sistem berupa rekaman video yang
diambil pada area traffic light dan output sistem
berupa potongan-potongan video yang menunjukkan
proses terjadinya pelanggaran
Untuk mendeteksi pelanggaran traffic light,
aplikasi bekerja dengan cara melakukan pengolahan
citra dan pengolahan video dari data rekaman video
pada area traffic light yang diambil pada waktu siang,
sore dan malam hari.
Dari pengujian yang dilakukan dengan cara
mengambil sampel video pada saat siang, sore dan
malam hari didapatkan hasil pendeteksian
pelanggaran dengan tingkat keberhasilan rata-rata
untuk mobil 90,3% dan 47,7% untuk motor pada video
siang hari, 8,3% untuk mobil dan 59,66 % untuk
motor pada video sore hari, dan 62,5% untuk mobil
dan 46,19 % untuk motor pada video malam.
Persentase kesalahan rata-rata dari sistem yaitu 11,36
% untuk mobil dan 64,5 % untuk motor pada video
siang, 89,6 % untuk mobil dan 54,28 % untuk motor
pada video sore, dan 37,7 % untuk mobil dan 65,7
untuk motor pada video malam.";
// deteksi bahasa inggris atau indonesia
$language = $ld->detectSimple($string);

$lower = strtolower($string);
$token = strtok($lower, " ");

while ($token !== false)
{
	$token = strtok(" ");
	// echo $token;
	// stopwords removal
	$output = $stopWordRemover->remove($token);
	// stemming
	$output = $stemmer->stem($output);
	echo $output . "\n";
}

?>