<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href={{URL::asset("css/bootstrap-slate.min.css")}}>
    <link rel="stylesheet" href={{URL::asset("css/charisma-app.css")}}>

    <script src={{URL::asset("js/jquery.min.js")}}></script>
</head>

<body>
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="Charisma Logo" src="images/logo.png" class="hidden-xs" />
                <span>Charisma</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                   ]
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="/"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>

            </ul>

        </div>
    </div>
    <div class="ch-container">
        <div class="row">
            <div class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">

                        </div>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <li class="nav-header">Main</li>
                            <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                            </li>
                            <li><a class="ajax-link" href="customer.php"><i class="glyphicon glyphicon-home"></i><span> Customer</span></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>

            <div id="content" class="col-lg-10 col-sm-10">
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="#">Dashboard</a>
                        </li>

                    </ul>
                </div>
                <div class=" row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
                            <i class="glyphicon glyphicon-user blue"></i>

                            <div>Total Members</div>
                            <div>507</div>
                            <span class="notification">6</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
                            <i class="glyphicon glyphicon-star green"></i>

                            <div>Pro Members</div>
                            <div>228</div>
                            <span class="notification green">4</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
                            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

                            <div>Sales</div>
                            <div>$13320</div>
                            <span class="notification yellow">$34</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
                            <i class="glyphicon glyphicon-envelope red"></i>

                            <div>Messages</div>
                            <div>25</div>
                            <span class="notification red">12</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row">
            <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="#" target="_blank">Muhammad
                    Usman</a> 2012 - 2020</p>

            <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a href="#">Charisma</a></p>
        </footer>
    </div>
    <script src="js/bootstrap.min.js"></script> 

    <script src={{URL::asset("js/bootstrap.min.js")}}></script> 

</body>

</html>