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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><i class="fa fa-database"></i> &nbsp; Agro Data Agility</a>
        </div>


    </div>
</nav>
<?php
if(isset($_GET["msgType"]) && !empty(trim($_GET["msgType"])) && isset($_GET["msg"]) && !empty(trim($_GET["msgType"])))
{
    $msg = $_GET["msg"];
    echo '
    <div class="alert alert-dismissible alert-' . $_GET["msgType"] . '">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <p>' . $msg . '</p>
</div>
    ';
}
?>
<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="$('.modal').hide('normal');">&times;</button>
                <h4 class="modal-title">How to access this site?</h4>
            </div>
            <div class="modal-body">
                <p>
                    Well, As this is <code>Beta</code> version this is only access-able to those who have the invitation. If you have the invitation then you must have an invitation <code>UUID</code>, Use that to enter this site!<br /><br />
                    Usually the <code>UUID</code> is of 16 digits!
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" onclick="$('.modal').hide('normal');">Close &nbsp; &times;</button>
            </div>
        </div>
    </div>
</div>
<form class="container col-lg-12 pan"  method="post" action="login.php">
    <h3>For Existing Users</h3>
    <div class="form-group" id="login">
        <input type="text" class="form-control" placeholder="Username" name="username" required="">
        <br />
        <input type="password" class="form-control" placeholder="Password" name="password" required="">
        <br />
        <input type="submit" class="btn btn-primary" value="Login &rightarrow;">
    </div>
</form>
<form class="container col-lg-12 pan2" action="signup.php" method="post">
    <h3>For New Users</h3><span class="glyphicon glyphicon-info-sign" style="margin-left: 98%; cursor: pointer;" onclick="$('.modal').show('normal');"></span>
    <div class="form-group" id="signup">
        <input type="text" class="form-control" placeholder="Invitation UUID, (If you have an Invitation)" name="inviUUID">
        <br />
        <input type="text" class="form-control" placeholder="Username" name="username" required="" disabled>
        <br />
        <input type="email" class="form-control" placeholder="Email" name="email" required="" disabled>
        <br />
        <input type="password" class="form-control" placeholder="Password" name="password" required="" disabled>
        <br />
        <input type="submit" class="btn btn-primary" value="Sign Up! &rightarrow;" disabled>
    </div>
</form>
<script>
    first = true;
    $("input[name='inviUUID']").change(function() {
        var uuid = $("input[name='inviUUID']").val();
        if(uuid.length == 9)
        {
            $("input[disabled]").removeAttr('disabled');
            if(first)
            {
                first = false;
                $("input[name='username']").focus();
            }
        }
    });
    setInterval(function(){$("input[name='inviUUID']").change();}, 1000);
</script>
</body>
</html>