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
<title>Edit Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
        }

        #box2 {
            flex-grow: 10;
        }

        #a {
            color: black;
            font-weight: bold;
        }

        #submit {
            background-color: #FF5E5B;
        }

        #edit {
            background-color: #7BC950;
            font-weight: bold;
            border-width: 2px;
            text-align: center;
            padding: 2px;
            color: white;
            width: 120px;
            margin-left: 3%;
        }

        #edit:hover{
            background-color: white;
            color: black;
        }
    </style>
</header>
<body>
    <?php
    include 'adminnavbar.php';
    ?>
    <h1 id="resultheader">Edit Classes</h1><br>
<div id="mainbox">
    <div id="box1">
        Administrative Manual Class Editing
    </div>
    <div id="box2">
        <?php

        $sql = "SELECT * FROM generalView WHERE 1=1";


        $results = $mysql->query($sql);

        if(!$results) {
            echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
            echo "SQL Error: " . $mysql->error . "<hr>";
            exit();
        }

        while($currentrow = $results->fetch_assoc()) {
            echo "<div class='title'><strong>" . $currentrow['className'] . "</strong>".
                "<p1> ". $currentrow["courseID"]. "</p1>" .
                "<a href='class_edit.php?recordid=" . $currentrow["fun_classes_id"] . "'> Edit </a>" .
                "<br style='clear:both;'>";

        }
    ?>
    </div>

</div>

</body>
</html>