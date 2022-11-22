<?php

include 'nwloginvariables.php';

//CAN THE USERS DATABASE BE ACCESSED WITH THESE LOGIN CREDENTIALS?

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

session_start();
?>

<html>
<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#7BC950;
        }

        #submit {
            background-color:#7BC950;
        }
        h3{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
include 'sitenav.php';
?>

<h1 id="resultheader">SIGN UP</h1><br>

<div id="mainbox">
    <div id="box1">
        Already have an account? <a href="login.php"> Log In </a>
    </div>
    <div id="box2">

        <form action ="" method="post">


            <table width="250" border="0">
                <tr>
                    <td> First Name: </td>
                    <td><input type="text" name="firstName" required></td>
                </tr>
                <tr>
                    <td> Last Name: </td>
                    <td><input type="text" name="lastName" required></td>
                </tr>
                <tr>
                    <td> Username: </td>
                    <td><input type="text" name="username" minlength="5" required></td>
                </tr>
                <tr>
                    <td> Password: </td>
                    <td><input type="text" name="password" minlength="8" required></td>
                </tr>
                <tr>
                    <td> <br> <input type="submit" name="signup" value="SIGN UP" id="submit" class="button"></td>
                    <td></td>
                </tr>

            </table>


        </form>

    <?php
    $sql = "INSERT INTO users 
    (user_firstName, user_lastName, username, password) 
    
    VALUES ('" . $_POST['firstName'] . "',
    '" . $_POST['lastName'] . "',
    '" . $_POST['username'] . "',
    '" . $_POST['password'] . "' )";

    $results = $mysql->query($sql);

    if (!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    } else {
        echo $results;

    }


    ?>


    </div>
</div>




</body>


</html>