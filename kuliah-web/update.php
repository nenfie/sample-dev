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

if (isset($_POST['updateData'])) {
    if (updateData($_POST) > 0) {
        echo "<script>
                alert('Data successfully updated');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "Failed updating data";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliah Web</title>
</head>
<body>
    <h2>Edit Player Data</h2>

    <form action="" method="POST">    

    <input type="hidden" name="id" value="<?= $p['id']; ?>">
    
    <li>
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" autofocus required value="<?= $p['name']; ?>">
    </li>

    <li>
        <label for="year">Year : </label>
        <input type="text" name="year" id="year" required value="<?= $p['year']; ?>">
    </li>

    <li>
        <label for="nationality">Nationality : </label>
        <input type="text" name="nationality" id="nationality" required value="<?= $p['nationality']; ?>">
    </li>

    <li>
        <label for="team">Team : </label>
        <input type="text" name="team" id="team" required value="<?= $p['team']; ?>">
    </li>

    <li>
        <label for="position">Position : </label>
        <input type="text" name="position" id="position" required value="<?= $p['position']; ?>">
    </li>

    <li>
        <label for="image">Image : </label>
        <input type="text" name="image" id="image" required value="<?= $p['image']; ?>">
    </li>

    <li>
        <button type="submit" name="updateData">Update Data</button>
    </li>

    </form>
</body>
</html>