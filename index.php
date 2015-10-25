<?php
if(!isset($_COOKIE["username"]))
{
    header("Location: LogSign.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://bootswatch.com/paper/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
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

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" onclick="$('#conn-str').show('normal');"><i class="fa fa-database"></i> &nbsp;Use your Datasets</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> &nbsp;Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul id="user-datasets" class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#" id="user-dataset-header">
                    Custom Datasets: &nbsp; &nbsp; <i class="fa fa-paw fa-spin"></i>
                </a>

            </li>


        </ul>
    </div>
    <div id="sidebar-wrapper-right">
        <ul id="data-sets" class="sidebar-nav-right">

        </ul>

    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">

                <div id="ops-panel" class="col-lg-12">

                </div>


                <!-- very fragile code -->
                <div class="well col-lg-12" style="margin: 0 !important; background: #fff;">
                    <h5> <i style="color: #1cbc96;" class="fa fa-table"></i> &nbsp; Preview Window</h5>

                    <div id="data-container" style=" margin-top: 20px; height: 190px; overflow-y: scroll; box-shadow: inset 0 0 5px #dddddd; padding: 10px;">
                        <span style="margin-left: 40%; line-height: 170px;">Select a table to preview!</span>
                    </div>
                    <br />
                    <!--<div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="query" placeholder="Your MySQL Query">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="sendQuery();">Go &rightarrow;</button>
                            </span>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

<div id="conn-str" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button style="outline: none" type="button" onclick="$('#conn-str').hide('normal')" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">You data access credential </h4>
            </div>
            <div  class="modal-body">

                <pre style="text-align: left">
                    Host : <code>gourab.c0exnouewd5v.us-west-2.rds.amazonaws.com</code>
                    Type : <code>MySQL</code>
                    Database : <code>USDA</code>
                    Username : <code><?php echo $_COOKIE["username"]; ?></code>
                    Password : <code><?php echo $_COOKIE["password"] ?></code>
                </pre>
            </div>

        </div>
    </div>
</div>

<!-- /#wrapper -->
<div id="dialog" class="modal">
    <div class="modal-dialog">
        <div id="dialog-content" class="modal-content">
            <div class="modal-header" style="height: 80px;">
                <button id="dialog-close" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <!-- <h4 class="modal-title col-lg-4">Create New Set</h4> -->
                <div style="margin-left: 16%;" id="duplicate-name-err" class="col-lg-8 has-success">
                    <input type="text" class="form-control" id="resultset-name" placeholder="Result Name ">
                </div>
            </div>
            <div id="manip-board" class="modal-body">

                <p><form class="form-horizontal"><div class="form-group"></div><div class="form-group"><label for="check1"></label><div class="checkbox col-lg-3" id="check1"><label>
                                <input type="checkbox"> Checkbox</label></div></div></form></p>
            </div>
            <div class="modal-footer">
                <button id="data-discard" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="save-data" type="button" class="btn btn-primary">Save changes &nbsp; &nbsp;</button>
            </div>
        </div>
    </div>
</div>
<div id="data-dialog" class="modal">
    <div class="modal-dialog">
        <div id="data-dialog-content" class="modal-content">
            <div class="modal-header">
                <button id="data-dialog-close" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Detaset Description</h4>
            </div>
            <div class="modal-body">
                <table id="meta-table" class="table table-striped table-hover ">

                </table>
            </div>
            <div class="modal-footer">
                <button id="data-close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="data-prev" type="button" class="btn btn-default">Preview</button>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    //$('#dialog').show('normal');
</script>
<script src="js/dialog.js"></script>
<script src="js/populator.js"></script>
<script src="js/generator.js"></script>
<script src="js/beautify.js"></script>
<script src="//startyour.club/Twitter/dist/bootstrap-notify.js"></script>
<script src="js/preconf.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</body>

</html>
