<?php
require_once './Models/ProductModel.php';

class ProductController
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->getAll();
        require './Views/Products/list.php';
    }

    // Thêm sản phẩm
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;

            $productModel = new ProductModel();
            $productModel->add($name, $price);

            header("Location: index.php?controller=product&action=index");
            exit;
        }
        require './Views/Products/add.php';
    }

    // Sửa sản phẩm
    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $productModel = new ProductModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? 0;

            $productModel->update($id, $name, $price);

            header("Location: index.php?controller=product&action=index");
            exit;
        }

        $product = $productModel->getById($id);
        require './Views/Products/edit.php';
    }

    // Xóa sản phẩm
    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $productModel = new ProductModel();

        $productModel->delete($id);

        header("Location: index.php?controller=product&action=index");
        exit;
    }
}
