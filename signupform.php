<?php

include 'nwloginvariables.php';

//CAN THE USERS DATABASE BE ACCESSED WITH THESE LOGIN CREDENTIALS?

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

<html>
<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FF5E5B;
        }

        #submit {
            background-color:#FF5E5B;
        }
        h3{
            text-align: center;
        }
    </style>
</head>
<h3>Sign Up:</h3> <hr>
<form action ="login.php">

    First Name:
    <input type = "text" id = "firstName" name = "user_firstName"> <br>
    Last Name:
    <input type = "text" id = "lastName" name = "user_lastName"> <br>
    Username:
    <input type = "text" id = "username" name = "username"> <br>
    Password:
    <input type = "text" id = "password" name = "password"> <br>

</form>

<?php
 $sql = "INSERT INTO users 
 (user_firstName, user_lastName, username, password) 
 VALUES ('firstName',
 'lastName',
 'username',
 'password')"

echo $sql;
?>


</html>
