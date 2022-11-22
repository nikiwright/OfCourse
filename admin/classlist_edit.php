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
    <title>Class List Edit</title>

</head>
<body>
<?php
include 'adminnavbar.php';
?>
<div id="container">
    <h1>Choose a class to edit:<hr></h1>

    <?php

    $sql = "SELECT * FROM generalView WHERE 1=1";


    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    while($currentrow = $results->fetch_assoc()) {
        echo "<div class='title'><strong>" . $currentrow['className'] . "</strong>".
            "<p1> ". $currentrow["courseID"]. "</p1>" .
            "<a href='class_edit.php?recordid=" . $currentrow["fun_classes_id"] . "'> Edit </a>" .
            "<br style='clear:both;'>";

    }
    ?>

</div>

</body></html>