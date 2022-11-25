<?php //var_dump($_REQUEST);?>

    <div id="floatingbox">
        <form action=""  method="post">
            <table width="250" border="0">
                <div class="pi">Fun classes are more fun together! <br> Send this class to a friend: </div>
                <br>
                <tr>
                    <td> Friend's Email</td>
                    <td><input type="text" placeholder="tommytrojan@usc.edu" name="friend_email" required></td>
                </tr>
                <tr>
                    <td> Your Email</td>
                    <td><input type="text" placeholder="traveller@usc.edu" name="user_email" required></td>
                </tr>
                <tr>
                    <td> <br> <input type="submit" id="submit" class="button" name="send" value="SEND"></td>
                    <td></td>
                </tr>
            </table>
            <br style="clear:both;">
        </form>

        <?php
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.
        $url.= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL
        $url.= $_SERVER['REQUEST_URI'];

        //    echo $url;
        ?>

        <?php if(!empty($_REQUEST["friend_email"])) {

            $to = $_REQUEST["friend_email"]; // from the form
            $subject = "You might like this fun class @ USC...";
            $message = "Hello! A friend suggested you might like ". $url. "\r";
            $message .="--------------------------------\r";

            while($currentrow = $results->fetch_assoc()) {
                $message .= "Course Title: ". $currentrow["className"] .  "\r".
                    "CourseID: " ."</strong>". $currentrow["courseID"].  "\r".
                    "About: ". $currentrow["classBio"].
                    "\r"; // \r is a carriage return in plain text
            }

            $from = $_SESSION['first']. $_SESSION['last']; // from the form
            $headers = "From: $from" . $_REQUEST["user_email"]; // create a header entry for "FROM" email field

            $send = mail($to,$subject,$message,$headers);
            if ($send == 1)
            {
                echo "Thank  You. Your email was sent.";
                echo "<br><br><em>(Server mail response was " . $send . "</em>)";
                echo "Mail sent to " . $_REQUEST["friend_email"] . " with the url ". $url;
                exit();
            } else {
                echo 'Unable to send email. Please try again.';
            }

        }
        ?>

    </div>

