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

function insertData($data) {
    $conn = openConnection();

    $name = htmlspecialchars($data['name']) ;
    $year = htmlspecialchars($data['year']);
    $nationality = htmlspecialchars($data['nationality']);
    $team = htmlspecialchars($data['team']);
    $position = htmlspecialchars($data['position']);
    $image = htmlspecialchars($data['image']);
    
    $query = "INSERT INTO footballers 
                VALUES
            (null,'$name','$year','$nationality','$team','$position','$image');
            ";

    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);   
}

?>