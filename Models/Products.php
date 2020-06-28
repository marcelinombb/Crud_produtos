<?php
namespace Models;
use Models\Connection;

use PDO;

class Products{

    private $conn;

    public function __construct(){
        $this->conn = Connection::conn();
    }

    public function insertProduct($data = array()){
        $query = "INSERT INTO products (name,price,description,image) VALUES(:name,:price,:description,:image)";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":name",$data["name"],PDO::PARAM_STR);
        $sttm->bindValue(":price",$data["price"],PDO::PARAM_STR);
        $sttm->bindValue(":description",$data["description"],PDO::PARAM_STR);
        $sttm->bindValue(":image",$data["image"],PDO::PARAM_STR);
        if ($sttm->execute()) {
            return true;
        }
        return false;
    }

    public function updateProduct($data = array()){
        $query ="UPDATE products SET name = :name, price=:price, description=:description, image=:image WHERE id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":id", $data["id"], PDO::PARAM_INT);
        $sttm->bindValue(":name", $data["name"], PDO::PARAM_STR);
        $sttm->bindValue(":price", $data["price"], PDO::PARAM_STR);
        $sttm->bindValue(":description", $data["description"], PDO::PARAM_STR);
        $sttm->bindValue(":image", $data["image"], PDO::PARAM_STR);
        $sttm->execute();
        if ($sttm->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function showProducts(){
        $query = "SELECT * FROM products";
        $sttm = $this->conn->prepare($query);
        if($sttm->execute()){
          return $sttm->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function deleteProduct(int $id){
        $query = "DELETE FROM products WHERE id=:id";
        $sttm = $this->conn->prepare($query);
        $sttm->bindValue(":id",$id,PDO::PARAM_INT);
        $sttm->execute();
        if ($sttm->rowCount() > 0) {
            return true;
        }
        return false;
    }

}
