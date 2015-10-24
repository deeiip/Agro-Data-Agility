<?php
if(isset($_GET["table_name"]))
{
    $host = "mysql:host=gourab.c0exnouewd5v.us-west-2.rds.amazonaws.com;dbname=USDA;";
    $username = 'gourab';
    $password = 'acdh3546';
    try {
        $pdo = new PDO($host, $username, $password);
        $q = "SELECT * FROM " . $_GET["table_name"] . " limit 10";
        $out = $pdo->query($q);
        if($out === false)
        {
            echo "Unable to execute this - <code>" . $q . "</code> Query";
            return;
        }
       // echo "<pre>";
        $count = true;
        $table = "<table class=\"table table-striped table-hover \"><thead><tr>";
        foreach($out->fetchAll() as $item) {
            if($count)
            {
                foreach(array_keys($item) as $key)
                {
                    if(gettype($key) != "integer")
                    {
                        $table .= "<th>$key</th>";
                    }
                }
                $count = false;
                $table .= "</tr></thead><tbody>";
            }
            $table .= "<tr>";
            foreach ($item as $k => $v) {
                if (gettype($k) != "integer") {

                    $table .= "<td style='width: 10%'>$v</td>";
                    //echo "<br />";
                }
            }
            $table .= "</tr>";
        }
        $table .= "</tbody></table>";
        //echo "</pre>";
        echo $table;
    }
    catch(PDOException $ex)
    {
        echo $ex->getMessage();
    }
}
