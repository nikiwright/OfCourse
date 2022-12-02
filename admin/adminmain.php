<?php
session_start();

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
<htmL>
<title>Search Page</title>
<header>
    <link rel="stylesheet" href="../css/style.css">
</header>

<body id="body1">
<div>
<?php
include 'adminnavbar.php';
?>
</div>

<div id="header">
    <h1 style="margin-bottom: -10px;">ADMIN PAGE</h1><br>
    <br>
</div>
<br>


<div id="mainbox">
    <div id="box1">
        <p1>ADMINISTRATIVE OPTIONS</p1>
    </div>
    <div id="mainadmin">
        <p1>USER PROFILES:</p1>
        <a href="userprofile_add.php" class="adminbutton">
            ADD
        </a>
        <a href="userprofile_edit.php" class="adminbutton">
            EDIT
        </a>
        <p1>CLASSES:</p1>
        <a href="class_add.php" class="adminbutton">
            ADD
        </a>
        <a href="classlist_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="classlist_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>REVIEWS:</p1>
        <a href="review_add.php" class="adminbutton">
            ADD
        </a>
        <a href="review_edit.php" class="adminbutton">
            EDIT
        </a>
    </div>
</body>
</htmL>
