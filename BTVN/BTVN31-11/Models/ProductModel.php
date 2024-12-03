<?php
class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=mvc_db", "root", "");
    }

    // Lấy tất cả sản phẩm
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm
    public function add($name, $price)
    {
        $stmt = $this->db->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->execute([
            'name' => $name,
            'price' => (float)$price // Chuyển giá trị thành kiểu float nếu cần
        ]);
    }

    // Cập nhật sản phẩm
    public function update($id, $name, $price)
    {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
    }

    // Xóa sản phẩm
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
