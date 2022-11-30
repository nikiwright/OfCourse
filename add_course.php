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
    <title>Add a Course</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #transparentbox {
            text-align: center;
            width: 50%;
            margin-left: 23%;
            font-size: 16pt;
            position: relative;
            height: auto;
            background-color: rgba(255,255,255,.5);
            border-radius: 20px;
            height: auto;
            padding: 1%;
            z-index: 2;
            box-shadow: 2px 2px 5px black;
        }

        .button {
            width: 110px;
        }

        a {
            color: black;
        }

    </style>
</header>
<body>
<?php
include 'sitenav.php';
?>
<h1 id="resultheader">ADD A FUN COURSE YOU'VE TAKEN!</h1><br>


<div id="transparentbox">

    <?php
    if ($_SESSION['logged_in'] == "yes")   // Checking whether the session is already there or not
    {
?>
        <form action="" method="post">
            <table width="300" border="0">
                <tr>
                    <td> Course ID: </td>
                    <td> <input type="text" name="courseid" required></td>
                </tr>
                <tr>
                    <td> Course Title: </td>
                    <td> <input type="text" name="classname" required></td>
                </tr>
                <tr>
                    <td> About/Bio: </td>
                    <td>  <input type="text" name="classbio" required></td>
                </tr>
                <tr>
                    <td>  Class Department:  </td>
                    <td> <input type="text" name="classdepartment" required></td>
                </tr>
                <tr>
                    <td> Instructor Full Name:  </td>
                    <td> <input type="text" name="instructorname" required></td>
                </tr>
                <tr>
                    <td>  Instructor Rating (ratemyprofessor if applicable):  </td>
                    <td> <input type="number" name="instructorrating" min="1.0" max="5.0"></td>
                </tr>
                <tr>
                    <td> School:  </td>
                    <td><select name="school" value ="<?php echo $recorddata['interest']; ?>" >
                            <?php
                            $sql = "SELECT * from schools";
                            $results = $mysql -> query($sql);
                            while($currentrow = $results -> fetch_assoc()){
                                echo"<option value='" . $currentrow["school_id"] . "'>" . $currentrow["school"] . "</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td> Interest: </td>
                    <td><select name="interest" value ="<?php echo $recorddata['interest']; ?>">
                            <?php
                            $sql = "SELECT * from interests";
                            $results = $mysql -> query($sql);
                            while($currentrow = $results -> fetch_assoc()){
                                echo"<option value='" . $currentrow["interest_id"] . "'>" . $currentrow["interest"] . "</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td> Weekday: </td>
                    <td><select name="weekday" value ="<?php echo $recorddata['weekday']; ?>">
                            <?php
                            $sql = "SELECT * from weekdays";
                            $results = $mysql -> query($sql);
                            while($currentrow = $results -> fetch_assoc()){
                                echo"<option value='" . $currentrow["weekday_id"] . "'>" . $currentrow["weekday"] . "</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td> Units: </td>
                    <td><select name="unit" value ="<?php echo $recorddata['unit_num']; ?>">
                            <?php
                            $sql = "SELECT * from units";
                            $results = $mysql -> query($sql);
                            while($currentrow = $results -> fetch_assoc()){
                                echo"<option value='" . $currentrow["unit_id"] . "'>" . $currentrow["unit_num"] . "</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td> <br>  <input type="submit" name="addcourse" value="ADD COURSE" id="submit" class="button"></td>
                    <td></td>
                </tr>
            </table>
        </form>

    <?php
    } else {
        echo "<a href='login.php'> Log In </a>". "to add a course.";
    }

    ?>


    <?php

    if ((empty($_POST['courseid']))
        &(empty($_POST['classname']))
        &(empty($_POST['classbio']))
        &(empty($_POST['classdepartment']))
        &(empty($_POST['instructorname']))) {
        echo "";
        exit();
    } else {
        $sql2 = "SELECT * FROM fun_classes WHERE 
        courseID='" . $_POST['courseid'] . "'
        AND className='" . $_POST['classname'] . "'";

        $results2 = $mysql->query($sql2);

    if (!$results2) {
        echo "<hr>Your SQL:<br> " . $sql2 . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    if ($results2->num_rows === 1) {

        $row2 = mysqli_fetch_array($results2);

        if ($row2['courseID'] === $_POST['courseid'] & $row2['className'] === $_POST['classname']) {
            echo "This class is already in our database! You can find it by searching for it "
                . "<a href='funclasses_search.php'> here </a>";
            exit();

        } else {
            $sql = "INSERT INTO fun_classes
        (courseID, className, classBio, classDepartment, instructorName, instructorRating, school_id, interest_id, weekday_id, unit_id)
        
        VALUES
        ('" . $_POST["courseid"] . "',
        '" . $_POST["classname"] . "',
        '" . $_POST["classbio"] . "',
        '" . $_POST["classdepartment"] . "',
        '" . $_POST["instructorname"] . "',
        '" . $_POST["instructorrating"] . "',
        " . $_POST["school"] . ",
        " . $_POST["interest"] . ",
        " . $_POST["weekday"] . ",
        " . $_POST["unit"] . ")";

            $results = $mysql->query($sql);

            if (!$results) {
                echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                echo "SQL Error: " . $mysql->error . "<hr>";
                exit();

            } else {
//          echo $results;
                echo "You have successfully added a course to our database! 
                Thank you for your recommendation.";
            }

        }

    } else {
         $sql = "INSERT INTO fun_classes
        (courseID, className, classBio, classDepartment, instructorName, instructorRating, school_id, interest_id, weekday_id, unit_id)
        
        VALUES
        ('" . $_POST["courseid"] . "',
        '" . $_POST["classname"] . "',
        '" . $_POST["classbio"] . "',
        '" . $_POST["classdepartment"] . "',
        '" . $_POST["instructorname"] . "',
        '" . $_POST["instructorrating"] . "',
        " . $_POST["school"] . ",
        " . $_POST["interest"] . ",
        " . $_POST["weekday"] . ",
        " . $_POST["unit"] . ")";

            $results = $mysql->query($sql);

            if (!$results) {
                echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                echo "SQL Error: " . $mysql->error . "<hr>";
                exit();

            } else {
//          echo $results;
                echo "You have successfully added a course to our database! 
                Thank you for your recommendation.";
            }

        }
    }

    ?>
</div>
</body>

</htmL>