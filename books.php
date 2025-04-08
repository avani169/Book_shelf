<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "bookshelf");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "DB connection failed"]);
    exit();
}

$result = $conn->query("SELECT * FROM books ORDER BY id DESC");
$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);
$conn->close();
?>
