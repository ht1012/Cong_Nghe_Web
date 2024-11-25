<?php
// Đường dẫn đến CSV file
$filename = "KTPM2.csv";
// Tạo một mảng trống để lưu trữ dữ liệu
$students = [];

// Mở file CSV để đọc
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Đọc tiêu đề (tên cột)
    $headers = fgetcsv($handle, 1000, ",");

    // Đọc từng hàng của CSV và thêm nó vào mảng $students
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $students[] = array_combine($headers, $data); // Kết hợp các tiêu đề với dữ liệu hàng
    }

    fclose($handle);
}


// Tùy chọn, bạn có thể in dữ liệu ra để kiểm tra
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh Sách Sinh Viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Lặp qua mảng và hiển thị dữ liệu của từng học sinh theo hàng
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>{$student['username']}</td>";
                    echo "<td>{$student['password']}</td>";
                    echo "<td>{$student['lastname']}</td>";
                    echo "<td>{$student['firstname']}</td>";
                    echo "<td>{$student['city']}</td>";
                    echo "<td>{$student['email']}</td>";
                    echo "<td>{$student['course1']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>