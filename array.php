<?php

// Deklarasi array
$arr = [
    4, 5, 6, 3, 5
];

// Menampilkan array dengan looping
echo "arr = {";
for($i = 0; $i < count($arr); $i++) {
    echo "\n    [{$i}] => " . $arr[$i];
    echo ($i+1 != count($arr)) ? ", " : "\n}\n\n";
}
// atau dengan function bawaan php
print_r($arr);

// Nilai yang di simpan oleh array masih bisa di update
// tetapi panjang array sudah fix yang artinya panjang array 
// tidak dapat bertambah atau berkurang(tetapi karena ini 
// php jadi panjang array masih bisa bertambah)
$arr[0] = 2;
echo "\nArray setelah di update\n";
print_r($arr);

// Array tidak memliki struktur data, 
// biasanya kita perlu menggunakan function di luar array 
// untuk mengoperasikan program tertentu

// Misal untuk menghitung total elemen pada array kita
// menggunakan function count()
echo count($arr);