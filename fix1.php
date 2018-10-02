<?php
require_once __DIR__ . '/vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jurnall";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT judul, abstrak FROM jurnal";
$result = $conn->query($sql);

function clean($string) {
	$string = str_replace(' ', ' ', $string);
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 }

$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();
$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
$stopWordRemover = $stopWordRemoverFactory->createStopWordRemover();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		
		$ld = new Text_LanguageDetect();
		$string =$row["abstrak"];
		$language = $ld->detectSimple($string);
		$string = clean($string);
		$string = strtolower($string);
		$string = strtok($string, " ");
		echo "<br> Abstrak: ". $string."<br>";
		echo "<br> Bahasa: ". $language."<br>";
	}
} else {
    echo "0 results";
}
$conn->close();

?>