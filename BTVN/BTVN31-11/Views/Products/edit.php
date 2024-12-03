<form action="index.php?controller=product&action=edit&id=<?php echo $product['id']; ?>" method="POST">
    <label for="name">Tên sản phẩm:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>

    <label for="price">Giá:</label>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" required>

    <button type="submit">Cập nhật</button>
</form>