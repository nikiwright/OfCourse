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
    <style>
        #mainbox {
            text-align: center;
        }
    </style>
</header>

<body id="body1">
<?php
include 'adminnavbar.php';
?>
<h1 id="header">ADMIN PAGE</h1><br>

<div id="mainbox">
    <div id="box1">
        <p1>ADMINISTRATIVE OPTIONS</p1>
    </div>
    <div id="box2">
        <p1>USER PROFILES:</p1>
        <a href="user_add.php" class="adminbutton">
            ADD
        </a>
        <a href="userlist_edit.php" class="adminbutton">
            EDIT
        </a><br><br>
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
        <a href="reviewlist_edit.php" class="adminbutton">
            EDIT
        </a>
    </div>
</div>
</body>
</htmL>
