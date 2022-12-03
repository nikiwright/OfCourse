<?php

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

session_start();   // session starts
?>

<html>
<head>
    <title> Edit Review </title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
        }

        #submit {
            background-color: #FF5E5B;
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
</head>
<body>
<?php
include 'sitenav.php';
?>

<!--Session Variables: <em>--><?//= print_r($_SESSION) ?><!--</em>-->

<h1 id="resultheader">EDIT YOUR REVIEW</h1><br>

<div id="mainbox">
    <div id="box1">
          <?php

          $sql = "SELECT * from reviewsView3
                WHERE 1=1 
                AND review_id ="
              . $_REQUEST['recordid'].
          " AND user_id =" .$_SESSION['id'];
       $_SESSION['reviewID'] = $_REQUEST['recordid'];

//                  echo "SQL: ". $sql. "<br>"."<br>";

          $results = $mysql->query($sql);
          if (!$results) {
              echo "ERROR: " . $mysql->error;
          }

          while ($currentrow = $results->fetch_assoc()) {
              echo "You are currently editing your ". "<strong>".$currentrow["className"]. "</strong> review";

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
        <a href='user_profile.php'> <input type='submit' name='discard' value='DISCARD' id='submit' class='button'> </a>
    </div>



</div>

</body>
</html>
