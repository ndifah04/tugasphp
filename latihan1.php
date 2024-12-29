<?php

#string
$nama = "Muhammad Fachri Rasyidi";

#number
$umur = 21;

#float
$tinggi = 170.2;

#boolean
$is_lulus = false;

#array
$hobis = array("Membaca", "Main Game", "Main Catur");




#cara pertama untuk echo
$lulus = $is_lulus ? "Lulus" : "Belum Lulus";

#kalau dalam javascript itu = array.join(", ")
$hobi = implode(", ", $hobis);


echo
"
<h2>Cara Pertama</h2>
<ol>
   <li>Nama : $nama</li>
   <li>Umur : $umur</li>
   <li>Tinggi : $tinggi</li>
   <li>Lulus : $lulus</li>
   <li>Hobi : $hobi</li>
 </ol>
 ";



echo "<h2>Cara Kedua</h2>";
echo "<ol>";

echo "<li>Nama : $nama</li>";
echo "<li>Umur : $umur</li>";
echo "<li>Tinggi : $tinggi</li>";
echo "<li>Lulus : " . ($is_lulus ? "Lulus" : "Belum Lulus") . "</li>";
echo "<li>Hobi : " . implode(", ", $hobis) . "</li>";

echo "</ol>";


function pertambahan($angka1, $angka2): int
{
    return $angka1 + $angka2;
}

$hasil = pertambahan(20, 20);

echo "<h2>Hasil Pertambahan dari 20 + 20 = $hasil </h2>";

/*
object
[
 "attributes" => value
]

array 
[
  value 
]
*/



$hasilPenjualan = 
[
    //object
    (object)[
    "nama" => "Buku",
    "harga" => 20000,
    "jumlah" => 5
], (object)[
    "nama" => "Pensil",
    "harga" => 5000,
    "jumlah" => 10
], (object)[
    "nama" => "Penghapus",
    "harga" => 3000,
    "jumlah" => 10,
]];


echo "<h2>Hasil Penjualan</h2>";

foreach($hasilPenjualan as $datajual ) {

    echo "<ul>";
    echo "<li>Nama : $datajual->nama</li>";
    echo "<li>Harga : $datajual->harga</li>";
    echo "<li>Jumlah : $datajual->jumlah</li>";
    echo "</ul>";

    echo "<br/>";
}
