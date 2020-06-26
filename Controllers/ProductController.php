<?php
namespace Controllers;
use Models\Products;

class ProductController
{   
    public function uploadImage(){
        $uploadDir = ROOT_PATH."public/images/";
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            return basename($_FILES['image']['name']);
        } else {
            return "default.jpg";
        }
    }

    public function newProduct(){
        $data = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if (in_array("",$data)) {
            return;
        }

        $newProduct = new Products();
        $data["image"] = $this->uploadImage();

        if($newProduct->insertProduct($data)){
            return true;
        }else {
            return false;
        }
    }

    public function updateProduct(){
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $newProduct = new Products();

        if ($_FILES['image']['name'] === "") {
            $data["image"] = $data['filename'];
            unset($data['filename']);
        }else{
            $data["image"] = $this->uploadImage();
        }

        if ($newProduct->updateProduct($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function listProducts(){
        $newProduct = new Products();
        return $newProduct->showProducts();
    }

    public function deleteProduct(int $id){
        $newProduct = new Products();
        if ($newProduct->deleteProduct($id)) {
            return true;
        } else {
            return false;
        }
    }
}