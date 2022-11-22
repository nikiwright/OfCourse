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
<div class="adminnav">
    <br>&nbsp
    <img src="../css/Of-Course-Logo.png" id="logo">
    <div class="dropdown">
        <button class="dropbtn">USER PROFILES
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="userprofile_add.php">ADD</a>
            <a href="userprofile_edit.php">EDIT</a>
            <a href="userprofile_delete.php">DELETE</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">WELLNESS BLOG
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="wellnessblog_add.php">ADD</a>
            <a href="wellnessblog_edit.php">EDIT</a>
            <a href="wellnessblog_delete.php">DELETE</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">CLASSES
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="class_add.php">ADD</a>
            <a href="class_edit.php">EDIT</a>
            <a href="class_delete.php">DELETE</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">REVIEWS
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="review_add.php">ADD</a>
            <a href="review_edit.php">EDIT</a>
            <a href="review_delete.php">DELETE</a>
        </div>
    </div>
    <a href="" class="navitem">
        USER PROFILES
    </a><br>
    <a href="" class="navitem">
        WELLNESS BLOG
    </a><br>
    <a href="" class="navitem">
        CLASSES
    </a><br>
    <a href="" class="navitem">
        REVIEWS
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
