<?php

require_once 'model/DatabaseConnection.php';

$startConnection = new DatabaseConnection('localhost', 'root', '', 'vida_crista');
$conn = $startConnection->getConnection();

$sql = 'select numero, texto from catecismo';

$stmt = $conn->prepare($sql);
// $stmt->bindValue(':id', 2);
$stmt->execute();

// $result = $stmt->fetchAll();
// $result = $stmt->fetch();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
// $result = $stmt->fetch(PDO::FETCH_BOTH);
// $result = $stmt->fetch(PDO::FETCH_BOUND);
// $result = $stmt->fetch(PDO::FETCH_NUM);

echo '<pre>';
var_dump($result);
echo '<pre>';
