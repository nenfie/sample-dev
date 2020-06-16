<?php

// buka koneksi database
$conn = mysqli_connect('localhost','root','','kuliah_web');

// jalankan query table
$result = mysqli_query($conn, "SELECT * FROM footballers");

// ubah hasil menjadi array
$rows = [];
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
} 

// tampung array ke variable
$footballers = $rows;

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

    <table border="1" cellpadding="10" cellspacing="0"> 
        <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Year</th>
            <th>Nationality</th>
            <th>Team</th>
            <th>Position</th>
            <th>Action</th>
        </tr>

        <?php $i=1;
        foreach($footballers as $p) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $p['image']; ?>" width=100></td>
            <td><?= $p['name']; ?></td>
            <td><?= $p['year']; ?></td>
            <td><?= $p['nationality']; ?></td>
            <td><?= $p['team']; ?></td>
            <td><?= $p['position']; ?></td>
            <td><a href="">Edit</a> | <a href="">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>