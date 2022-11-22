<?php

session_start();

include '../nwloginvariables.php';

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

$sql = "SELECT * from fun_classes WHERE 1=1";

echo "SQL: " . $sql;

$results = $mysql -> query($sql);

if(!$results){
    echo "ERROR: " . $mysql -> error;
}

echo "<br><h1>Add Class</h1><br>";
?>
<form action="insertclass.php">

    <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"]; ?>">

    <?php

    $recorddata = $results -> fetch_assoc();

    ?>
    Course ID: <input type="text" name="courseid" value="<?php echo $recorddata["courseID"]; ?>">
    <br>
    Class Name: <input type="text" name="classname" value="<?php echo $recorddata["className"]; ?>">
    <br>
    Class Bio: <input type="text" name="classbio" value="<?php echo $recorddata["classBio"]; ?>">
    <br>
    Class Department: <input type="text" name="classdepartment" value="<?php echo $recorddata["classDepartment"]; ?>">
    <br>
    Professor First Name: <input type="text" name="fname" value="<?php echo $recorddata["professorFirstName"]; ?>">
    <br>
    Professor Last Name: <input type="text" name="lname" value="<?php echo $recorddata["professorLastName"]; ?>">
    <br>
    Professor Rating: <input type="text" name="professorrating" value="<?php echo $recorddata["professorRating"]; ?>">
    <br>
    School: <select name="school" value ="<?php echo $recorddata['school']; ?>">
        <?php
        $sql = "SELECT * from schools";
        $results = $mysql -> query($sql);
        while($currentrow = $results -> fetch_assoc()){
            echo"<option value='" . $currentrow["school_id"] . "'>" . $currentrow["school"] . "</option>";
        }
        ?>
    </select>
    <br>
    Weekday: <select name="weekday" value ="<?php echo $recorddata['weekday']; ?>">
        <?php
        $sql = "SELECT * from weekdays";
        $results = $mysql -> query($sql);
        while($currentrow = $results -> fetch_assoc()){
            echo"<option value='" . $currentrow["weekday_id"] . "'>" . $currentrow["weekday"] . "</option>";
        }
        ?>
    </select>
    <br>
    Units: <select name="unit" value ="<?php echo $recorddata['unit_num']; ?>">
        <?php
        $sql = "SELECT * from units";
        $results = $mysql -> query($sql);
        while($currentrow = $results -> fetch_assoc()){
            echo"<option value='" . $currentrow["unit_id"] . "'>" . $currentrow["unit_num"] . "</option>";
        }
        ?>
    </select>
    <br>

    <input type="submit" value="Save Edits">
</form>
