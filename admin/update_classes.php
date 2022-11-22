<?php

session_start();

include '../nwloginvariables.php';

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
<title>Add Page</title>
<header>
    <link rel="stylesheet" href="../css/style.css">
</header>
<body id="body2">
<div>
<?php
include 'adminnavbar.php';
?>
</div>

<?php
$sql= "UPDATE fun_classes
    SET
    courseID = '". $_REQUEST["courseid"] ."',
    className = '". $_REQUEST["className"] ."',
    classBio = '". $_REQUEST["classBio"] ."',
    classDepartment = '". $_REQUEST["classDepartment"] ."',
    instructorName = '". $_REQUEST["instructorName"] ."',
    instructorRating = '" .$_REQUEST["instructorRating"]."',
    school_id = '" .$_REQUEST["school"]."',
    interest_id = '" .$_REQUEST["interest"]."',
    weekday_id = '" .$_REQUEST["weekday"]."',
    unit_id = '" .$_REQUEST["unit_num"]."'
    WHERE
        fun_classes_id = " . $_REQUEST["recordid"] ;

echo $sql;

$results = $mysql -> query($sql);

if($results){
    echo "<br><br> Class Updated!";
} else{
    echo "Error: " . $mysql->error;
}

?>

</body>
</htmL>
