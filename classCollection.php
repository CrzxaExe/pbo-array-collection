<?php

/**
 * Interfaces
 */

interface CollectionInterface {
    public function add($item);
    public function remove($item);
    public function size(): int;
    public function isEmpty(): bool;
}

interface IteratorInterface {
    public function hasNext(): bool;
    public function next();
}

interface ListInterface extends CollectionInterface {
    public function get(int $index);
    public function set(int $index, $value);
}

interface QueueInterface extends CollectionInterface {
    public function enqueue($item);
    public function dequeue();
    public function peek();
}

interface MapInterface {
    public function append($key, $value);
    public function remove($key);
    public function get($key);
    public function hasKey($key): bool;
    public function size(): int;
}

/**
 * Classes
 */

/**
 * ArrayList, array yang dinamis
 */
class ArrayList implements ListInterface, IteratorInterface {
    protected array $list = [];
    protected int $position = 0;

    /**
     * Menambahkan item ke ArrayList
     * @param item item yang akan ditambahkan
     */
    public function add($item) {
        $this->list[] = $item;
    }

    /**
     * Menghapus item pada ArrayList
     * @param item item yang akan dihapus
     */
    public function remove($item) {
        $index = array_search($item, $this->list);
        if($index !== false) unset($this->list[$index]);
    }

    /**
     * Mengembalikan panjang ArrayList
     * @return int panjang ArrayList
     */
    public function size(): int {
        return count($this->list);
    }

    /**
     * Mengecek apakah ArrayList masih kosong
     * @return bool true jika ArrayList masih kosong
     */
    public function isEmpty(): bool {
        return empty($this->list);
    }

    /**
     * Mengambil nilai di indeks yang di input
     * @param index indeks item yang akan di ambil
     * @return mixed ArrayList[index]
     */
    public function get(int $index) {
        return $this->list[$index];
    }

    /**
     * Mengatur nilai di indeks yang di input dengan nilai baru
     * @param index indeks item yang akan di set
     * @param value nilai yang di set
     */
    public function set(int $index, $value) {
        $this->list[$index] = $value;
    }

    /**
     * Fungsi iterator, mengecek apakah data setelah $position ada atau tidak
     * @return bool true jika data selanjutnya ada
     */
    public function hasNext(): bool {
        return $this->position < $this->size();
    }

    /**
     * Mengembalikan data nilai setelah $position
     * @return mixed nilai data selanjutnya
     */
    public function next() {
        return $this->list[$this->position++];
    }

    /**
     * Menampilkan ArrayList
     */
    public function print() {
        print_r($this->list);
    }
}

class Stack extends ArrayList {
    /**
     * Memasukan data ke Stack
     * @param item item yang akan dimasukan
     */
    public function push($item) {
        $this->add($item);
    }

    /**
     * Mengeluarkan data paling atas pada Stack
     * @return mixed data
     */
    public function pop() {
        return array_pop($this->list);
    }

    /**
     * Melihat data paling atas
     * @return mixed data
     */
    public function peek() {
        return end($this->items);
    }

}

class Queue implements QueueInterface {
    private array $queue = [];

    /**
     * Menambahkan data terakhir pada Queue
     * @param item data yang akan ditambahkan
     */
    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    /**
     * Mengeluarkan data paling depan pada Queue
     */
    public function dequeue() {
        return array_shift($this->queue);
    }

    /**
     * Melihat data paling depan pada Queue
     */
    public function peek() {
        return $this->queue[0] ?? null;
    }

    /**
     * Menambahkan data ke paling akhir pada Queue
     * @param item item yang akan ditambahkan
     */
    public function add($item) {
        $this->enqueue($item);
    }

    /**
     * Menghapus item pada Queue
     * @param item item yang akan dihapus
     */
    public function remove($item) {
        $index = array_search($item, $this->queue);
        if($index !== false) unset($this->queue[$index]);
    }

    /**
     * Mengembalikan panjang Queue
     * @return int panjang Queue
     */
    public function size(): int {
        return count($this->queue);
    }

    /**
     * Mengecek apakah Queue masih kosong
     * @return bool true jika Queue masih kosong
     */
    public function isEmpty(): bool {
        return empty($this->list);
    }

    /**
     * Menampilkan Queue
     */
    public function print() {
        print_r($this->queue);
    }
}

class HashMap implements MapInterface {
    private array $map = [];

    /**
     * Menambahkan data ke HashMao
     * @param key key dari value
     * @param value nilai
     */
    public function append($key, $value) {
        $this->map[$key] = $value;
    }

    /**
     * Mengambil data berdasarkan key
     * @param key key yang akan diambil
     * @return mixed data
     */
    public function get($key) {
        return $this->map[$key] ?? null;
    }

    /**
     * Menghapus key dari HashMap
     * @param key key yang akan diremove
     */
    public function remove($key) {
        unset($this->map[$key]);
    }

    /**
     * Mengecek apakan HashMap memiliki key yang di input
     * @param key key yang di cek
     */
    public function hasKey($key): bool {
        return array_key_exists($key, $this->map) || 0;
    }

    /**
     * Mengembalikan panjang HashMa
     */
    public function size(): int {
        return count($this->map);
    }

    /**
     * Menampilkan ArrayList
     */
    public function print() {
        print_r($this->map);
    }
}