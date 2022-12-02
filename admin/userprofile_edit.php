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
    <title>Administrative Manual User Edit</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
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
    <h1 id="resultheader">Edit User</h1><br>

    <div id="mainbox">
        <div id="box1">
            Administrative Manual User Editing
        </div>

        <div id="box2">
            <?php

            $sql = "SELECT * FROM users WHERE 1=1";


            $results = $mysql->query($sql);

            if(!$results) {
                echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                echo "SQL Error: " . $mysql->error . "<hr>";
                exit();
            }

            while($currentrow = $results->fetch_assoc()) {
                echo "<div class='title'><strong>" . $currentrow['user_firstName'] . " " . $currentrow['user_lastName'] . "</strong>".
                    "<p1> ". $currentrow['username']. "</p1>" .
                    "<a href='updateuser.php?recordid=" . $currentrow["user_id"] . "'> Edit </a>" .
                    "<br style='clear:both;'>";

            }
            ?>
        </div>

</div>

</body>
</html>