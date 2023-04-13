<?php
session_start();

define("TITLE", "Login_");

include_once('./library.php');
require('./connect.php');

// Checking if all fields are filled out
if (sizeof($_POST) == 2) {

    // Checking that all fields are non-empty
    if ($_POST['username'] !== "" && $_POST['emp_password'] !== "" ){

        $credentials = array_map('sanitize', $_POST); // sanitize

        // Login the user
        $stmt = $conn->prepare("SELECT * FROM Employee WHERE username = ?");
        $stmt->bind_param("s", $credentials['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Check if password is correct
        if (password_verify($credentials['emp_password'], $row['emp_password'])) {
            $_SESSION['active'] = true;
            $_SESSION['user'] = $row['username'];

            redirect_HOME();
        }
        // Authentification Failure
        else {
            echo "Login Failed <br>";
        }

    }


}
//var_dump($_SESSION);

if (!isActive()) {
?>
<!-- ///////////////////////////////////////////////////// -->

    <div class="container" id="box">

    <div class="container" id="login_nav">
        <h4> Login Page ! </h4>
        <hr>
    </div>

    <div class="container" id="login_box">

        <form method="POST">
            Username: <input type="text" name="username" id="username" value="<?= $_POST['username'] ?? '' ?>"><br />
            Password: <input type="password" name="emp_password" id="emp_password" value="<?= $POST['emp_password'] ?? '' ?>"><br />
            <input type="submit" value="Login">
        </form>

        <p>New user? <a href="./signup.php" >Create an account!</a> </p>

    </div>

</div>


<!-- ///////////////////////////////////////////////////// -->

<?php } else { redirect_HOME(); } ?>


</html>
<!-- FOOTER -->
