<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noobly</title>
    <!-- ICONS -->
    <link rel="icon" href="src/icons/tabLogo.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/button-styles.css">
    <link rel="stylesheet" href="styles/register.css"> <!-- new -->
    <link rel="stylesheet" href="styles/login.css"> <!-- new -->
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="src/icons/Logo.png" alt="Noobly Logo">
                </a>
                
            </div>
            <nav id="navigation">
                <?php
                    if(isset($_SESSION['loggedIn'])){
                ?>

                <ul>
                    <li><a href="account.php" class="header-button">Account Info</a></li>
                    <li><a href="serverside/logout.handler.php" class="header-button">Logout</a></li>
                </ul>

                <?php
                
                    }
                    else{
                ?>
                <ul>
                    <li><a href="index.php" class="header-button">Login</a></li>
                    <li><a href="signup.php" class="header-button">Register</a></li>
                </ul>
                <?php
                    }
                ?>
            </nav>  
        </div>
    </header>

    <div class="floating-converter">
        <h2>PHP TO USD Converter</h2>
        <input type="text" id="php" placeholder="PHP">
        <input type="text" id="dollar" placeholder="USD">
        <button class="header-button smol" onclick="convertThis()">CONVERT</button>
    </div>


    <script>
        
        function convertThis(){
            var php = document.getElementById("php");
            var dollar = document.getElementById("dollar");
            dollar.value = php.value * 0.019; 
            
        }
    
    </script>