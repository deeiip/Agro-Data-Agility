<?php
class col{
    public $name;
    public $type;
    public $description;
}
class dataItem{
    public $name;
    public $cols;
}
if(true)
{
    $host = "mysql:host=gourab.c0exnouewd5v.us-west-2.rds.amazonaws.com;dbname=USDA;";
    $username = "gourab";
    $password = "acdh3546";
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
        $present = array(
            "reports",
            "series_elements",
            "series",
            "series_xtab",
            "state",
            "subjects",
            "surveys",
            "topics",
            "topic_groups",
            "units",
            "footnotes"
        );

        for($i = 0; $i <= count($result) - 1; $i++)
        {
            if(in_array($result[$i], $present))
            {
                $temp = new dataItem();
                $temp->name = $result[$i];
                $temp->cols = array();

                $query = "EXPLAIN " . $result[$i];
                $explanation = $pdo->query($query);
                //echo $result[$i];
                foreach($explanation->fetchAll() as $item)
                {
                    $tempCol = new col();
                    $tempCol->name = $item["Field"];
                    $tempCol->type = $item["Type"];
                    $tempCol->description = "Sample desc";
                    array_push($temp->cols, $tempCol);
                }

                array_push($ret, $temp);
            }

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