<?php

    session_start();

    include_once "database.handler.php";

    if(isset($_POST['login'])){

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $sql = "SELECT * FROM `user_info` WHERE `Username`='$username' OR `Email`='$username';";

        $serverId = "";
        $serverPassword = "";

        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $serverId = $row['ID'];
                    $serverPassword = $row['Password'];
                    $firstName = $row['First_name'];
                    $lastName = $row['Last_name'];
                }

                // CHECK IF PASSWORDS MATCH

                if($password == $serverPassword){
                    $_SESSION['loggedIn'] = $serverId;
                    $_SESSION['fullName'] = $firstName." ".$lastName;
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../index.php?login=failed");
                    exit();
                }

            }
            else{
                header("Location: ../index.php?user=notfound");
                exit();
            }
        }
        else{
            header("Location: ../index.php?database=error");
            exit();
        }
       
    }