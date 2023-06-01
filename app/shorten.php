<?php
$action = $_GET['action'];
if ($action == "create"){
    createurl();
};

function createurl(){
    require_once '../backend/conn.php';
    require_once '../app/domains.php';
    $o_url = $_GET['url'];
    if (!filter_var($o_url, FILTER_VALIDATE_URL)) { // check if the url given is a link.
        header('Location: ../index.php?error=invalid_url');
        exit;
    }
    $short_part = substr(md5(uniqid(rand(), true)), 0, 7); // Create a random string for the short url
    $domain = $domains[array_rand($domains)];
    if (substr($domain, -1) == "/"){
        $domain = substr($domain, 0, -1); // remove the '/' in the domain if there is one.
    };
    $short_url = $domain . "/" . $short_part;
    $sql = "SELECT * FROM url WHERE short_url = :short_url";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['short_url' => $short_url]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) { // Check if the short url already exists in the database, if so, repeat.
        createurl();
    }
    $sql = "INSERT INTO url (o_url, short_url) VALUES (:o_url, :short_url)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['o_url' => $o_url, 'short_url' => $short_url]);
    header('Location: ../index.php?short_url=' . $short_url);
    exit;   
}
?>