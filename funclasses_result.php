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
<title> Results Page </title>
<header>
    <link rel="stylesheet" href="./css/style.css">
</header>
<body id="body2">

<div id="container">
    <img src="./css/Of-Course-Logo.png" id="logo">

    <h1 id="resultheader">Congrats!</h1><br>
    <h2 id="resultheader"> We Found You Fun Classes!</h2> <br>
    <div id="transparentbox">
    <h2 style="color: black;">SEARCH RESULTS: <hr></h2>
       <div id="resultbox">

    <?php

    $sql = "SELECT * FROM generalView WHERE 1=1";

    if ($_REQUEST['school'] != "ALL") {
        $sql .= " AND school_id ='" . $_REQUEST["school"] . "'";
    }
    if ($_REQUEST['interest'] != "ALL") {
        $sql .= " AND interest_id ='" . $_REQUEST["interest"] . "'";
    }
    if ($_REQUEST['unit_num'] != "ALL") {
        $sql .= " AND unit_id ='" . $_REQUEST["unit_num"] . "'";
    }

    $x = 0;

    //Check if checkbox is checked
    if(!empty($_REQUEST['monday'])){
        #Checkbox selected code
        $x = 1;
    }
    if(!empty($_REQUEST['tuesday'])){
        $x = 2;
    }
    if(!empty($_REQUEST['wednesday'])){
        $x = 3;
    }
    if(!empty($_REQUEST['thursday'])){
        $x = 4;
    }
    if(!empty($_REQUEST['friday'])){
        $x = 5;
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['wednesday']))){
        $x = 6;
    }
    if(!empty(($_REQUEST['tuesday']) AND ($_REQUEST['thursday']))){
        $x = 10;
    }
    if(!empty(($_REQUEST['thursday']) AND ($_REQUEST['friday']))){
        $x = 12;
    }
    if(!empty(($_REQUEST['wednesday']) AND ($_REQUEST['friday']))){
        $x = 13;
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']))){
        $x = 11;
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']) AND ($_REQUEST['friday']))){
        $x = 8;
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']) AND ($_REQUEST['thursday']))){
        $x = 7;
    }
    if(!empty(($_REQUEST['monday']) AND ($_REQUEST['tuesday']) AND ($_REQUEST['wednesday']) AND ($_REQUEST['thursday']) AND ($_REQUEST['friday']))){
        $x = 9;
    }


    if  ($x == 0) {
        $sql .= "";
    } else {
        $sql .= " AND weekday_id = $x";
    }

    $results = $mysql->query($sql);
//         echo "<hr>Your SQL:<br> " . $sql . "<br><br>";

    if(!$results) {
        echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
        echo "SQL Error: " . $mysql->error . "<hr>";
        exit();
    }

    echo "<em>Your search returned <strong>" .
        $results->num_rows .
        "</strong> results. </em>";
    echo "<br><br>";


    //start of counter
    if(empty($_REQUEST["start"])) {
        $start=1;
    }
    else {
        $start = $_REQUEST["start"];
    }

    $end = $start + 5;

    if ($results->num_rows < $end) {
        $end = $results->num_rows;
    }

    $counter = $start;

    $results->data_seek($start-1);

    if($start != 1) {
        ?>
        <form action="" method="get">
            <input type="hidden" name="start"
                   value="<?= ($start - 6) ?>">
            <input type="hidden" name="interest"
                   value="<?= $_REQUEST["interest"] ?>">
            <input type="hidden" name="school"
                   value="<?= $_REQUEST["school"] ?>">
            <input type="hidden" name="unit_num"
                   value="<?= $_REQUEST["unit_num"] ?>">
            <input type="hidden" name="monday"
                   value="<?= $_REQUEST["monday"] ?>">
            <input type="hidden" name="tuesday"
                   value="<?= $_REQUEST["tuesday"] ?>">
            <input type="hidden" name="wednesday"
                   value="<?= $_REQUEST["wednesday"] ?>">
            <input type="hidden" name="thursday"
                   value="<?= $_REQUEST["thursday"] ?>">
            <input type="hidden" name="friday"
                   value="<?= $_REQUEST["friday"] ?>">

            <input type="submit" value="Previous">
        </form>
        <?php
    }
    if($end < $results->num_rows) {
        ?>
        <form action="" method="get">
            <input type="hidden" name="start"
                   value="<?= ($start + 6) ?>">
            <input type="hidden" name="interest"
                   value="<?= $_REQUEST["interest"] ?>">
            <input type="hidden" name="school"
                   value="<?= $_REQUEST["school"] ?>">
            <input type="hidden" name="unit_num"
                   value="<?= $_REQUEST["unit_num"] ?>">
            <input type="hidden" name="monday"
                   value="<?= $_REQUEST["monday"] ?>">
            <input type="hidden" name="tuesday"
                   value="<?= $_REQUEST["tuesday"] ?>">
            <input type="hidden" name="wednesday"
                   value="<?= $_REQUEST["wednesday"] ?>">
            <input type="hidden" name="thursday"
                   value="<?= $_REQUEST["thursday"] ?>">
            <input type="hidden" name="friday"
                   value="<?= $_REQUEST["friday"] ?>">

            <input type="submit" value="Next">
        </form>
        <?php
    }
    echo "<br><br>";

    // end of counter

    while($currentrow = $results->fetch_assoc()) {
        echo "<div class='classname'><strong>" .
            $counter . ") " .
            $currentrow['className'] . "</strong>" .
            " (<em>" . $currentrow['courseID'] . "</em>)" . "<br>".
            $currentrow["classBio"]. "<br>".
            "<a href='funclasses_detail.php?recordid=" . $currentrow["fun_classes_id"]. "' class='detaillink'>".
            " [View Class Details]". "</a>"."</div>"."<br>".
        "<br style='clear:both;'>";
         if($counter==$end){
            break;
        }

        $counter++;

    }
    ?>

                 </div>
            </div>
        </div>
    </body>
</html>
