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
    <title> Edit Profile </title>
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

    </style>
</head>
<body>
<?php
include 'sitenav.php';
?>

<!--Session Variables: <em>--><?//= print_r($_SESSION) ?><!--</em>-->

<h1 id="resultheader">EDIT YOUR PROFILE</h1><br>
<div id="mainbox">
    <div id="box1">
        <?php
        if ($_SESSION['logged_in'] == "yes") {
            echo "Hello ". $_SESSION['first'] . "!". "<br>". "You are currently editing your profile.";
        } else {
            echo "You are not logged in. Click" ."<a id='a' href='login.php'> here </a>" . " to log in/signup!";
            exit();
        }
        ?>
    </div>
    <div id="box2">
        <form action ="update_profile.php" method="post">
            <table width="250" border="0">
                <tr>
                    <td> First Name: </td>
                    <td><input type="text" name="firstName" placeholder="<?php echo $_SESSION['first']?>" required></td>
                </tr>
                <tr>
                    <td> Last Name: </td>
                    <td><input type="text" name="lastName" placeholder="<?php echo $_SESSION['last']?>" required></td>
                </tr>
                <tr>
                    <td> Username: </td>
                    <td><input type="text" name="username" minlength="5" placeholder="<?php echo $_SESSION['username']?>" required></td>
                </tr>
                <tr>
                    <td> Password: </td>
                    <td><input type="text" name="password" minlength="8" placeholder="<?php
                        echo $_SESSION['pass']
                        ?>" required></td>
                </tr>
                <tr>  <td> <input type='submit' name='save' value='SAVE CHANGES' id='edit' class='button'></td>  </tr>
                <tr>  <td>  <?php
                        echo "<a href='user_profile.php'>"."<br>".
                            "<input type='submit' name='discard' value='DISCARD' id='submit' class='button'>".
                            "</a>";
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>