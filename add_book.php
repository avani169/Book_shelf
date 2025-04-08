<?php
$conn = new mysqli("localhost", "root", "", "bookshelf");
if ($conn->connect_error) {
    http_response_code(500);
    echo "DB error";
    exit();
}

$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';

if ($title && $author) {
    $stmt = $conn->prepare("INSERT INTO books (title, author) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $author);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
