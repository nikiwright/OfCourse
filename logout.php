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
?>

<html>
<header>
    <title>Log Out Page</title>
</header>
<body>
<?php
// logout routine
session_start();
//unset($_SESSION["loggedin"]);

session_unset();

session_destroy();
echo "You have successfully LOGGED OUT". "<br>";
echo "Log back in? Click here: ". "<a href='login.php'>". "LOG IN". "</a>"."<br>";

echo print_r($_SESSION);
?>

</body>
</html>
