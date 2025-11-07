<?php

require "./classCollection.php";

// Contoh sederhana Map
$map = [
    // memiliki key (angka) dan value (3)
    "angka" => 3,
];

// Bisa menambahkan data manual
// tipe data value boleh berbeda dari tipe data sebelumnya
$map["myAngka"] = 5;


echo "ArrayList\n";
// ArrayList
// Sama seperti array tetapi memiliki size(length) yang bisa bertambah atau berkurang
$arrList = new ArrayList();

// Menambahkan data ke ArrayList
$arrList->add(4);
$arrList->add(6);
$arrList->add(2);

$arrList->print();

// Menghapus data ArrayList
$arrList->remove(6);
$arrList->print();

// Linkedlist sebenarnya hampir sama dengan ArrayList

echo "\nStack\n";
// Stack (Tumpukan)
// Memiliki konsep LIFO, dimana elemen atau data terakhir yang di input maka dialah
// yang pertama keluar
$stack = new Stack();

// Menambahkan data ke stack
$stack->push(5);
$stack->push(3);
$stack->push(4);

$stack->print();

// Mengambil data terakhir dari stack
$stack->pop();
$stack->print();

echo "\nQueue\n";
// Queue (antrian)
// Memiliki konsep FIFO, dimana elemen atau data yang masuk pertama akan keluar pertama
$queue = new Queue();

// Mengantrikan data (menambahkan)
$queue->enqueue(5);
$queue->enqueue(6);
$queue->enqueue(1);
$queue->enqueue(3);

$queue->print();

// Mengeluarkan data dari antrian
$queue->dequeue();
$queue->dequeue();
$queue->print();

echo "\nHashMap\n";
// HashMap
// Berupa dictionary atau kamus, terdapat konsep key dan value
$hashMap = new HashMap();

// Menambahkan data ke HashMap, membutuhkan 2 parameter $key dan $value
$hashMap->append("orang1", "John Doe");
$hashMap->append("orang2", "Budi");
$hashMap->append("orang3", "Fachriel Yoga Wicaksono");
$hashMap->append("orang4", "Rusdi");

$hashMap->print();

// Menghapus data dari HashMap
$hashMap->remove("orang2");
$hashMap->print();

// Mengambil nilai berdasarkan key
echo "Key = orang3, value = {$hashMap->get('orang3')}\n";

// Bisa juga mengecek apakah sesuatu key memiliki nilai di HashMap
echo "Apakah ada key 'orang5'? ";
echo  $hashMap->hasKey('orang5') === 1 ? "true" : "false";
echo "\n";