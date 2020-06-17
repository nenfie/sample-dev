<?php 

function openConnection() {
    return mysqli_connect('localhost','root','','kuliah_web');
}

function readData($id) {    
    $conn = openConnection();

    if ($id == 0) {
        $query = "SELECT * FROM footballers";
    } else {
        $query = "SELECT * FROM footballers WHERE id=$id";
    }

    $result = mysqli_query($conn, $query);

    // if (mysqli_num_rows($result) == 1) {
    //     return mysqli_fetch_assoc($result);
    // }

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 

    return $rows;
}

function insertData($data) {
    $name = htmlspecialchars($data['name']) ;
    $year = htmlspecialchars($data['year']);
    $nationality = htmlspecialchars($data['nationality']);
    $team = htmlspecialchars($data['team']);
    $position = htmlspecialchars($data['position']);
    $image = htmlspecialchars($data['image']);
    
    $conn = openConnection();
    $query = "INSERT INTO footballers 
                VALUES
            (null,'$name','$year','$nationality','$team','$position','$image')";

    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);   
}

function updateData($data) {
    $id = htmlspecialchars($data['id']) ;
    $name = htmlspecialchars($data['name']) ;
    $year = htmlspecialchars($data['year']);
    $nationality = htmlspecialchars($data['nationality']);
    $team = htmlspecialchars($data['team']);
    $position = htmlspecialchars($data['position']);
    $image = htmlspecialchars($data['image']);
    
    $conn = openConnection();
    $query = "UPDATE footballers SET 
                name = '$name',
                year = '$year',
                nationality = '$nationality',
                team = '$team',
                position = '$position',
                image = '$image'
            WHERE id = $id";

    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);   
}

function deleteData($id) {
    $conn = openConnection();
    $query = "DELETE FROM footballers WHERE id=$id";

    // mysqli_query($conn, $query) or die(mysqli_error($conn));
    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

function findData($keyword) {    
    $conn = openConnection();
    $query = "SELECT * FROM footballers 
                WHERE 
            name LIKE '%$keyword%' OR position LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    } 

    return $rows;
}

?>