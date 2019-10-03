<?php

    session_start();
    
    include_once "database.handler.php";

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $sql = "DELETE FROM user_info WHERE ID='$id'";

        if(mysqli_query($conn, $sql)){
            session_destroy();
            header("Location: ../index.php?account=ded");
            exit();
        }
        else{
            header("Location: ../account.php?delete=error");
            exit();
        }

    }