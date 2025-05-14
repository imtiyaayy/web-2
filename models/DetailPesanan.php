<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class DetailPesanan
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT dp.*, p.nama AS produk, p.harga 
            FROM detail_pesanan dp
            JOIN produk p ON dp.produk_id = p.id';
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO detail_pesanan (pesanan_id, produk_id, jumlah) VALUES (:pesanan_id, :produk_id, :jumlah)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':pesanan_id', $data['pesanan_id']);
        $statement->bindParam(':produk_id', $data['produk_id']);
        $statement->bindParam(':jumlah', $data['jumlah']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM detail_pesanan WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE detail_pesanan SET pesanan_id = :pesanan_id, produk_id = :produk_id, jumlah = :jumlah WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':pesanan_id', $data['pesanan_id']);
        $statement->bindParam(':produk_id', $data['produk_id']);
        $statement->bindParam(':jumlah', $data['jumlah']);

        return $statement->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $sql = 'DELETE FROM detail_pesanan WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
