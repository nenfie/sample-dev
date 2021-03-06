<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// start with 0 to show all data
$id = 0;

$footballers = readData($id);

// search data
if (isset($_POST['findData'])) {
    $footballers = findData($_POST['keyword']);
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
    <h2>Football Players</h2>

    <a href="logout.php">Logout</a>
    <br><br>

    <a href="insert.php">Add New</a>
    <br><br>

    <form action="" method="POST">
        <input type="text" name="keyword" size=40 placeholder="Enter keyword.." autocomplete="off" autofocus class="keyword">
        <button type="submit" name="findData" class="findData">Search</button>
    </form>
    <br><br>

    <div class="container">    
        <table border="1" cellpadding="10" cellspacing="0"> 
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            <?php if(empty($footballers)) : ?>
                <tr>
                    <td colspan="4"><p style="color: red; font-style: italic;">Data not found!</p></td>
                </tr>
            <?php endif; ?>

            <?php $i=1;
            foreach($footballers as $p) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="img/<?= $p['image']; ?>" width=80></td>
                <td><?= $p['name']; ?></td>
                <td><a href="view.php?id=<?= $p['id']; ?>">View Detail</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script src="js/script.js"></script>

</body>
</html>