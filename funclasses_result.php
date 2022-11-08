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
<title> Results Page </title>
<header>
    <link rel="stylesheet" href="style.css">
</header>
<body>
<div id="container">

    <h1>We Found You Fun Classes! <br></h1>
    <h3>Search Results: <hr></h3>

    <?php

    $sql = "SELECT * FROM generalView WHERE 1=1
    AND courseID LIKE '%" . $_REQUEST["courseID"] . "%'
     AND className LIKE '%" . $_REQUEST["className"] . "%'
     AND classDepartment LIKE '%" . $_REQUEST["classDepartment"] . "%'
      AND instructorName LIKE '%" . $_REQUEST["instructorName"] . "%'";

    if ($_REQUEST['school'] != "ALL") {
        $sql .= " AND school_id ='" . $_REQUEST["school"] . "'";
    }
    if ($_REQUEST['interest'] != "ALL") {
        $sql .= " AND interest_id ='" . $_REQUEST["interest"] . "'";
    }
    if ($_REQUEST['unit'] != "ALL") {
        $sql .= " AND unit_id ='" . $_REQUEST["unit"] . "'";
    }

    $x = 0;

    //Check if checkbox is checked
    if(!empty($_REQUEST['monday'])){
        #Checkbox selected code
        $x = 1;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty($_REQUEST['tuesday'])){
        $x = 2;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty($_REQUEST['wednesday'])){
        $x = 3;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty($_REQUEST['thursday'])){
        $x = 4;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty($_REQUEST['friday'])){
        $x = 5;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['wednesday']))){
        $x = 6;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty(($_REQUEST['tuesday']) AND ($_REQUEST['thursday']))){
        $x = 10;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']))){
        $x = 11;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']) AND ($_REQUEST['friday']))){
        $x = 8;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']) AND ($_REQUEST['thursday']))){
        $x = 7;
        $sql .= " AND weekday_id = $x";
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']) AND ($_REQUEST['thursday']) AND ($_REQUEST['friday']))){
        $x = 9;
        $sql .= " AND weekday_id = $x";
    }





    $results = $mysql->query($sql);
    //    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    echo "<em>Your results returned <strong>" .
        $results->num_rows .
        "</strong> results. </em>";
    echo "<br><br>";

    while($currentrow = $results->fetch_assoc()) {
        echo "<div Class='className'><strong>" .
            $currentrow['className'] . "</strong>" .
            " (<em>" . $currentrow['courseID'] . "</em>)" .

            "<a href='funclasses_detail.php?recordid=" . $currentrow["fun_classes_id"]. "' class='detaillink'>".
            " [View Class Details]". "</a>"."</div>"."<br>";

    }
    ?>

</div>
</body>
</html>
