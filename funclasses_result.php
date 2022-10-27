<?php
$host = "webdev.iyaclasses.com";
$userid = "ddwright";
$userpw = "AcadDev_Wright_9518225131";
$db = "ddwright_funclasses";

include '../pdloginvariables.php';

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
<title> Results Page </title>
<header>
    <style>
        body {
            background-color: white;
        }

        #container{
            width: 80%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            flex-direction: column;
            text-align: center;

            background-color: white;
            border: solid 1px lightgrey;
        }

    </style>
</header>
<body>
<div id="container">
<h1> Search results</h1>

    <?php


    ?>

</div>
</body>
</html>
