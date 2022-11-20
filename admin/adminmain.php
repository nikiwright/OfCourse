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
    <a href="userprofile.php" class="navitem">
        USER PROFILE
    </a><br>
    <a href="wellnessblog.php" class="navitem">
        WELLNESS BLOG
    </a><br>
    <a href="sitepurpose.php" class="navitem">
        SITE PURPOSE
    </a><br>
</div>

<div id="header">
    <h1 style="margin-bottom: -10px;">FUN CLASSES AT USC</h1><br>
    <br>
</div>
<br>


<div id="mainbox">
    <div id="box1">
        <p1>FIND YOUR NEW FAVORITE CLASS TODAY</p1>
    </div>
    <div id="box2">
    <p1><strong>Classes:</strong></p1><br>
        <a href=""
    </div>
</div>
<div id="text1">
    <h2>LOOKING TO SWITCH UP YOUR SCHEDULE?</h2><br>
    <p1>OfCourse believes in the importance of taking advantage of the wide range of classes that USC has to offer. Taking classes outside your major/minor requirements can be a great opportunity for growth and relaxation. But we know that a hindrance for many students is not knowing which classes to take. OfCourse is a tool made by students for students to help you find courses that boost your physical and mental wellbeing.</p1>
    <br><br><br><br>
</div>
</body>
</htmL>
