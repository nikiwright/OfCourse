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

$sql = "UPDATE reviews
    SET
    review = '". $_REQUEST["reviewtext"] ."'
    WHERE 
    user_id =  ".$_SESSION["id"].
    " AND review_id =". $_SESSION['reviewID'] ;


$results = $mysql -> query($sql);

if($results){

    header('Location:user_profile.php');
    exit();
//    echo "REVIEW UPDATED";

} else {
    echo "ERROR; TRY AGAIN". $sql;
}
?>


