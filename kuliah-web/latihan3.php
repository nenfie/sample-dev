<?php
require 'function.php';

$footballers = execQuery("SELECT * FROM footballers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuliah Web</title>
</head>
<body>
    <h2>Football Players</h2>

    <a href="tambah.php">Add Data</a>
    <br>
    <br>

    <table border="1" cellpadding="10" cellspacing="0"> 
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

        <?php $i=1;
        foreach($footballers as $p) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $p['image']; ?>" width=100></td>
            <td><?= $p['name']; ?></td>
            <td><a href="detail.php?id=<?= $p['id']; ?>">View Detail</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>