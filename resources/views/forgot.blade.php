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
                    <h3>Forgot Password</h3>
                    <form class="form-horizontal" action="/forgot" method="post">
                        @csrf
                        <fieldset>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="username" value={{old("username")}}>
                            </div>
                            <span class="text-danger">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </span>
                            <div class="clearfix"></div><br>

                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                <input type="password" class="form-control" placeholder="New Password" name="password">
                            </div>
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                            <div class="clearfix"></div><br>
                            
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
                            </div>
                            <span class="text-danger">
                                @error('cpassword')
                                {{ $message }}
                                @enderror
                            </span>
                            <div class="clearfix"></div>

                            <p class="center col-md-5">
                                <button type="submit" class="btn btn-primary">Change Password</button>
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