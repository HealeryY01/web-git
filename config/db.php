<?php
class Database
{
    private $host = "localhost";
    private $db_name = "exam";
    private $username = "root";
    private $password = "";
    private $conn = null;

    // Kiểm tra kết nối

    public function getConnection()
    {
        try {
            if ($this->conn === null) {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->exec("set names utf8");
            }
            return $this->conn;
        } catch (PDOException $e) {
            throw new Exception("Lỗi kết nối: " . $e->getMessage());
        }
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error); // Thông báo lỗi kết nối
        } else {
            echo "Kết nối đến cơ sở dữ liệu thành công!"; // Thông báo kết nối thành công
        }
    }
}
