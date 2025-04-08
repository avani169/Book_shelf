<?php
$conn = new mysqli("localhost", "root", "", "bookshelf");
if ($conn->connect_error) {
    http_response_code(500);
    echo "DB error";
    exit();
}

$id = $_GET['id'] ?? 0;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM books WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
