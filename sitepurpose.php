
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

<html>
<head>
    <title>Site Purpose</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }
    </style>
</head>
<body>
<?php
include 'sitenav.php';
?>

<div id="detailbox" style="width: 60%; margin:auto;">
    <div id="box1" style="background-color: white">
        <h1 id="resultheader" style="color: black; margin-top: 10px">
            WHAT IS OF COURSE?
        </h1>
    </div>
    <div id="details"><br>
        OfCourse is a tool made by students for students to help you find courses that boost your physical and mental wellbeing. <br><br>

        OfCourse believes in the importance of taking advantage of the wide range of classes that USC has to offer.
        Taking classes outside your major/minor requirements can be a great opportunity for growth and relaxation.
        But we know that a hindrance for many students is not knowing which classes to take.
    </div>
</div>



</body>
</html>

