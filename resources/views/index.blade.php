<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href={{URL::asset("css/bootstrap-slate.min.css")}}>
    <link rel="stylesheet" href={{URL::asset("css/charisma-app.css")}}>
    <link rel="stylesheet" href={{URL::asset("css/responsive-tables.css")}}>

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
            <a class="navbar-brand" href="/"> <img alt="Charisma Logo" src={{URL::asset("images/logo.png")}} class="hidden-xs" />
                <span>Charisma</span></a>

                <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">

                    <li><a href="/change/{{md5($user->email)}}">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout/{{md5($user->email)}}">Logout</a></li>
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
                            <li><a class="ajax-link" href="/"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                            </li>
                        
                            <li class="accordion">
                            <a class="ajax-link" href="/customer"><i class="glyphicon glyphicon-user"></i><span> Customer</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="/customer"><i class="glyphicon glyphicon-user"></i> Customer</a></li>
                                <li><a href="/customer/addnew"><i class="glyphicon glyphicon-plus"></i> Add Customer</a></li>
                                </ul>
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
                            <a>Dashboard</a>
                        </li>
                    </ul>
                </div>
                @if ($message = Session::get("success"))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class=" row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="/">
                            <i class="glyphicon glyphicon-user blue"></i>

                            <div>Total Members</div>
                            <div>507</div>
                            <span class="notification">6</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="/">
                            <i class="glyphicon glyphicon-star green"></i>

                            <div>Pro Members</div>
                            <div>228</div>
                            <span class="notification green">4</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="/">
                            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

                            <div>Sales</div>
                            <div>$13320</div>
                            <span class="notification yellow">$34</span>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="/">
                            <i class="glyphicon glyphicon-envelope red"></i>

                            <div>Messages</div>
                            <div>25</div>
                            <span class="notification red">12</span>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="box col-md-12">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">
                                <h2 class="center"><i class="glyphicon glyphicon-user"></i> &nbsp; &nbsp; Lorem, ipsum dolor.</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                            <h1>Charisma <br>
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, pariatur.</small>
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor facere ratione odio, hic voluptatem assumenda veniam est illo dolorum eos excepturi optio aspernatur quis commodi explicabo quos eius iusto soluta!</p>

                    <p><b>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam omnis dicta nihil animi vitae quaerat!</b></p>

                    <p class="center-block download-buttons">
                        <a href="/" class="btn btn-primary btn-lg"><i
                                class="glyphicon glyphicon-chevron-left glyphicon-white"></i> Back to article</a>
                        <a href="/" class="btn btn-default btn-lg"><i
                                class="glyphicon glyphicon-download-alt"></i> Download Page</a>
                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; the website 2023 - 2024</p>
    </footer>

    </div>
    <script src={{URL::asset("js/bootstrap.min.js")}}></script>
    <script src={{URL::asset("js/jquery.dataTables.min.js")}}></script>
    <script src={{URL::asset("js/responsive-tables.js")}}></script>
    <script src={{URL::asset("js/script.js")}}></script>

</body>

</html>
