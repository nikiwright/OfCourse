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
<title> Details Page </title>
<header>
    <link rel="stylesheet" href="./css/style.css">
</header>
<body id="body3">
<div id="container">
    <img src="./css/Of-Course-Logo.png" id="logo">

    <?php

    if (empty($_REQUEST["recordid"])){
        echo "Error! please go through the search page";
        exit();
    }

    $sql = "SELECT * from generalView
         WHERE fun_classes_id =" .
        $_REQUEST['recordid'];

    //echo "SQL: ". $sql. "<br>"."<br>";

    $results = $mysql -> query($sql);

    if(!$results){
        echo "ERROR: " . $mysql -> error;
    }

    while ($currentrow = $results -> fetch_assoc()){
        echo "<h1 id='resultheader'>". $currentrow["className"]. " Details" ."</h1> <br>";
        echo "<div id='transparentbox2'>
<div id='resultbox'>";
        echo "<strong>"."Course Title: " ."</strong>". $currentrow["className"]. "<br>";
        echo "<strong>"."CourseID: " ."</strong>". $currentrow["courseID"]. "<br>";
        echo "<strong>"."About: " ."</strong>". $currentrow["classBio"]. "<br>";
        echo "<strong>"."Days offered: " ."</strong>". $currentrow["weekday"]. "<br>";
        echo "<strong>"."Units: " ."</strong>". $currentrow["unit_num"]. "<br>"."<br>";

        echo "<strong>"."Class Department: " ."</strong>". $currentrow["classDepartment"]. "<br>";
        echo "<strong>"."School: " ."</strong>". $currentrow["school"]. "<br>"."<br>";

        echo "<strong>"."Instructor Name: " ."</strong>". $currentrow["instructorName"]. "<br>";
        echo "<strong>"."Instructor Rating (ratemyprofessor): " ."</strong>". $currentrow["instructorRating"]. "<br>"."<br>";
        echo "</div>";
        echo "</div>";
    }

    $sql2 = "SELECT * from reviewsView
         WHERE fun_classes_id =" .
        $_REQUEST['recordid'];

//    echo "SQL: ". $sql2. "<br>"."<br>";

    $results = $mysql -> query($sql2);

    if(!$results){
        echo "ERROR: " . $mysql -> error;
    }

    echo "<strong>"."Course Reviews: "."</strong>"."<br>";
    while ($currentrow = $results -> fetch_assoc()){
        echo $currentrow["review"]."<br>";
        "<br style='clear:both;'>";
    }


    ?>

</div>
</div>
</body>
</html>
