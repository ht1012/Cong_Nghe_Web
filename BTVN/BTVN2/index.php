<?php
include 'main.php';
include 'header.php';

$allProducts = getAllProducts();
?>

<h2>Danh sách sản phẩm</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá (VND)</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allProducts as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= number_format($product['price']) ?></td>
            <td>
                <a href="editProduct.php?id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                <a href="deleteProduct.php?id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="addProduct.php" class="btn btn-primary">Thêm sản phẩm mới</a>

<?php include 'footer.php'; ?>