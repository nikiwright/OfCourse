<?php
session_start();

include 'nwloginvariables.php';

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

// because there may be special characters in the database data (there are), make sure to set a charset
$mysql->set_charset("utf8");

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

//default sql query with limit of 50 records
if(empty($sql)) {
    $sql = "SELECT * FROM reviewsView WHERE 1=1";
}



$results = $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}

$sql2 = "SELECT COUNT(*) AS totalclassreviews FROM reviewsView3";
$sql3 = "SELECT COUNT(*) AS totalclassreviews, className FROM reviewsView3 GROUP BY className;";

$results2 = $mysql ->query($sql2);

if(!$results2){
    echo "ERROR: " . $mysql->error();
    exit();
}

$results3 = $mysql->query($sql3);

$data = $results2->fetch_assoc();

echo "Total number of reviews: " . $data["totalclassreviews"] . "<br><br>";
while($currentrow = $results3 -> fetch_assoc()){
     echo $currentrow['totalclassreviews'];

}

//  setup -- create $json_array as a variable that will contain array data
$json_array = array();

while($currentrow = $results->fetch_assoc()) {
    //print_r($currentrow);
    // command $json_array[] would add one new row to $json_array
    $json_array[] = $currentrow;
}

//echo "<pre>";
//print_r($json_array);
//echo "</pre>";

/*  Once you have populated $json_array can test it with
    echo "<pre>";
    print_r($json_array);
    echo "</pre>";
*/

//  Step 2 -- we've been calling it json, but it is not actually encoded as such yet

$json2 = json_encode($json_array,  JSON_UNESCAPED_UNICODE);

//if a problem, use code below to debug
// echo "json error: " . json_last_error_msg() . "<hr>";
echo $json2;
