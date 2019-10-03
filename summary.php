<?php
    include_once 'layouts/header.layout.php';
    include_once 'serverside/database.handler.php';
?>

<!-- HOME PAGE MARKUP -->

<main>

    <?php 
        if(isset($_SESSION['loggedIn'])){
    ?>

    <div class="container">
        <h2 class="title">Account Summary of <?php echo $_SESSION['fullName']; ?></h2>
        <table class="summary_table">
        
            <tr>
                <th>Expenses</th>
                <th>Price</th>
                <th>Date</th>
                <th>Time</th>
                <th>Options</th>
            </tr>

            <?php

                $uID = $_SESSION['loggedIn'];

                $sql = "SELECT * FROM expenses WHERE USER_ID='$uID';";

                $total = 0;

                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){

                            echo "<tr>";

                            echo "<td>".$row['Expenses_name']."</td>";
                            echo "<td>PHP ".$row['Expenses_price']."</td>";
                            echo "<td>".$row['Month']."/".$row['Day']."/".$row['Year']."</td>";
                            echo "<td>".$row['Time']."</td>";
                  

                            $total += $row['Expenses_price'];

                            ?>
                            <td>
                                <form method="POST" action="serverside/delete-expenses.handler.php">
                                    <input type="text" style="display: none" name="user_id" value="<?php echo $row['User_ID'] ?>">
                                    <input type="text"   style="display: none" name="ex_id" value="<?php echo $row['User_ID_expenses'];?>">
                                    <input class="header-button smol" type="submit" value="DELETE" name="delete">
                                </form>
                            </td>

                            <?php

                            echo "</tr>";

                        }

                        echo "<h3>Total Expenses: PHP ".$total."</h3>";

                    }
                }
            
            ?>

        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="index.php" class="header-button sum">
            Add Expenses
        </a>
    </div>

    

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

