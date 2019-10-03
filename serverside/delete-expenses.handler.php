<?php

    session_start();

    include_once "database.handler.php";

    if(isset($_POST['delete'])){
        $id = $_POST['user_id'];
        $ex = $_POST['ex_id'];
        $sql = "DELETE FROM expenses WHERE User_ID='$id' AND `USER_ID_expenses`='$ex';";
        if(mysqli_query($conn, $sql)){
            header("Location: ../summary.php?delete=success");
            exit();
        }
        else{
            header("Location: ../summary.php?delete=failed");
            exit();
        }
    }