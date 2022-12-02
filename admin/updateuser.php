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
<title>Administrative User Edit Page</title>
<header>
    <link rel="stylesheet" href="../css/style.css">
</header>
<body>
    <?php
    include 'adminnavbar.php';
    ?>

    <div id="mainbox">
        <div id="box1">
            <?php
            $sql = "SELECT * from users WHERE user_id = " . $_REQUEST["recordid"];

            $results = $mysql -> query($sql);

            if(!$results){
                echo "ERROR: " . $mysql -> error;
            }

            while($currentrow = $results -> fetch_assoc()){
                echo"<h1>Edit " . $currentrow["username"] . "</h1>";

            }
            ?>
        </div>
        <div id="box2">
            <form action="submituserupdate.php">

                <input type="hidden" name="recordid" value="<?php echo $_REQUEST["recordid"]; ?>">

                <?php

                $recorddata = $results -> fetch_assoc();

                ?>
                First Name: <input type="text" name="fName" value="<?php
                $sql = "SELECT * from users WHERE user_id = " . $_REQUEST["recordid"];
                $results = $mysql -> query($sql);
                while($currentrow = $results -> fetch_assoc()){
                    echo $currentrow["user_firstName"];
                }?>">
                <br>
                Last Name: <input type="text" name="lName" value="<?php
                $sql = "SELECT * from users WHERE user_id = " . $_REQUEST["recordid"];
                $results = $mysql -> query($sql);
                while($currentrow = $results -> fetch_assoc()){
                    echo $currentrow["user_lastName"];
                }?>">
                <br>
                Username: <input type="text" name="username" value="<?php
                $sql = "SELECT * from users WHERE user_id = " . $_REQUEST["recordid"];
                $results = $mysql -> query($sql);
                while($currentrow = $results -> fetch_assoc()){
                    echo $currentrow["username"];
                }?>">
                <br>
                Password: <input type="text" name="password" value="<?php
                $sql = "SELECT * from users WHERE user_id = " . $_REQUEST["recordid"];
                $results = $mysql -> query($sql);
                while($currentrow = $results -> fetch_assoc()){
                    echo $currentrow["password"];
                }?>">
               <br>
                <input type="submit" value="Save Edits">
            </form>
        </div>
    </div>
</body>
</htmL>
