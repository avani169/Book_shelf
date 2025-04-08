<?php
$conn = new mysqli("localhost", "root", "", "bookshelf");
if ($conn->connect_error) {
    http_response_code(500);
    echo "DB error";
    exit();
}

$id = $_POST['id'] ?? 0;
$title = $_POST['title'] ?? '';
$author = $_POST['author'] ?? '';

if ($id && $title && $author) {
    $stmt = $conn->prepare("UPDATE books SET title=?, author=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $author, $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
