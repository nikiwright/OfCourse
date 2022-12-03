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
    <title>Administrative Manual Review Add</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
        }

    </style>
</header>
<body>
<?php
include 'adminnavbar.php';
?>
<h1 id="resultheader">Choose a Class to Add a Review</h1><br>

<div id="mainbox">
    <div id="box1">
        Administrative Manual Review Adding
    </div>

    <div id="box2">
        <?php

        $sql = "SELECT distinct className, fun_classes_id FROM reviewsView3 WHERE 1=1";


        $results = $mysql->query($sql);

        if(!$results) {
            echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
            echo "SQL Error: " . $mysql->error . "<hr>";
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<div class='title'><strong>" . $currentrow['className'] . "</strong>".
                "<p1> ". $currentrow["courseID"]. "</p1>" .
                "<a href='review_add.php?recordid=" . $currentrow["fun_classes_id"] . "'> Select </a>" .
                "<br style='clear:both;'>";

        }
        ?>
    </div>

</div>

</body>
</html>