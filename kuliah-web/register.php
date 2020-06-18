<?php 

require 'function.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
            alert('Username successfully registered');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo "Failed registering username";
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
    <h2>Form Register</h2>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" autofocus required>
            </li>
            <li>
                <label for="password1">Password</label>
                <input type="password" name="password1" id="password1" required>
            </li>
            <li>
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>

</body>
</html>