<?php
$userA = "root";
$userB = "admin";
$userC = "dipanjan";
$passA = "0yit$32p";
$passB = "awI==r$53";
$passC = "acdh3546";
$usr = $_POST["username"];
$pass = $_POST["password"];
if($usr == $userA)
{
    if($pass != $passA)
    {
        header("Location: LogSign.php?msgType=danger&msg=Username+or+password+incorrect");
    }
    else
    {
        unset($_COOKIE["username"]);
        setcookie("username", null, time()-3600);
        setcookie("username", $userA);
        unset($_COOKIE["password"]);
        setcookie("passowrd", null, time()-3600);
        setcookie("password", $passA);
        header("Location: index.php");
    }
}
elseif($usr == $userB)
{
    if($pass != $passB)
    {
        header("Location: LogSign.php?msgType=danger&msg=Username+or+password+incorrect");
    }
    else
    {
        unset($_COOKIE["username"]);
        setcookie("username", null, time()-3600);
        setcookie("username", $userB);
        unset($_COOKIE["password"]);
        setcookie("passowrd", null, time()-3600);
        setcookie("password", $passB);
        header("Location: index.php");
    }
}
elseif($usr == $userC)
{
    if($pass != $passC)
    {
        header("Location: LogSign.php?msgType=danger&msg=Username+or+password+incorrect");
    }
    else
    {
        unset($_COOKIE["username"]);
        setcookie("username", null, time()-3600);
        setcookie("username", $userC);
        unset($_COOKIE["password"]);
        setcookie("passowrd", null, time()-3600);
        setcookie("password", $passC);
        header("Location: index.php");
    }
}
else
{
    header("Location: LogSign.php?msgType=warning&msg=Username+does+not+exist.");
}