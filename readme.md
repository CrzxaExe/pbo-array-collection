# Array vs Collection

```
Nama    : Bintang Nugraha Putra
NIM     : H1H024045
```

Repo ini lebih berisi dengan penjelasan kode saja, hasil terminal hanya ala kadarnya saja

## Array

Array adalah variabel yang dapat menampung value dengan tipe data yang seragam(homogen) tetapi memiliki size yang fix/tidak dapat diubah

- Memiliki size yang fix
- Menggunakan konsep index dan value
- Tipe data homogen
- Tipe data bisa berupa data primitif atau object

Contoh kode untuk array:

- [array.php](./array.php)

## Collection

Collection adalah sebuah kumpulan data yang memiliki key dan value, namun ukuran collection dapat berubah (tidak fix).

- Size dapat berubah(grow / shrink)
- Terdapat key dan value
- Tipe data bisa saja heterogen
- TIpe data harus object

Contoh collection: List, Map, Set, Stack, LinkedList, dll<br/>

Contoh kode untuk collection:

- [collection.php](./collection.php)
- [classCollection.php](./classCollection.php)

## Kesimpulan

| <b>Array</b> | <b>Collection</b> |
| - | - |
| Array bentuknya tetap, saat membuat array kita perlu menentukan menentukan total elemen yang bisa ditampung | Bentuknya dinamis dapat bertambah atau berkurang |
| Array dapat menampung data yang homogen | Collection dapat menampung data homogen ataupun heterogen |
| Array tidak memiliki struktur data | Collection biasanya berupa Class baru yang sudah memiliki struktur data, kita hanya perlu menggunakan method yang ada |
