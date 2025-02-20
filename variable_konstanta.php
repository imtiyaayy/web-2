<?php
define('PHI', 3.14);
$jari_jari = 10;

$luas = PHI * $jari_jari * $jari_jari;

echo 'Nilai PHI adalah ' . PHI; //kenapa ga pake $ karena variable nya udah di definisikan di baris 2//
echo '<br/>Luas lingkaran dengan jari-jari ' . $jari_jari . ' adalah ' . $luas;
?>