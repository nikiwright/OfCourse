<?php
session_start();

include 'nwloginvariables.php';

$host = "??????";
$userid = "??????";
$userpw = "??????";
$db = "??????";

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

    <h1>We Found You Fun Classes! <br></h1>
    <h3>Search Results: <hr></h3>

    <?php

    $sql = 		"SELECT * FROM generalView WHERE 1=1";
    $sql .= " AND className LIKE '%" .
        $_REQUEST['className'] . "%'";

    $sql .= " AND courseID LIKE '%" .
        $_REQUEST['courseID'] . "%'";

    $sql .= " AND classDepartment LIKE '%" .
        $_REQUEST['classDepartment'] . "%'";

    $sql .= " AND professorName LIKE '%" .
        $_REQUEST['professorName'] . "%'";

    if($_REQUEST['school'] != "ALL") {
        $sql .= " AND rating ='" . $_REQUEST["school"] . "'";
    }

    $sql .= " ORDER BY ". $_REQUEST['orderby'];

    $results = $mysql->query($sql);

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    // echo "<em>You searched for Title: " . $_REQUEST['title'] . " and Rating: " . $_REQUEST['rating'] . " and Genre: " . $_REQUEST['genre'] . "</em>";
    // echo "<br><br>";
    // echo "<em>(SQL: " . $sql . "</em>)";
    // echo "<br><br>";
    echo "<em>Your results returned <strong>" .
        $results->num_rows .
        "</strong> results.</em>";
    echo "<br><br>";

    while($currentrow = $results->fetch_assoc()) {
        echo "<div Class='className'><strong>" .
            $currentrow['className'] .
            "</strong>" .
            " (<em>School: " . $currentrow['courseID'] . "</em>) </div>" .

            /* $currentrow["className"] . "'>" .
            "View</a>" .
            " | " .
            "<a href='edit_drilldown_finished.php?recordid=" .
            */

            "<br style='clear:both;'>";

    }
    ?>

</div>
</body>
</html>
