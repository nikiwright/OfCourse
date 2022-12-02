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

?>
<htmL>
<header>
    <title>Delete Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
        }

    </style>
</header>
<body>
<?php
include 'adminnavbar.php';
?>

<div id="mainbox">
<?php
if(empty($_REQUEST["confirm"])) {
    //ask to confirm
    echo "Do you really want to delete this movie?";

?>

<form action="class_delete.php">
    <input type="hidden" name="confirm" value="1">
    <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"];?>">
    <input type='submit' name='save' value='SAVE CHANGES' id='edit' class='button'>
</form>


<?php
} else {
    Echo "Deleting movie . . .";

    $sql = "DELETE FROM fun_classes
    WHERE fun_classes_id= " . $_REQUEST["recordid"];

    $results = $mysql -> query($sql);

    if($results) {
        echo "<br> Class deleted.";
    } else {
        echo "Error: " . $mysql -> error;
    }

}
?>
</div>
</body>
</htmL>
