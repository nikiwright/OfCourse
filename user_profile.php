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
//var_dump($_SESSION);
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

        #parentreviewbox {
            text-align: center;
            margin-left: 20%;
            margin-top: 2%;
            width: 60%;
            position: relative;
            background-color: rgba(255,255,255,.5);
            border-radius: 20px;
            height: auto;
            padding: 1%;
            z-index: 2;
            box-shadow: 2px 2px 5px black;
        }

        #childreviewbox {
            text-align: left;
            margin-left: 10%;
            margin-top: 2%;
            width: 60%;
            position: relative;
            background-color: rgba(255,255,255,.5);
            border-radius: 20px;
            height: auto;
            padding: 3%;
            z-index: 2;
            box-shadow: 2px 2px 5px black;
        }

    </style>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7HR3PWKYET"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7HR3PWKYET');
</script>
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
            echo "You have admin access. Click". "<a href='admin/adminmain.php' id='admin' target='_blank'> here </a>" . " to go to admin page!";
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

<div id="parentreviewbox">
    <?php
    if ($_SESSION['logged_in'] == "yes") {
        echo "<strong>"."Your Reviews "."</strong>"."<br>";

        $sql2 = "SELECT * from reviewsView3
         WHERE user_id =" .
            $_SESSION['id'];

//        echo "SQL: ". $sql2. "<br>"."<br>";

        $results = $mysql -> query($sql2);
        echo " You have written ". $results -> num_rows . " reviews:" . "<br><br>";
        if(!$results){
            echo "ERROR: " . $mysql -> error;
        }

        while ($currentrow = $results -> fetch_assoc()){
            echo "<div id='childreviewbox'>".$currentrow["className"].":". " '". $currentrow["review"]. "'". "<br>". "</div>";
//            "<br style='clear:both;'>";
        }

    }
    ?>

</div>
</body>
</html>