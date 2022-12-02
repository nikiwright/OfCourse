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
?>

<htmL>
<title>Add Page</title>
<header>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#7BC950;
        }

        #submit {
            background-color:#7BC950;
            width: 100px;
        }
        h1{
            text-align: center;
        }
    </style>
</header>
<body>
<?php
include 'adminnavbar.php';
?>

<h1 id="resultheader">Add Class</h1><br>
<?php
$sql = "SELECT * from fun_classes WHERE 1=1";

$results = $mysql -> query($sql);

if(!$results){
    echo "ERROR: " . $mysql -> error;
}
?>

<div id="mainbox">
    <div id="box1">
        Administrative Manual Class Creation
    </div>
    <div id="box2">
    <form action="" method="post">
        Course ID: <input type="text" name="courseid">
        <br>
        Class Name: <input type="text" name="classname">
        <br>
        Class Bio: <input type="text" name="classbio">
        <br>
        Class Department: <input type="text" name="classdepartment">
        <br>
        Instructor Name: <input type="text" name="instructorname">
        <br>
        Instructor Rating: <input type="text" name="instructorrating">
        <br>
        School: <select name="school">
            <?php
            $sql = "SELECT * from schools";
            $results = $mysql -> query($sql);
            while($currentrow = $results -> fetch_assoc()){
                echo"<option value='" . $currentrow["school_id"] . "'>" . $currentrow["school"] . "</option>";
            }
            ?>
        </select>
        <br>
        Interest: <select name="interest">
            <?php
            $sql = "SELECT * from interests";
            $results = $mysql -> query($sql);
            while($currentrow = $results -> fetch_assoc()){
                echo"<option value='" . $currentrow["interest_id"] . "'>" . $currentrow["interest"] . "</option>";
            }
            ?>
        </select>
        <br>
        Weekday: <select name="weekday">
            <?php
            $sql = "SELECT * from weekdays";
            $results = $mysql -> query($sql);
            while($currentrow = $results -> fetch_assoc()){
                echo"<option value='" . $currentrow["weekday_id"] . "'>" . $currentrow["weekday"] . "</option>";
            }
            ?>
        </select>
        <br>
        Units: <select name="unit">
            <?php
            $sql = "SELECT * from units";
            $results = $mysql -> query($sql);
            while($currentrow = $results -> fetch_assoc()){
                echo"<option value='" . $currentrow["unit_id"] . "'>" . $currentrow["unit_num"] . "</option>";
            }
            ?>
        </select>
        <br><br>

        <input type="submit" name="classcreate" value="Create Class" id="submit" class="button">
    </form>
    </div>
</div>
</body>
</html>
