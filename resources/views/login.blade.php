<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap-slate.min.css">
    <link rel="stylesheet" href="css/charisma-app.css">

    <script src="js/jquery.min.js"></script>
</head>

<body>
    <!-- <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <img alt="Charisma Logo" src={{URL::asset("images/logo.png")}} class="hidden-xs" />
                <span>Charisma</span></a>

            <!-- user dropdown starts --
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>

            </ul>

        </div>
    </div> -->
    <div class="ch-container">
        <div class="row">

            <div class="row">
                <div class="col-md-12 center login-header">
                    <h2>Welcome to Charisma</h2>
                </div>
                <!--/span-->
            </div><!--/row-->

            <div class="row">
                <div class="well col-md-5 center login-box">
                    @if ($message = Session::get("success"))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @error('credentials')
                    <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                    @enderror
                    <form class="form-horizontal" action="/login" method="post">

                        @csrf
                        <fieldset>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="email">
                            </div>
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                            <div class="clearfix"></div><br>

                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                            <div class="clearfix"></div>

                            <div class="input-prepend">
                                <label class="remember" for="remember"><input type="checkbox" id="remember" name="remember"> Remember me</label>
                            </div>

                            <a class="ajax-link text-danger" href="/forgot"><span> Forgot Password</span></a>
                            <div class="clearfix"></div>

                            <p class="center col-md-5">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
                <!--/span-->
            </div><!--/row-->
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src={{URL::asset("js/script.js")}}></script>

</body>

</html>