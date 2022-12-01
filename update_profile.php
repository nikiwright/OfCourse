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

session_start();   // session starts


$sql = "UPDATE users
    SET
    user_firstName = '". $_REQUEST["firstName"] ."', 
    user_lastName = '". $_REQUEST["lastName"] ."',
    username = '". $_REQUEST["username"] ."',
    password = '". $_REQUEST["password"] ."'
    WHERE 
    ";
echo $sql;

$results = $mysql -> query($sql);

if($results){
    echo "PROFILE UPDATED";
} else {
    echo "ERROR; TRY AGAIN";
}
?>


