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

if(empty($_REQUEST["recordid"])){
    echo "ERROR. Please go through class edit list page.";
    exit();
}

$sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];

$results = $mysql -> query($sql);

if(!$results){
    echo "ERROR: " . $mysql -> error;
}

while($currentrow = $results -> fetch_assoc()){
    echo"<h1>Edit " . $currentrow["className"] . "</h1>";

}
?>
<form action="update_classes.php">

    <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"]; ?>">

    <?php

    $recorddata = $results -> fetch_assoc();

    ?>
    Course ID: <input type="text" name="courseID" value="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
    echo $currentrow["courseID"];
    }?>">
    <br>
    Class Name: <input type="text" name="className" value="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["className"];
    }?>">
    <br>
    Class Bio: <input type="text" name="classBio" value="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["classBio"];
    }?>">
    <br>
    Class Department: <input type="text" name="classDepartment" value="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["classDepartment"];
    }?>">
    <br>
    Instructor Name: <input type="text" name="instructorName" value="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["instructorName"];
    }?>">
    <br>
    Instructor Rating: <input type="text" name="instructorRating" value="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["instructorRating"];
    }?>">
    <br>
    School: <select name="school" value ="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["school_id"];
    }?>">
        <?php
        $sql = "SELECT * from schools";
        $results = $mysql -> query($sql);
        while($currentrow = $results -> fetch_assoc()){
            echo"<option value='" . $currentrow["school_id"] . "'>" . $currentrow["school"] . "</option>";
        }
        ?>
    </select>
    <br>
    Interest: <select name="interest" value ="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["interest_id"];
    }?>">
        <?php
        $sql = "SELECT * from interests";
        $results = $mysql -> query($sql);
        while($currentrow = $results -> fetch_assoc()){
            echo"<option value='" . $currentrow["interest_id"] . "'>" . $currentrow["interest"] . "</option>";
        }
        ?>
    </select>
    <br>
   Weekday: <select name="weekday" value ="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["weekday_id"];
    }?>">
        <?php
        $sql = "SELECT * from weekdays";
        $results = $mysql -> query($sql);
        while($currentrow = $results -> fetch_assoc()){
            echo"<option value='" . $currentrow["weekday_id"] . "'>" . $currentrow["weekday"] . "</option>";
        }
        ?>
    </select>
    <br>
    Units: <select name="unit_num" value ="<?php
    $sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];
    $results = $mysql -> query($sql);
    while($currentrow = $results -> fetch_assoc()){
        echo $currentrow["unit_id"];
    }?>">
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
