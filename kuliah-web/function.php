<?php 

function openConnection() {
    return mysqli_connect('localhost','root','','kuliah_web');
}

function execQuery($query) {
    $conn = openConnection();
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 

    return $rows;
}

?>