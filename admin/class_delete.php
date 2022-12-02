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

        #submit {
            background-color: #7BC950;
            font-weight: bold;
            border-width: 2px;
            text-align: center;
            padding: 2px;
            color: white;
            width: 120px;
            margin-left: 3%;
        }

        #submit:hover{
            background-color: white;
            color: black;
        }

    </style>
</header>
<body>
<?php
include 'adminnavbar.php';
?>

<div id="mainbox">
    <div id="box1">
        <?php
        if(!empty($_REQUEST["confirm"])) {
            echo "Deleting movie...";
            }
        if(empty($_REQUEST["confirm"])) {
        //ask to confirm
        echo "Do you really want to delete this movie?";
        ?>

    </div>
    <div id="box2">
        <form action="class_delete.php">
            <input type="hidden" name="confirm" value="1">
            <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"];?>">
            <input type='submit' name='save' value='YES, DELETE' id='submit' class='button'>
        </form>
        <?php
        } else {
            $sql = "DELETE FROM fun_classes
            WHERE fun_classes_id= " . $_REQUEST["recordid"];

            $results = $mysql -> query($sql);

            if($results) {
                echo "Class deleted.";
            } else {
                echo "Error: " . $mysql -> error;
            }
        }
        ?>
    </div>
</div>
</body>
</htmL>
