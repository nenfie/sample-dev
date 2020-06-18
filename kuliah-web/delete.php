<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// get id
$id = $_GET['id'];

if (deleteData($id) > 0) {
    echo "<script>
            alert('Data successfully deleted');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "Failed deleting data";
}

?>