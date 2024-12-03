<?php
// Lấy tên controller và action từ query string, mặc định là 'product' và 'index'
$controller = ucfirst($_GET['controller'] ?? 'product') . 'Controller'; // Tên controller (ví dụ: ProductController)
$action = $_GET['action'] ?? 'index'; // Tên action (ví dụ: index)

// Kiểm tra xem file controller có tồn tại không, nếu không thì dừng lại
if (file_exists("./Controllers/$controller.php")) {
    require_once "./Controllers/$controller.php";  // Include file controller
    $controllerObject = new $controller();        // Khởi tạo đối tượng controller
    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();  // Gọi action trong controller
    } else {
        // Nếu action không tồn tại, hiển thị lỗi
        echo "Action '$action' không tồn tại.";
    }
} else {
    // Nếu controller không tồn tại, hiển thị lỗi
    echo "Controller '$controller' không tồn tại.";
}
