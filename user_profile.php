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

session_start();   // session starts
?>


<html>
<head>
    <title> User Profile </title>
    <link rel="stylesheet" href="./css/style.css">
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

        #admin {
            color: black;
        }

    </style>
</head>
<body>
<?php
include 'sitenav.php';
?>

<!--Session Variables: <em>--><?//= print_r($_SESSION) ?><!--</em>-->

<h1 id="resultheader">USER PROFILE</h1><br>
<div id="mainbox">
    <div id="box1">
        <?php
        if ($_SESSION['logged_in'] == "yes") {
       echo "Hello ". $_SESSION['first'] . "!". "<br>". "You are logged in.";
        } else {
           echo "You are not logged in. Click" ."<a id='a' href='login.php'> here </a>" . " to log in/signup!";
        }

        if ($_SESSION['security_level'] == "0") {
            echo "You have admin access. Go to". "<a href='admin/adminmain.php' id='admin'> Admin Page. </a>";
        } else {
            "";
        }

        ?>
    </div>
    <div id="box2">
        <?php
        if ($_SESSION['logged_in'] == "yes") {
            echo "First Name: " . $_SESSION['first'] . "<br>" .
                "Last Name: " . $_SESSION['last'] . "<br>" .
                "Username: " . $_SESSION['username'] . "<br>";

            echo "<a href='logout.php'>"."<br>".
                "<input type='submit' name='logout' value='LOGOUT' id='submit' class='button'>".
                "</a>";


            echo "<a href='edit_profile.php'>".
                "<input type='submit' name='edituserprofile' value='EDIT PROFILE' id='edit' class='button'>".
                "</a>";

        } else {
         echo "Log in/ sign up to view/edit your profile!";
        }
        ?>
    </div>
</div>
</body>
</html>