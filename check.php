<?php
include_once "config.php";
if(isset($_GET["view_name"]) && !empty(trim($_GET["view_name"])) && isset($_COOKIE["username"]) && !empty(trim($_COOKIE["username"])))
{
    $host = $constring;
    $username = $uname;
    $password = $pword;
    try {
        $pdo = new PDO($host, $username, $password);
        $view = $_GET["view_name"];
        $q = "SELECT * FROM information_schema.views WHERE TABLE_NAME = '" . $view . "'";
        $if = $pdo->query($q);
        if($if->rowCount() == 1)
        {
            echo "success";
        }
        else
        {
            echo "table does not exist";
        }
        $pdo = null;
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}