<?php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();
$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
$stopWordRemover = $stopWordRemoverFactory->createStopWordRemover();

$sentence = 'Untuk mendukung kegiatan bisnis Perusahaan Jasa Konstruksi perlu adanya dukungan sistem informasi dan teknologi informasi agar proses bisnis dapat berjalan dengan baik. Perusahaan Jasa Konstruksi memerlukan adanya sebuah portofolio aplikasi yang mendeskripsikan dukungan SI/TI untuk 5
tahun kedepan. Untuk mensinkronkan antara kebutuhan bisnis dan kebutuhan aplikasi maka diperlukan sebuah portofolio. Portofolio Aplikasi merupakan bagian dari Perencanaan Strategis SI/TI, dimana portofolio aplikasi ini terangkum pemetaan sistem informasi yang ada sekarang atau situasi saat ini dan
potensi aplikasi sistem informasi mendatang yang nantinya bisa digunakan perusahaan untuk meningkatkan kinerja (bussiness value). Untuk mengetahui keadaan saat ini dari Perusahaan Jasa Konstruksi akan dilakukan analisis lingkungan bisnis, analisis lingkungan SI/TI, dan analisis SWOT.
Dari tahap pemahaman situasi saat ini akan diperoleh representasi kebutuhan bisnis Perusahaan Jasa Konstruksi tersebut. Tahap selanjutnya yaitu menaksir kebutuhan mendatang melalui analisis balanced scorecard (BSc), analisis critical success factors (CSF), serta analisis value chain yang akan menghasilkan inisiatif strategi bisnis, kebutuhan informasi, dan pengelompokan aktifitas - aktifitas utama
dan pendukung. Kemudian tahap penentuan portofolio aplikasi, dilakukan dengan pemetaan aplikasi ke dalam model empat kuadran McFarlan. Pemetaan aplikasi didasarkan pada tingkatan klasifikasi sistem yakni pendukung operasional, transaksi pengawasan dan kontrol, perencanaan dan analisa, dan strategi. Kemudian tahap akhir yakni penarikan kesimpulan dan saran';
// stopwords removal
$output = $stopWordRemover->remove($sentence);
// stemming
$output = $stemmer->stem($output);

echo $output . "\n";
