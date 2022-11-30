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
    <title> Login Page </title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FF5E5B;
        }

        #submit {
            background-color:#FF5E5B;
        }

    </style>
</head>

<body>
<?php
include 'sitenav.php';
?>
<!--Session Variables: <em>--><?//= print_r($_SESSION) ?><!--</em>-->

<h1 id="resultheader">LOG IN</h1><br>
<div id="mainbox">
    <div id="box1">
        Need an account? <a href="signup.php"> Sign Up </a>

    </div>
    <div id="box2">
        <form action="" method="post">

            <table width="200" border="0">
                <tr>
                    <td> Username</td>
                    <td><input type="text" name="user" required></td>
                </tr>
                <tr>
                    <td> Password</td>
                    <td><input type="password" name="pass" required></td>
                </tr>
                <tr>
                    <td> <br> <input type="submit" name="login" value="LOGIN" id="submit" class="button"></td>
                </tr>
            </table>
        </form>

        <?php

        $user = ($_POST['user']);
        $pass = ($_POST['pass']);

        if ((empty($user))&(empty($pass))) {

            echo "";

            exit();

        }

        if ($_SESSION['logged_in'] == "yes")   // Checking whether the session is already there or not
        {
            // all good
//            echo "Logged in!";
//            print_r($_SESSION);
            header('Location:user_profile.php');

        } else {

            $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
            $results = $mysql->query($sql);

            if (!$results) {
                echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                echo "SQL Error: " . $mysql->error . "<hr>";
                exit();
            }

            if ($results->num_rows === 1) {

                $row = mysqli_fetch_array($results);

               if ($row['username'] === $user && $row['password'] === $pass) {

                    $_SESSION['username'] = $row['username'];
                    $_SESSION['first'] = $row['user_firstName'];
                    $_SESSION['last'] = $row['user_lastName'];
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['pass'] = $row['password'];
                   $_SESSION['security_level'] = $row['security_level'];
                    $_SESSION['logged_in'] = "yes";
                    header('Location:user_profile.php');
                    exit();

                } else {
                    echo "invalid Username or Password";
                    exit();
                }
            }  else {
                echo "invalid Username or Password, try again.";
                exit();
            }
        }

        ?>

    </div>

</div>



</body>
</html>