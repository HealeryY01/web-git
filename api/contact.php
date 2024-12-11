<?php
// Thêm header để cho phép CORS
header("Access-Control-Allow-Origin: http://localhost:5173"); // Cho phép frontend truy cập
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");  // Các phương thức được phép
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Các header được phép
header("Access-Control-Allow-Credentials: true"); // Nếu cần gửi cookie/session

// Nếu đây là một preflight request (OPTIONS), chỉ trả về 200
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Kiểm tra phương thức HTTP
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "success" => false,
        "message" => "Chỉ chấp nhận phương thức POST."
    ]);
    exit;
}

// Lấy dữ liệu từ body của yêu cầu
$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra dữ liệu đầu vào
if (
    empty($data['name']) ||
    empty($data['email']) ||
    empty($data['subject']) ||
    empty($data['message'])
) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "success" => false,
        "message" => "Vui lòng điền đầy đủ thông tin."
    ]);
    exit;
}

// Lưu dữ liệu vào cơ sở dữ liệu
$name = htmlspecialchars($data['name']);
$email = htmlspecialchars($data['email']);
$subject = htmlspecialchars($data['subject']);
$message = htmlspecialchars($data['message']);

require '../config/db.php'; // Kết nối đến cơ sở dữ liệu
$stmt = $pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->execute([$name, $email, $subject, $message]);

// Trả về phản hồi thành công
http_response_code(200); // OK
echo json_encode([
    "success" => true,
    "message" => "Tin nhắn của bạn đã được gửi thành công!"
]);
