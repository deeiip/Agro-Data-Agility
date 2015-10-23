<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login Or SignUp :: Online Database management for Agricultural Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://bootswatch.com/paper/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .pan
        {
            width: 40%;
            margin-left: 5%;
            padding: 5%;
            margin-top: 5%;
            border-radius: 10px;
            box-shadow: #ddd 0 0 10px;
        }
        .pan2
        {
            width: 40%;
            margin-left: 55%;
            padding: 5%;
            margin-top: -32%;
            border-radius: 10px;
            box-shadow: #ddd 0 0 10px;
        }
    </style>
</head>

<body>
<?php
if(isset($_COOKIE["username"]))
{
    unset($_COOKIE["username"]);
    setcookie("username", null, time()-3600);
    header("Location: LogSign.php");
}
else
{
    header("Location: LogSign.php");
}
?>
</body>
</html>