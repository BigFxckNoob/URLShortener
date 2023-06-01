<?php
require_once '../backend/conn.php';
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


if (!filter_var($url, FILTER_VALIDATE_URL)) { // check if the url given is a link.
    header('Location: ../index.php?error=invalid_url');
    exit;
}

$sql = "SELECT * FROM url WHERE short_url = :short_url";
$stmt = $conn->prepare($sql);
$stmt->execute(['short_url' => $url]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$result) {
    header('Location: ../index.php?error=invalid_url');
    exit;
}
$o_url = $result['o_url'];
header('Location: ' . $o_url);
?>