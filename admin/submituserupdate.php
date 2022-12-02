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
<title>Administrative User Edit Page</title>
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
