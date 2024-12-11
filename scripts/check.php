<?php
include(__DIR__ . '/../config/db.php'); // Nhập khẩu tệp kết nối

class DatabaseChecker
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function checkTables()
    {
        // Kiểm tra các bảng trong cơ sở dữ liệu
        $result = $this->conn->query("SHOW TABLES");
        if ($result) {
            while ($row = $result->fetch_array()) {
                echo "Bảng: " . $row[0] . "<br>";
            }
        } else {
            echo "Lỗi: " . $this->conn->error;
        }
    }
}

// Sử dụng kết nối
$checker = new DatabaseChecker($conn);
$checker->checkTables();
