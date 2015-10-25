<?php
if(isset($_POST))
{
    $username = "gourab";
    $password = "acdh3546";
    $host = "mysql:host=gourab.c0exnouewd5v.us-west-2.rds.amazonaws.com;dbname=USDA_Members;";
    try {
        $pdo = new PDO($host, $username, $password);
        $username = $_POST["username"];
        $password = $_POST["password"];
        $mysql_password =$password;
        $email = $_POST["email"];
        $password = hash("sha256", $password);
        $user_exists = "SELECT * FROM users WHERE username = '" . $username . "'";
        $user_return = $pdo->query($user_exists);
        if($user_return->rowCount() > 0)
        {
            // username already exists
            header("Location: LogSign.php?msgType=warning&msg=Username+already+exists.");
        }
        $insert = "INSERT INTO users (username, email, password) VALUES ('" . $username ."', '" . $email ."', '" . $password . "')";
        $insertion = $pdo->query($insert);
        if($insertion->rowCount() > 0)
        {
            //Fine... User Registered
            unset($_COOKIE["username"]);
            setcookie("username", null, time()-3600);
            setcookie("username", $username);
            unset($_COOKIE["password"]);
            setcookie("password", null, time()-3600);
            setcookie("password", $mysql_password);
            //OH NO! Shit we have to create user, So How we should do that without DigitalOcean, and INTERNET
            $giveaway = "CREATE USER '" . $username ."' IDENTIFIED BY '" . $mysql_password . "'";
            $execute = $pdo->query($giveaway);
            //$grant = "GRANT USER '" .  . "'";
            //All DoNE!
            header("Location: index.php");
        }
    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
}