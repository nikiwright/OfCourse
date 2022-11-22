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

if(empty($_REQUEST["recordid"])){
    echo "ERROR. Please go through class delete list page.";
    exit();
}

$sql = "SELECT * from fun_classes WHERE fun_classes_id = " . $_REQUEST["recordid"];

$results = $mysql -> query($sql);

if(!$results){
    echo "ERROR: " . $mysql -> error;
}

while($currentrow = $results -> fetch_assoc()){
    echo"<h1>Delete " . $currentrow["className"] . "</h1>";

}
?>