<?php
include_once "config.php";
if(isset($_POST) && isset($_POST["query"]) && !empty(trim($_POST["query"])) && isset($_COOKIE["username"]) && !empty(trim($_COOKIE["username"])) && isset($_POST["view_name"]) && !empty(trim($_POST["view_name"]))) {
    $host = $constring;
    $username = $uname;
    $password = $pword;
    try {
        $pdo = new PDO($host, $username, $password);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $query = $_POST["query"];
        //echo $query;
        $ret = $pdo->query($query);
        $field = new stdClass();
        $field->username = $_COOKIE["username"];
        $field->viewname = $_POST["view_name"];
        $grant = $pdo->prepare("GRANT SELECT ON USDA.{$field->viewname} TO '{$field->username}'");
        $grant->execute();
        echo "success";
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo $msg;
    }
}
else
{
    echo "Bad Authentication";
}