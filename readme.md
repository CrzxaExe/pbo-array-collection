# Array vs Collection

## Array

Array adalah variabel yang dapat menampung value dengan tipe data yang seragam(homogen) tetapi memiliki size yang fix/tidak dapat diubah

- Memiliki size yang fix
- Menggunakan konsep index dan value
- Tipe data homogen
- Tipe data bisa berupa data primitif atau object

## Collection

Collection adalah sebuah kumpulan data yang memiliki key dan value, namun ukuran collection dapat berubah (tidak fix).

- Size dapat berubah(grow / shrink)
- Terdapat key dan value
- Tipe data bisa saja heterogen
- TIpe data harus object

Contoh: List, Maps, Set

## Kesimpulan

| Array                                                                                                       | Collection                                                                                                            |
| ----------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- |
| Array bentuknya tetap, saat membuat array kita perlu menentukan menentukan total elemen yang bisa ditampung | Bentuknya dinamis size dapat bertambah atau berkurang                                                                 |
| Array dapat menampung data yang homogen                                                                     | Collection dapat menampung data homogen ataupun heterogen                                                             |
| Array tidak memiliki struktur data                                                                          | Collection biasanya berupa Class baru yang sudah memiliki struktur data, kita hanya perlu menggunakan method yang ada |
