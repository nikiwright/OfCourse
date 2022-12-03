
<!-- page content -->
<style>
.dot{
    border-radius: 50%;
}
</style>
<div id="myclassname">hey</div>
<span class="dot"></span>

<!-- page record data with static/beginning input -->

<!-- load array data, review js objects inside arrays -->
<!-- <script src="array_data.js"></script>-->

<!-- load array data through php -->
<?php
// write SQL query to pull data
$sql = 		"SELECT * FROM reviewsView3 ORDER BY className";

// load sql_to_json module/code
include "sql_to_json_viz.php";

// echo $json2;
?>

<script>
    var classes = <?= $json2 ?>;
    console.log(classes[0]);
    var i=0;

    var drawcircles = function() {
        document.querySelector("#myclassname").innerHTML = classes[0].className;
        document.querySelector(".dot").style.backgroundColor = red;
    }
</script>
