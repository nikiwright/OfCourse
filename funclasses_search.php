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

<header>
    <title>Search Page</title>
    <link rel="stylesheet" href="./css/style.css">
</header>

<body id="body1">
<?php
    include 'sitenav.php';
?>

<div id="floatingbox">
    <?php
    if ($_SESSION['loggedin'] == "yes") {
        echo "Hello ". "<strong>".$_SESSION['first']. "! "."</strong>". "You are logged in."."<br>";
    } else {
       echo "You are not logged in. Click" ."<a id='a' href='login.php'> here </a>" . " to log in/signup!";
    }
    ?>
</div>

<div id="header">
    <h1 style="margin-bottom: -10px;">FUN CLASSES AT USC</h1><br>
    <br>
</div>
<br>


<div id="mainbox">
    <div id="box1">
        <p1>FIND YOUR NEW FAVORITE CLASS TODAY</p1>
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
            OR...
            <input type="submit" value="VIEW ALL" id="view_all" class="button">
        </form>

    </div>
</div>
<div id="text1">
    <h2>LOOKING TO SWITCH UP YOUR SCHEDULE?</h2><br>
    <p1>OfCourse believes in the importance of taking advantage of the wide range of classes that USC has to offer. Taking classes outside your major/minor requirements can be a great opportunity for growth and relaxation. But we know that a hindrance for many students is not knowing which classes to take. OfCourse is a tool made by students for students to help you find courses that boost your physical and mental wellbeing.</p1>
</div>

</body>
</htmL>
