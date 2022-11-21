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
// logout routine
session_start();
//unset($_SESSION["loggedin"]);

session_unset();

session_destroy();
echo "You have successfully LOGGED OUT". "<br>"."<hr>";
echo print_r($_SESSION);
?>