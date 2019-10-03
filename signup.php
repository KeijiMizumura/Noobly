<?php
    include_once 'layouts/header.layout.php';
?>

<!-- REGISTRATION FORM -->

<main>

    <div class="container">
        <form action="serverside/signup.handler.php" id="registration-form" method="POST">
            <h2 class="form-title">Create a Noobly Account</h2>
            <div class="form-row">
                <div class="form-col">
                    <label for="username">Username: </label>
                    <input type="text" class="noob-textfield" name="username" placeholder="Username" required>
                </div>
                <div class="form-col">
                    <label for="email">Email: </label>
                    <input type="email" class="noob-textfield" name="email" placeholder="noob@example.com" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="password">Password: </label>
                    <input type="password" class="noob-textfield" name="password" placeholder="Password" required>
                </div>
                <div class="form-col">
                    <label for="confirm-password">Confirm Password: </label>
                    <input type="password" class="noob-textfield" name="confirm-password" placeholder="Confirm Password" required>
                 </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="first-name">First Name: </label>
                    <input type="text" class="noob-textfield" name="first-name" placeholder="First Name" required>
                </div>
                <div class="form-col">
                    <label for="middle-name">Middle Name: </label>
                    <input type="text" class="noob-textfield" name="middle-name" placeholder="Middle Name (Optional)">
                </div>
                <div class="form-col">
                    <label for="last-name">Last Name: </label>
                    <input type="text" class="noob-textfield" name="last-name" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="birthday">Birthday: </label>
                    <input type="date" class="noob-textfield" name="birthday" required>
                </div>
                <div class="form-col">
                    <label for="gender">Gender: </label>
                    <select name="gender" class="noob-textfield">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <label for="occupation">Occupation: </label>
                    <input type="text" class="noob-textfield" name="occupation" placeholder="Occupation" required>
                </div>
                <div class="form-col">
                    <label for="status">Status: </label>
                    <select name="status" class="noob-textfield">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-col">
                    <input type="submit" class="button-normal" value="Sign Up" name="signup">
                </div>
            </div>
        </form>
    </div>

</main>

<?php
    include_once 'layouts/footer.layout.php';
?>

