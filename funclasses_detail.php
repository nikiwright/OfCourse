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

<!--email component-->
<div id="floatingbox">
    <form action=""  method="post">
        <table width="250" border="0">
            <div class="pi">Fun classes are more fun together! <br> Send this class to a friend: </div>
            <br>
            <tr>
                <td> Friend's Email</td>
                <td><input type="text" placeholder="tommytrojan@usc.edu" name="friend_email" required></td>
            </tr>
            <tr>
                <td> Your Email</td>
                <td><input type="text" placeholder="traveller@usc.edu" name="user_email" required></td>
            </tr>
            <tr>
                <td> <br> <input type="submit" id="submit" class="button" name="send" value="SEND"></td>
                <td></td>
            </tr>
        </table>
        <br style="clear:both;">
    </form>

    <?php
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    // Append the host(domain name, ip) to the URL.
    $url.= $_SERVER['HTTP_HOST'];

    // Append the requested resource location to the URL
    $url.= $_SERVER['REQUEST_URI'];

    //    echo $url;
    ?>

    <?php if(!empty($_REQUEST["friend_email"])) {

        $to = $_REQUEST["friend_email"]; // from the form
        $subject = "You might like this fun class @ USC...";
        $message = "Hello! A friend suggested you might like: ". $url. "\r";
        $message .="--------------------------------\r";

        while($currentrow = $results->fetch_assoc()) {
            $message .= "Course Title: ". $currentrow["className"] .  "\r".
                "CourseID: " . $currentrow["courseID"] .  "\r".
                "About: ". $currentrow["classBio"] .
                "\r"; // \r is a carriage return in plain text
        }
        $results->seek_row(0);
        $from =  $_REQUEST["user_email"]; // from the form
        $headers = "From: $from"; // create a header entry for "FROM" email field

        $send = mail($to,$subject,$message,$headers);
        if ($send == 1)
        {
            echo "Thank You! Your email sent to " . $_REQUEST["friend_email"];
            echo $message;
            exit();
        } else {
            echo 'Unable to send email. Please try again.';
        }

    }
    ?>

</div>

</div>
</body>
</html>
