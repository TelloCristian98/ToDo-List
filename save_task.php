<?php
include("db.php");

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description') ";    
    var_dump($query);
    $result = mysqli_query($db, $query);
    var_dump($result);
    var_dump($db);
    if(!$result){
        die("Data base conection failed");
    }
    
    $_SESSION['message'] = 'Task Saved Succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}