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
        <title>Administrative User Edit Page</title>
        <link rel="stylesheet" href="../css/style.css">
        <style>
            body {
                background-color:#9BA2FF;
            }

            #box1 {
                background-color:#FFC72C;
                color: black;
            }

            #a {
                color: black;
                font-weight: bold;
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
                echo"Edit " . $currentrow["username"] . "";

            }
            ?>
        </div>
        <div id="box2">
            <form action="" method="post">

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
               <br><br>
                <input type='submit' name='save' value='SAVE CHANGES' id='edit' class='button'>
            </form>
            <?php
            $sql= "UPDATE users
                SET
                user_firstName = '". $_REQUEST["fName"] ."',
                user_lastName = '". $_REQUEST["lName"] ."',
                username = '". $_REQUEST["username"] ."',
                password = '". $_REQUEST["password"] ."'
                WHERE
                user_id = " . $_REQUEST["recordid"] ;
                    $results = $mysql -> query($sql);

                    if($results){
                        echo $sql;
                        echo "<br><br> User Updated!";
                    } else{
                        echo "Error: " . $mysql->error;
                    }
            ?>
        </div>
    </div>
</body>
</htmL>
