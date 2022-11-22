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
            font-size: 16pt;
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
    //unset($_SESSION["loggedin"]);

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
