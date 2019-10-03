<?php
    include_once 'layouts/header.layout.php';
    include_once 'serverside/database.handler.php';
?>

<!-- HOME PAGE MARKUP -->

<main>

    <?php 
        if(isset($_SESSION['loggedIn'])){

            $uID = $_SESSION['loggedIn'];

            $sql = "SELECT * FROM user_info WHERE ID='$uID';";

            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        ?>

                        <div class="container">

                            <div class="account-info">
                                <div class="profile-holder">
                                    <img src="src/icons/Avatar.png" alt="profile-pic">
                                </div>
                                <h1 id="name"><?php echo $_SESSION['fullName'];?></h1>
                                <h2><span>Birthday:</span> <span><?php echo $row['Month']."/".$row['Day']."/".$row['Year'];?></span></h2>
                                <h2><span>Gender:</span> <span><?php echo $row['Sex'];?></span></h2>
                                <h2><span>Occupation: </span><span><?php echo $row['Occupation']; ?></span></h2>
                                <h2><span>Status:</span> <span><?php echo $row['Status']; ?></span></h2>
                                <form method="POST" action="serverside/delete_account.handler.php">
                                    <input style="display:none" type="text" value="<?php echo $_SESSION['loggedIn'];?>" name="id">
                                    <input class="header-button smol centerme" type="submit" name="delete" value="TERMINATE ACCOUNT">
                                </form>

                            </div>

                        </div> 

                        <?php
                    }
                }   
            }

    ?>

      

    <?php
        }
        else{
            header("Location: index.php");
            exit();
        }
    ?>

</main>

<!-- HOME PAGE MARKUP -->

<?php
    include_once 'layouts/footer.layout.php';
?>

