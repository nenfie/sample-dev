<?php
require 'function.php';

// get id
$id = $_GET['id'];

$p = execQuery("SELECT * FROM footballers WHERE id=$id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliah Web</title>
</head>
<body>
    <h2>Player Info</h2>

    <ul>
        <li><img src="img/<?= $p['image']; ?>" width=250></li>
        <li>Name : <?= $p['name']; ?></li>
        <li>Year : <?= $p['year']; ?></li>
        <li>Nationality : <?= $p['nationality']; ?></li>
        <li>Team : <?= $p['team']; ?></li>
        <li>Position : <?= $p['position']; ?></li>
        <li><a href="">Edit</a> | <a href="">Delete</a></li>
        <li><a href="latihan3.php">Back to Players List</a></li>
    </ul>
</body>
</html>