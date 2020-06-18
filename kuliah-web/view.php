<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// if id not existing in url
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// get id
$id = $_GET['id'];

$footballers = readData($id);
$p = $footballers[0];
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
        <li><a href="update.php?id=<?= $p['id']; ?>">Edit</a> | <a href="delete.php?id=<?= $p['id']; ?>" onclick="return confirm('are you sure?');">Delete</a></li>
        <li><a href="index.php">Back to List</a></li>
    </ul>
</body>
</html>