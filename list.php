<?php
require_once "config.php";
class col{
    public $name;
    public $type;
}
class dataItem{
    public $name;
    public $columns;
}
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
{
    $host = $constring;
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    try {
        $pdo = new PDO($host, $username, $password);
        $q = "SHOW TABLES";
        $tables = $pdo->query($q);
        $result = array();
        //var_dump($tables->fetchAll());
        if($tables->rowCount() > 0)
        {
            foreach($tables->fetchAll() as $item)
            {
                array_push($result, $item[0]);
            }
            //echo json_encode($result);
        }
        else
        {
            echo json_encode($result);
        }
        $res = array();
        $ret = array();
        for($i = 0; $i <= count($result) - 1; $i++)
        {
            $temp = new dataItem();
            $temp->name = $result[$i];
            $temp->columns = array();
            $query = "EXPLAIN " . $result[$i];
            $explanation = $pdo->query($query);
            //echo $result[$i];
            foreach($explanation->fetchAll() as $item)
            {
                $tempCol = new col();
                $tempCol->name = $item["Field"];
                $tempCol->type = $item["Type"];
                array_push($temp->columns, $tempCol);
            }

            array_push($ret, $temp);
        }
        print_r(json_encode($ret));
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}
else
{
    header("Location: LogSign.php");
}
?>
