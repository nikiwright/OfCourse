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
    <title>Class Review Counts</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .dot{
           border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            //padding: 20px;
        }

        /*.dot:hover{*/
        /*    transform: scale(110%);*/
        /*    transition-timing-function: ease-in-out;*/
        /*    transition-duration: 0.3s;*/
        /*}*/


        .vizreviewnum{
            font-size: 20px;
            text-align: center;
        }


        .vizclassname{
            width: auto;
            //text-align: center;
        }

        .vizclassreviewparent{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            //border: red solid 3px;
            text-align: center;


        }

        .vizclassreviewparent:hover{
            transform: scale(110%);
            transition-timing-function: ease-in-out;
            transition-duration: 0.3s;
        }

        #bigclassreviewparent{
            width: 85%;
            height: 150%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            //border: purple solid 3px;
            margin: auto;
            justify-content: space-around;
        }

    </style>
</head>
<body id="purplebody">
<?php
include 'sitenav.php';
?>
<div id="container">
    <div id="header">
        <h1 style="margin-bottom: -10px;">Class Reviews Visualization</h1><br>
        <br>
    </div>

    <?php

    $sql = "SELECT COUNT(*) AS totalclassreviews FROM reviewsView3";
    $sql2 = "SELECT COUNT(*) AS totalclassreviews, className, fun_classes_id FROM reviewsView3 GROUP BY className";

    $results = $mysql ->query($sql);

    if(!$results){
        echo "ERROR: " . $mysql->error();
        exit();
    }

    $results2 = $mysql->query($sql2);

    $data = $results->fetch_assoc();

    echo "<div id='detailbox' style='padding: 20px; width: 30%; margin: auto;'>
<h2 style=' color: black !important;'>Total number of reviews: " . $data["totalclassreviews"] . "</h2></div><br><br>";


    echo "<div id='bigclassreviewparent'>";
    while($currentrow = $results2 -> fetch_assoc()){
        echo $currentrow['fun_classes_id'];
        echo " <div class='vizclassreviewparent' style='width: " . (floatval($currentrow["totalclassreviews"]*60)) . "
        ; font-size: " . (floatval($currentrow["totalclassreviews"]*10)) . "'><a style='color: black !important;' href='funclasses_detail.php?recordid=". $currentrow['fun_classes_id'] . "'><div class='vizclassname'>" . $currentrow["className"] . ": " .
            "</div><div class='dot' style='width:" . (floatval($currentrow["totalclassreviews"]*50)) . "px; 
            height:" . (floatval($currentrow["totalclassreviews"]*50)) . "px;
            background-color: rgba(212, 3, 217, calc(1/". $currentrow["totalclassreviews"]."))
            '><div class='vizreviewnum'>".$currentrow["totalclassreviews"] ." </div></div></a></div>&nbsp;" .
            "<br style='clear:both'>";

    }

    //    echo "<br><br>Totals visualized...<br><br>";
    //
    //    $results2 -> data_seek(0);
    //
    //    while($currentrow = $results2 -> fetch_assoc()){
    //        echo "<span style ='font-size:" . $currentrow["totalreviews"]. "px'>" . $currentrow["user_id"] . "</span>";
    //    }
    //
    echo "</div>";
    ?>

</div>
</body></html>