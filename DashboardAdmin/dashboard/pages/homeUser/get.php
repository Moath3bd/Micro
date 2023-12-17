<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=microe", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM homeuser";
    $stmt = $pdo->query($query);

    // Fetch data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
