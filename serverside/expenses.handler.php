<?php

    session_start();

    include_once 'database.handler.php';

    if(isset($_GET['add_expenses'])){
        $expenses = $_GET['expenses_name'];
        $expensesPrice = $_GET['expenses_price'];


        if($expenses == "Others"){
            $expenses = $_GET['expenses_name_others'];
        }

        

        date_default_timezone_set("Asia/Manila");

        $currentTime = date("h:i A");
        
        $currentYear = date("Y");
        $currentMonth = date("m");
        $currentDay = date("d");

        $userID = $_SESSION['loggedIn'];

        $sql = "INSERT INTO `expenses`(`Expenses_name`, `User_ID`, `Expenses_price`, `Month`, `Day`, `Year`, `Time`) VALUES ('$expenses','$userID','$expensesPrice',$currentMonth,$currentDay,$currentYear,'$currentTime');";

        if(mysqli_query($conn, $sql)){
            header("Location: ../index.php?expenses=success");
            exit();
        }
        else{
            header("Location: ../index.php?expenses=failed");
            exit();
        }

    }