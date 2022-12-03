<?php
session_start();
//var_dump($_SESSION);

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

<?php
if ($_SESSION['logged_in'] == "yes")   // Checking whether the session is already there or not
{
?>

<div id="nav">
    <br>&nbsp
    <a href="funclasses_search.php">
        <a href="funclasses_search.php"> <img src="./css/Of-Course-Logo.png" id="logo" ></a>
        <a href="user_profile.php" class="navitem">
            USER PROFILE
        </a><br>
        <a href="wellnessblog.php" class="navitem">
            WELLNESS BLOG
        </a><br>
        <a href="sitepurpose.php" class="navitem">
            SITE PURPOSE
        </a><br>
        <a href="add_course.php" class="navitem">
            ADD A COURSE
        </a><br>
</div>

<?php
} else {

    ?>

<div id="nav">
    <br>&nbsp
    <a href="funclasses_search.php">
        <a href="funclasses_search.php"> <img src="./css/Of-Course-Logo.png" id="logo" ></a>
        <a href="user_profile.php" class="navitem">
            USER PROFILE
        </a><br>
        <a href="wellnessblog.php" class="navitem">
            WELLNESS BLOG
        </a><br>
        <a href="sitepurpose.php" class="navitem">
            SITE PURPOSE
        </a><br>
        <a href="login.php" class="navitem">
            LOG IN
        </a><br>
</div>

    <?php
}

?>