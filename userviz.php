<?php
session_start();

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
<html>
<head>
    <title>Movie counts</title>
    <style>
        .bar {
            background-color: red;
            height: 10px;
        }

    </style>
</head>
<body>
<div id="container">
    <h1>Movie totals<hr></h1>

    <?php

    $sql = "SELECT COUNT(*) AS totalreviews FROM reviews";
    $sql2 = "SELECT COUNT(*) AS totalreviews, user_id FROM reviews GROUP BY user_id";

    $results = $mysql ->query($sql);

    if(!$results){
        echo "ERROR: " . $mysql->error();
        exit();
    }

    $results2 = $mysql->query($sql2);

    $data = $results->fetch_assoc();

    echo "Total number of reviews: " . $data["totalreviews"] . "<br><br>";



    while($currentrow = $results2 -> fetch_assoc()){
        echo $currentrow["user_id"] . ": " . $currentrow["totalreviews"] .
            "<div class='box bar' style='width:" . $currentrow["totalreviews"] . "px;'> &nbsp;" .
            "<br style='clear:both'><br>";

    }

//    echo "<br><br>Totals visualized...<br><br>";
//
//    $results2 -> data_seek(0);
//
//    while($currentrow = $results2 -> fetch_assoc()){
//        echo "<span style ='font-size:" . $currentrow["totalreviews"]. "px'>" . $currentrow["user_id"] . "</span>";
//    }
//
   ?>


</body></html>