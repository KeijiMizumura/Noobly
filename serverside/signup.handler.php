<?php

    session_start();

    include_once 'database.handler.php';

    if(isset($_POST['signup'])){

        $username =  mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn,$_POST['confirm-password']);
        $firstName = mysqli_real_escape_string($conn,$_POST['first-name']);
        $middleName = mysqli_real_escape_string($conn,$_POST['middle-name']);
        $lastName = mysqli_real_escape_string($conn,$_POST['last-name']);

        $birthday = mysqli_real_escape_string($conn,$_POST['birthday']);

        $birthYear = substr($birthday, 0, 4);
        $birthMonth = substr($birthday, 5, 2);
        $birthDay = substr($birthday, 8, 2);

        $occupation = $_POST['occupation'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];
        
        if( !empty($username) &&
            !empty($email) &&
            !empty($password) &&
            !empty($confirmPassword) &&
            !empty($firstName) &&
            !empty($lastName) &&
            !empty($birthYear) &&
            !empty($birthMonth) &&
            !empty($birthDay) &&
            !empty($occupation) &&
            !empty($gender)
        ){
           // If fields are completed

           if(strlen($username) >= 5){

                if($password == $confirmPassword){

                    $uniqueId = md5($firstName.$lastName);

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO `user_info`(`ID`, `Username`, `Email`, `Password`, `First_name`, `Middle_name`, `Last_name`, `Sex`, `Month`, `Day`, `Year`, `Occupation`, `Status`) VALUES ('$uniqueId','$username','$email','$password','$firstName','$middleName','$lastName','$gender',$birthMonth,$birthDay,$birthYear, '$occupation','$status');";

                    if(mysqli_query($conn, $sql)){
                        $_SESSION['loggedIn'] = $uniqueId;
                        $_SESSION['fullName'] = $firstName." ".$lastName;
                        header("Location: ../index.php?signup=success");
                        exit();
                    }
                    else{
                        header("Location: ../signup.php?server=error");
                        exit();
                    }

                }
                else{
                    header("Location: ../signup.php?password=dontmatch");
                    exit();
                }

           }
           else{
               header("Location: ../signup.php?username=tooshort");
               exit();
           }

        }
        else{
            // if some fields are empty
            header("Location: ../signup.php?fields=empty");
            exit();
        }

    }
    else{
        header("Location: ../index.php");
        exit();
    }