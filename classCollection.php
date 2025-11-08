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

interface LinkedListInterface extends ListInterface {
    public function addFirst($item);
    public function addLast($item);
    public function removeFirst();
    public function removeLast();
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

class Node {
    public $data;
    public ?Node $next;

    public function __construct($data, $next = null) {
        $this->data = $data;
        $this->next = $next;
    }
}

class LinkedList implements LinkedListInterface {
    private ?Node $head = null;
    private int $size = 0;

    /**
     * Menambahkan data di awal
     * @param item data yang akan ditambah
     */
    public function addFirst($item) {
        $newNode = new Node($item, $this->head);
        $this->head = $newNode;
        $this->size++;
    }

    /**
     * Menambahkan data di akhir
     * @param item data yang akan ditambah
     */
    public function addLast($item) {
        $newNode = new Node($item);

        $this->size++;

        if($this->head === null) {
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }

        $current->next = $newNode;
    }


    /**
     * Menambahkan data di awal
     * @param item data yang akan ditambah
     */
    public function add($item) {
        $this->addLast($item);
    }

    /**
     * Menghapus data di awal
     */
    public function removeFirst() {
        if($this->head === null) return;

        $this->head = $this->head->next;
        $this->size--;
    }
    
    /**
     * Menghapus data di akhir
     */
    public function removeLast() {
        if($this->head === null) return;
        
        $this->size--;

        if($this->head->next === null) {
            $this->head = null;
            return;
        }
        
        $current = $this->head;
        while ($current->next->next !== null) {
            $current = $current->next;
        }
        $current->next = null;
    }

    /**
     * Menghapus data dari node
     * @param item data yang akan dihapus
     */
    public function remove($item) {
        if ($this->head === null) return;

        if ($this->head->data === $item) {
            $this->head = $this->head->next;
            $this->size--;
            return;
        }

        $current = $this->head;
        while ($current->next !== null && $current->next->data !== $item) {
            $current = $current->next;
        }

        if ($current->next === null) return;
        $current->next = $current->next->next;
        $this->size--;
    }

    /**
     * Mencari data berdasarkan index
     * @param index
     */
    public function get(int $index) {
        if ($index < 0 || $index >= $this->size) return null;

        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        return $current->data;
    }

    /**
     * Mengubah data di index yang diinput
     * @param index
     * @param value data baru
     */
    public function set(int $index, $value) {
        if ($index < 0 || $index >= $this->size) return;
        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        $current->data = $value;
    }

    /**
     * Mengembalikan panjang Linkedlist
     * @return int
     */
    public function size(): int {
        return $this->size;
    }

    /**
     * Mengecek apakah LinkedList kosong
     * @return bool true jika kosong
     */
    public function isEmpty(): bool {
        return $this->size === 0;
    }

    public function print() {
        if($this->head === null) {
            echo "LinkedList Kosong";
            return;
        }

        echo "LinkedList: ";
        $current = $this->head;
        while ($current !== null) {
            echo "{$current->data} ";
            $current = $current->next;
        }
        echo "\n";
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
     * Menampilkan Map
     */
    public function print() {
        print_r($this->map);
    }
}