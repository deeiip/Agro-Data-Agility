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
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <a class="navbar-brand" href="index.html">USDA</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">

            </ul>
        </div>
    </div>
</nav>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul id="user-datasets" class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Custom Datasets: &nbsp; &nbsp; &nbsp; <span class="caret"></span>
                </a>
            </li>
            <li>
                <a href="#">Subs</a>
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
            <div  class="row">
                <div id="ops-panel" class="col-lg-12">

                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

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
                <!-- <p>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">First Dataset</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="select3">
                                <option>Option 1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>
                        <label for="select" class="col-lg-2 control-label">Second Dataset</label>
                        <div class="col-lg-4">
                            <select class="form-control" id="select4">
                                <option>Option 1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>

                        </div>

                        <br>

                    </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">First Dataset</label>
                    <div class="col-lg-4">
                        <select class="form-control" id="select">
                            <option>Option 1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                    </div>
                    <label for="select" class="col-lg-2 control-label">Second Dataset</label>
                    <div class="col-lg-4">
                        <select class="form-control" id="select2">
                            <option>Option 1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>

                    </div>

                    <br>

                </div>
                </div>
                </p>
            </div> -->
                <p><form class="form-horizontal"><div class="form-group"></div><div class="form-group"><label for="check1"></label><div class="checkbox col-lg-3" id="check1"><label>
                                <input type="checkbox"> Checkbox</label></div></div></form></p>
            </div>
            <div class="modal-footer">
                <button id="data-discard" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="save-data" type="button" class="btn btn-primary">Save changes</button>
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
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</body>

</html>
