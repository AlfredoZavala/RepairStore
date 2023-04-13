<?php
session_start();
define("TITLE", "SignUp_");

require('./mock_header.php');


// Checking if all fields are filled out
if (sizeof($_POST) == 6) {

    //var_dump($_POST);

    // Checking that all fields are non-empty
    if (
        $_POST['username'] !== "" && $_POST['emp_password'] !== ""
        && $_POST['employee_name'] !== "" && $_POST['email'] !== ""
        && $_POST['phone_num'] !== "" && $_POST['ssn'] !== ""
    ) {

      //alert("Goodjob!");
      //var_dump($_SESSION);

        $credentials = array_map('sanitize', $_POST); // sanitize
//
        $stmt = $conn->prepare("SELECT * FROM Employee WHERE username = ?");

        //echo("Got in");
        //var_dump($_SESSION);

        $stmt->bind_param("s", $credentials['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $users = $result->fetch_all();

        //echo("Goodjob!");
        //var_dump($_SESSION);


        if (sizeof($users) == 0) {

            $credentials['emp_password'] = password_hash($_POST['emp_password'], PASSWORD_DEFAULT);
            //$stmt = $conn->prepare("INSERT INTO Users(employee_name,email, username, emp_password) VALUES (?, ?, ?, ?)");
            $stmt = $conn->prepare("INSERT INTO Employee(employee_name,employee_phoneNum, e_mail, username, emp_password, ssn) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $credentials['employee_name'], $credentials['phone_num'], $credentials['e_mail'], $credentials['username'], $credentials['emp_password'], $credentials['ssn']);
            if( $stmt->execute() ) {
                $_SESSION['active'] = true;
                $_SESSION['user'] = $credentials['username'];
                redirect_HOME();


          }

          var_dump($_POST);
        } else {
            echo "<p>A user with that username already exists. </p>";
        }


    }
}
//var_dump($_SESSION);

if (!isActive()) {
?>
<!-- ///////////////////////////////////////////////////// -->

<div class="container" id="home">
    <h4> SignUp Page ! </h4>
    <hr>
</div>

<div class="container" id="login_box">

    <form action="signup.php" method="POST">
        Name: <input type="text" name="employee_name" id="employee_name" value="<?= $_POST['employee_name'] ?? '' ?>"><br>
        E-Mail: <input type="text" name="e_mail" id="e_mail" value="<?= $_POST['e_mail'] ?? '' ?>"><br>
        Phone#: <input type="text" name="phone_num" id="phone_num" value="<?= $_POST['phone_num'] ?? '' ?>"><br>
        SSN: <input type="text" name="ssn" id="ssn" value="<?= $_POST['ssn'] ?? '' ?>"><br>
        Username: <input type="text" name="username" id="username" value="<?= $_POST['username'] ?? '' ?>"><br />
        Password: <input type="password" name="emp_password" id="emp_password" value="<?= $POST['emp_password'] ?? '' ?>"><br>
        <input type="submit" value="Create Account!">
    </form>

</div>


<!-- ///////////////////////////////////////////////////// -->

<?php

} else {
    redirect_HOME();
}
?>




</html>
<!-- FOOTER -->
<?php
require('./footer.php');
?>
