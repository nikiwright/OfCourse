<?php

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

include 'sitenav.php';

?>

<html>
<header>
    <title>Log Out Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #transparentbox {
            text-align: center;
            width: 30%;
            margin-left: 35%;
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
        #a {
            color: black;
         font-weight: bold;
        }

    </style>
</header>
<body>
<div id="transparentbox">
    <?php
    // logout routine
    session_start();
    //unset($_SESSION["logged_in"]);

    session_unset();

    session_destroy();
    echo "You have successfully LOGGED OUT". "<br>"."<br>";
    echo "We are sad to see you go. Want to keep finding fun classes?"."<br>"."<br>".
        " Click ". "<a id='a' href='login.php'>". "here". "</a>". " to log back in."."<br>";

//    echo print_r($_SESSION);
    ?>

</div>


</body>
</html>
