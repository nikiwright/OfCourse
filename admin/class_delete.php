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
if(empty($_REQUEST["confirm"])) {
    //ask to confirm
    echo "Do you really want to delete this movie?";

?>

<form action="class_delete.php">
    <input type="hidden" name="confirm" value="1">
    <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"];?>">
    <input type="submit" value="YES">
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
</body>
</htmL>
