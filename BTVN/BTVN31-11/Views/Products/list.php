<h1>Danh sách sản phẩm</h1>
<a href="index.php?controller=product&action=add">Thêm sản phẩm</a>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td>
                <a href="index.php?controller=product&action=edit&id=<?= $product['id'] ?>">Sửa</a>
                <a href="index.php?controller=product&action=delete&id=<?= $product['id'] ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>