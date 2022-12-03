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
    echo "ERROR. Please go through class edit list page.";
    exit();
}
?>
<htmL>
<header>
    <title>Administrative Review Add Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
        }

        #edit {
            background-color: #7BC950;
            font-weight: bold;
            border-width: 2px;
            text-align: center;
            padding: 2px;
            color: white;
            width: 120px;
            margin-left: 3%;
        }

        #edit:hover{
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
        $sql = "SELECT distinct className from reviewsView3 WHERE fun_classes_id = " . $_REQUEST["recordid"];

        $results = $mysql -> query($sql);

        if(!$results){
            echo "ERROR: " . $mysql -> error;
        }

        while($currentrow = $results -> fetch_assoc()){
            echo "Edit review for " . $currentrow["className"];

        }
        ?>
    </div>
    <div id="box2">
        <?php

        $sql = "SELECT * from reviewsView3
                WHERE 1=1 
                AND fun_classes_id ="
            . $_REQUEST['recordid'];

        //                  echo "SQL: ". $sql. "<br>"."<br>";

        $results = $mysql->query($sql);
        if (!$results) {
            echo "ERROR: " . $mysql->error;
        }

        ?>
    </div>
    <div id="box2">
        <form action ="update_review.php" method="post">
            <table width="250" border="0">
                <tr>
                    <td> Your Review</td>
                    <td> <textarea maxlength="500" name="reviewtext" required>
                        <?php
                        $results = $mysql->query($sql);
                        while ($currentrow = $results->fetch_assoc()) {
                            echo $currentrow["review"];
                        }

                        ?>
                        </textarea> </td>
                </tr>
                <tr>
                    <td> <br><input type='submit' name='save' value='SAVE CHANGES' id='edit' class='button'></td>
                </tr>
            </table>
            <br style="clear:both;">
        </form>
    </div>
</div>
</body>
</htmL>
