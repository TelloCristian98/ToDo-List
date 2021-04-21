<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $title = $_GET['title'];
    var_dump($title);   
    $query = "DELETE FROM task WHERE id = $id";    
    $result = mysqli_query($db, $query);
    
    if (!$result) {
        die("Data Base Conection Failed!");
    }

    $_SESSION['message'] = "Task <strong>$title</strong> Removed Successfully";
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}