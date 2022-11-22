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
    <link rel="stylesheet" href="./css/style.css">
</header>

<body id="body1">
<div id="nav">
    <br>&nbsp
    <img src="./css/Of-Course-Logo.png" id="logo">
    <a href="userprofile_add.php" class="navitem">
        ADD USER PROFILE
    </a><br>
    <a href="userprofile_edit.php" class="navitem">
        EDIT USER PROFILE
    </a><br>
    <a href="userprofile_delete.php" class="navitem">
        DELETE USER PROFILE
    </a><br>
    <a href="wellnessblog_add.php" class="navitem">
        ADD WELLNESS BLOG
    </a><br>
    <a href="wellnessblog_edit.php" class="navitem">
        EDIT WELLNESS BLOG
    </a><br>
    <a href="wellnessblog_delete.php" class="navitem">
        DELETE WELLNESS BLOG
    </a><br>
    <a href="class_add.php" class="navitem">
        ADD CLASS
    </a><br>
    <a href="class_edit.php" class="navitem">
        EDIT CLASS
    </a><br>
    <a href="class_delete.php" class="navitem">
        DELETE CLASS
    </a><br>
    <a href="review_add.php" class="navitem">
        ADD REVIEW
    </a><br>
    <a href="review_edit.php" class="navitem">
        EDIT REVIEW
    </a><br>
    <a href="review_delete.php" class="navitem">
        DELETE REVIEW
    </a><br>
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
        <a href="userprofile_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>WELLNESS BLOG:</p1>
        <a href="wellnessblog_add.php" class="adminbutton">
            ADD
        </a>
        <a href="wellnessblog_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="wellnessblog_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>CLASSES:</p1>
        <a href="class_add.php" class="adminbutton">
            ADD
        </a>
        <a href="class_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="class_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>REVIEWS:</p1>
        <a href="review_add.php" class="adminbutton">
            ADD
        </a>
        <a href="review_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="review_delete.php" class="adminbutton">
            DELETE
        </a>
    </div>
</body>
</htmL>
