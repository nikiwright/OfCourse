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

session_start();
?>

<html>
<header>
    <title>Add Review</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#7BC950;
        }

        #submit {
            background-color:#7BC950;
            width: 100px;
        }
        h1{
            text-align: center;
        }
    </style>
</header>
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
include 'adminnavbar.php';
?>

<h1 id="resultheader">Add Review</h1><br>
<div id="mainbox">
    <div id="box1">
        Administrative Manual Review Creation
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
                    <td> <br> <input type="submit" name="usercreate" value="Create User" id="submit" class="button"></td>
                    <td></td>
                </tr>

            </table>


        </form>

        <?php

        if ((empty($_POST['firstName']))
            &(empty($_POST['lastName']))
            &(empty($_POST['username']))
            &(empty($_POST['password']))) {
            echo "";
            exit();
        } else {

            $sql2 = "SELECT * FROM users WHERE 
                        username='" . $_POST['username'] . "'";

            $results2 = $mysql->query($sql2);

            if (!$results2) {
                echo "<hr>Your SQL:<br> " . $sql2 . "<br><br>";
                echo "SQL Error: " . $mysql->error . "<hr>";
                exit();
            }

            if ($results2->num_rows === 1) {

                $row2 = mysqli_fetch_array($results2);

                if ($row2['username'] ===  $_POST['username']) {
                    echo "Sorry! This username is already taken, try another one.";
                    exit();

                } else {
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
//                      echo $results;
                        echo "You have successfully created an account! ";
                    }

                }

            } else {
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
//                  echo $results;
                    echo "You have successfully created an account!";
                }

            }
        }
        ?>

    </div>
</div>




</body>


</html>