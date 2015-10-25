<?php
$username = "gourab";
$password = "acdh3546";
$host = "mysql:host=gourab.c0exnouewd5v.us-west-2.rds.amazonaws.com;dbname=USDA_Members;";
try {
    $pdo = new PDO($host, $username, $password);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mysql_password = $password;
    $password = hash("sha256", $password);
    $q = "SELECT password FROM users WHERE username = '" . $username . "'";
    $q_ret = $pdo->query($q);
    if($q_ret->rowCount() == 0)
    {
        header("Location: msg=Username+does+not+exist.&msgType=warning");
    }
    if($q_ret->fetchColumn() == $password)
    {
        unset($_COOKIE["username"]);
        setcookie("username", null, time()-3600);
        setcookie("username", $username);
        unset($_COOKIE["password"]);
        setcookie("password", null, time()-3600);
        setcookie("password", $mysql_password);
        header("Location: index.php");
    }
    else
    {
        header("Location: LogSign.php?msg=Username+and+password+do+not+match&msgType=warning");
    }
}
catch (Exception $ex)
{
    echo $ex->getMessage();
}
