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

<?php
$sql= "UPDATE users
    SET
    user_firstName = '". $_REQUEST["fName"] ."',
    user_lastName = '". $_REQUEST["lName"] ."',
    username = '". $_REQUEST["username"] ."',
    password = '". $_REQUEST["password"] ."'
    WHERE
        user_id = " . $_REQUEST["recordid"] ;

echo $sql;

$results = $mysql -> query($sql);

if($results){
    echo "<br><br> User Updated!";
} else{
    echo "Error: " . $mysql->error;
}

?>

</body>
</htmL>
