<?php
$db = new PDO('mysql:host=localhost;dbname=WEB;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$stmt = $db->prepare("SELECT * FROM Uzivatel WHERE username='admin' LIMIT 1");
$stmt->execute();
$row = $stmt->fetch();
echo implode (" ", $row);
echo"<br>";
echo $_POST["address"]; ?>
