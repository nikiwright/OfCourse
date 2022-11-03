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
<htmL>
<title>Search Page</title>
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
    <h1> Search page</h1>

    <form action="funclasses_result.php">
      Class Title:<input type="text" name="className">
        <br style="clear:both;">

     CourseID:<input type="text" name="courseID">
        <br style="clear:both;">

     Department:<input type="text" name="classDepartment">
     <br style="clear:both;">

     Instructor Name:<input type="text" name="professorName">
     <br style="clear:both;">

   School: <select name="school">
        <option value="ALL">Select a school</option>
        <?php

        $sql = "SELECT * FROM schools
                WHERE school != '' AND school != ' ' 
                 ORDER BY school";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL error: ". $mysql->error;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['school_id'] . "'>" . $currentrow['school'] . "</option>";
        }
        ?>
    </select>
    <br style="clear:both;">

    Area of Interest: <select name="interest">
        <option value="ALL">Select an area of interest</option>
        <?php

        $sql = "SELECT * FROM interests
                WHERE interest != '' AND interest != ' ' 
                 ORDER BY interest";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL error: ". $mysql->error;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['interest_id'] . "'>" . $currentrow['interest'] . "</option>";
        }
        ?>
    </select>
    <br style="clear:both;">

    Units: <select name="unit">
        <option value="ALL">Select the number of units</option>
        <?php

        $sql = "SELECT * FROM units
                WHERE unit_num != '' AND unit_num != ' ' 
                 ORDER BY unit_num";

        $results = $mysql->query($sql);

        if(!$results) {
            echo "SQL error: ". $mysql->error;
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<option value='" . $currentrow['unit_id'] . "'>" . $currentrow['unit_num'] . "</option>";
        }
        ?>
    </select>
    <br style="clear:both;">

        Weekdays:
        <input type="checkbox" id="monday" name="monday" value="monday">
        <label for="monday"> Monday</label>
        <input type="checkbox" id="tuesday" name="tuesday" value="tuesday">
        <label for="tuesday"> Tuesday</label>
        <input type="checkbox" id="wednesday" name="wednesday" value="wednesday">
        <label for="wednesday"> Wednesday</label>
        <input type="checkbox" id="thursday" name="thursday" value="thursday">
        <label for="thursday"> Thursday</label>
        <input type="checkbox" id="friday" name="friday" value="friday">
        <label for="friday"> Friday</label><br>
        <br style="clear:both;">

   <input type="submit" value="Search">
</div>
</form>
</body>
</htmL>
