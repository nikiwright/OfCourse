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
<header>
    <title> Details Page </title>
    <link rel="stylesheet" href="./css/style.css">
</header>
<body id="body3">
<div id="container">
    <?php
    include 'sitenav.php';
    ?>

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
        echo "<div id='detailbox'>";
        echo "<div id='box1' style='background-color: white;'>";
        echo "<h1 id='resultheader' style='color: black; line-height: 0px !important; margin-top: 10px;'>". $currentrow["className"]. " Details" ."</h1> <br>";
        echo "</div>";
        echo "<div id='details'>";
        echo "<strong>"."Course Title: " ."</strong>". $currentrow["className"]. "<br>";
        echo "<strong>"."CourseID: " ."</strong>". $currentrow["courseID"]. "<br>";
        echo "<strong>"."About: " ."</strong>". $currentrow["classBio"]. "<br>";
        echo "<strong>"."Days offered: " ."</strong>". $currentrow["weekday"]. "<br>";
        echo "<strong>"."Units: " ."</strong>". $currentrow["unit_num"]. "<br>"."<br>";

        echo "<strong>"."Class Department: " ."</strong>". $currentrow["classDepartment"]. "<br>";
        echo "<strong>"."School: " ."</strong>". $currentrow["school"]. "<br>"."<br>";

        echo "<strong>"."Instructor Name: " ."</strong>". $currentrow["instructorName"]. "<br>";
        echo "<strong>"."Instructor Rating (ratemyprofessor): " ."</strong>". $currentrow["instructorRating"]. "<br>"."<br>";
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
    echo"</div>";
    echo "</div>";
    echo "</div>";
    ?>

</div>
</div>
</body>
</html>
