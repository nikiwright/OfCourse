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
    <title>Search Page</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7HR3PWKYET"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7HR3PWKYET');
</script>
<body id="body1">

<?php
    include 'sitenav.php';
?>

<div id="detailbox" style="width: 15%; margin-right: 3%; margin-top: -5%; padding: 20px;float: right;">
    <?php
    if ($_SESSION['logged_in'] == "yes") {
        echo "Hello ". "<strong>".$_SESSION['first']. "! "."</strong>". "You are logged in."."<br><br>";
        echo "Your most recently viewed class: "."<a href=". $_SESSION['courseurl']. ">".  $_SESSION['coursename']."</a>" . "<br>";
    } else {
       echo "You are not logged in. Click" ."<a id='a' href='login.php'> here </a>" . " to log in/signup!";
    }
    ?>
</div>

<h1 id="header">FUN CLASSES AT USC</h1><br>

<div id="mainbox">
    <div id="box1">
        <p1>FIND YOUR NEW FAVORITE CLASS TODAY</p1><br>
    </div>
    <div id="box2">
        <form action="funclasses_result.php">

         <div id="dropdowns">
             <select name="interest" class="searchselect">
                 <option value="ALL">Interests</option>
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

             <select name="school" class="searchselect">
                 <option value="ALL">School</option>
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

             <select name="unit_num" class="searchselect">
                 <option value="ALL">Units</option>
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

         </div>

            <br><space></space><space></space><space></space><space></space><br>

            <div id="checkboxes">
                <input type="checkbox" id="monday" name="monday" value="Monday">
                <label for="monday">Monday</label><br>
                <input type="checkbox" id="tuesday" name="tuesday" value="Tuesday">
                <label for="tuesday">Tuesday</label><br>
                <input type="checkbox" id="wednesday" name="wednesday" value="Wednesday">
                <label for="wednesday">Wednesday</label><br>
                <input type="checkbox" id="thursday" name="thursday" value="Thursday">
                <label for="thursday">Thursday</label><br>
                <input type="checkbox" id="friday" name="friday" value="Friday">
                <label for="friday">Friday</label><br>
            </div>
            <br><space></space><space></space><space></space><space></space><br>

            <input type="submit" value="SUBMIT" id="submit" class="button">

        </form>
        OR <a href="funclasses_result.php?interest=ALL&school=ALL&unit_num=ALL"> VIEW ALL </a><br><br>
        <a href="classreviewviz.php" style="font-size: 12pt; color: black; text-decoration: underline;">See the most reviewed classes</a>

    </div>
</div>

<div id="text1">
    <h2 style="color: black;">LOOKING TO SWITCH UP YOUR SCHEDULE?</h2><br>
    <p1>
        OfCourse is a tool made by students for students to help you
        find courses that boost your physical and mental wellbeing.</p1>
    <a href="sitepurpose.php" style="color: black"> Learn More </a>
</div>


</body>
</html>
