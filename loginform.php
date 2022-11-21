<html>
<head>
    <title> Login Page </title>
    <style>

    </style>
</head>

<body>
<br>
Session Variables: <em><?= print_r($_SESSION) ?></em>
<hr>

<h1>LOGIN</h1>
<form action="" method="post">

    <table width="200" border="0">
        <tr>
            <td> UserName</td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td> PassWord</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td><input type="submit" name="login" value="LOGIN"></td>
            <td></td>
        </tr>
    </table>
</form>
<hr>
Need an account? <a href="signupform.php"> Sign Up </a>

</body>
</html>