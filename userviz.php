<?php
$host = "webdev.iyaclasses.com";
$userid = "aschung";
$userpw = "AcadDev_Chung_6477671743";
$db = "aschung_dvd";



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
        body {
            background-color: burlywood;
            margin: 0 20px;
            text-align: center;
        }

        #container {
            padding: 30px;
            background-color: olive;
            text-align: left;
            color:white;
        }

        .label {
            float:left;
            clear:both;
            width: 70px;
            font-style: italic;
        }
        .box {
            float:left;  text-align:right;
            height: 20px; width: 200px; margin: 5px;
        }
        .bar {
            background-color: red; min-width: 30px;
        }

    </style>
</head>
<body>
<div id="container">
    <h1>Movie totals<hr></h1>

    <?php

    $sql = "SELECT COUNT(*) AS totalmovies FROM movieView2";
    $sql2 = "SELECT COUNT(*) AS totalmovies, genre FROM movieView2 GROUP BY genre";

    $results = $mysql ->query($sql);

    if(!$results){
        echo "ERROR: " . $mysql->error();
        exit();
    }

    $results2 = $mysql->query($sql2);

    $data = $results->fetch_assoc();

    echo "Total number of movies: " . $data["totalmovies"] . "<br><br>";

    echo "Total number of movies by genre:<br>";

    while($currentrow = $results2 -> fetch_assoc()){
        echo $currentrow["genre"] . ": " . $currentrow["totalmovies"] .
            "<div class='box bar' style='width:" . (floatval($currentrow["totalmovies"] / 2)) . "px; float: right'> &nbsp;" .
            "<br style='clear:both'>";
    }

    echo "<br><br>Totals visualized...<br><br>";

    $results2 -> data_seek(0);

    while($currentrow = $results2 -> fetch_assoc()){
        echo "<span style ='font-size:" . (floatval($currentrow["totalmovies"] / 4)) . "px'>" . $currentrow["genre"] . "</span>";
    }

    ?>

    <div class='box'>GENRE:</div>
    <div class='box bar' style='width:100px'>&nbsp;</div>
    123<br style='clear:both'>

</body></html>