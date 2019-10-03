<?php
    include_once 'layouts/header.layout.php';
?>

<!-- HOME PAGE MARKUP -->

<main>

    <?php 
        if(isset($_SESSION['loggedIn'])){
    ?>

    <div class="container">

        

        <form action="serverside/expenses.handler.php" id="expenses-form" method="GET">
            <h2 class="form-title">Expenses</h2>

            <div class="form-row">
                <div class="form-col">
                    <label>Expenses Name</label>
                    <select name="expenses_name" class="noob-textfield">
                            <option value="Tax">Tax</option>
                            <option value="Food">Food</option>
                            <option value="waterBill">Water Bill</option>
                            <option value="electricityBill">Electricity Bill</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-col">
                    <label>Others: </label>
                    <input type="text" class="noob-textfield" name="expenses_name_others" placeholder="Others">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col">
                   <label>Expenses Price</label>
                    <input type="text"  class="noob-textfield" name="expenses_price" placeholder="PHP 0.00" required> 
                </div>
            </div>
            

            <div class="form-row">
                <div class="form-col">
                    <input type="submit" value="Add Expenses" class="button-normal" name="add_expenses">
                </div>
            </div>

        </form>

        <a href="summary.php" class="header-button sum">
            View Account Summary
        </a>
            
    </div>

        

    <?php
        }
        else{
    ?>

    <div class="container">
        <form action="serverside/login.handler.php" id="login-form" method="POST">
            <h2 class="form-title">Login</h2>
            <div class="form-row">
                <div class="form-col">
                    <label for="username">Username/Email: </label>
                    <input type="text" class="noob-textfield" name="username" placeholder="Username or Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="password">Password: </label>
                    <input type="password" class="noob-textfield" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <input type="submit" class="button-normal" value="Login" name="login">
                </div>
            </div>
        </form>
    </div>

    <?php
        }
    ?>

</main>

<!-- HOME PAGE MARKUP -->

<?php
    include_once 'layouts/footer.layout.php';
?>

