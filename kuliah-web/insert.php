<?php

require 'function.php';

if (isset($_POST['insertData'])) {
    if (insertData($_POST) > 0) {
        echo "<script>
                alert('Data successfully added');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "Failed adding data";
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
    <h2>Add New Player</h2>

    <form action="" method="POST">

    <li>
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" autofocus required>
    </li>

    <li>
        <label for="year">Year : </label>
        <input type="text" name="year" id="year" required>
    </li>

    <li>
        <label for="nationality">Nationality : </label>
        <input type="text" name="nationality" id="nationality" required>
    </li>

    <li>
        <label for="team">Team : </label>
        <input type="text" name="team" id="team" required>
    </li>

    <li>
        <label for="position">Position : </label>
        <input type="text" name="position" id="position" required>
    </li>

    <li>
        <label for="image">Image : </label>
        <input type="text" name="image" id="image" required>
    </li>

    <li>
        <button type="submit" name="insertData">Save Data</button>
    </li>

    </form>
</body>
</html>