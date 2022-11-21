<?php

include 'nwloginvariables.php';

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
?>

<?php
session_start();   // session starts


$user = ($_POST['user']);
$pass = ($_POST['pass']);

if ($_SESSION['loggedin'] == "yes")   // Checking whether the session is already there or not
{
    // all good
    echo "Logged in!";
}

if (empty($user)) {

   echo "User Name is required";
    include "loginform.php";
    exit();

} else if(empty($pass)){

    echo "Password is required";
    include "loginform.php";
    exit();

} else {
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $results = $mysql->query($sql);
//    echo "<hr>Your SQL:<br> ".$sql. "<br><br>";

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    if ($results->num_rows === 1) {

        $row = mysqli_fetch_array($results);

        if ($row['username'] === $user && $row['password'] === $pass) {

            $_SESSION['loggedin'] = "yes";
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['id'] = $row['user_id'];
            exit();

        } else {
            echo "invalid Username or Password";
            include "loginform.php";
            exit();
        }
    } else {
        echo "Invalid Username or Password, please try again.";
        include "loginform.php";
        exit();
    }

}
?>

//$email = $_POST[‘email’];
//$query = “SELECT * FROM users WHERE email = ‘$email’”
//$row = mysql_fetch_array($query);
//$username = $row[‘email’];
//echo $username;

