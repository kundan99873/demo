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
                            <a href="/customer">Customer</a>
                        </li>
                        <li>
                            <a>Edit</a>
                        </li>
                    </ul>
                </div>
                @if ($message = Session::get("success"))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                <div class="row">
                    <div class="box col-md-10">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">
                                <h2 class="center"><i class="glyphicon glyphicon-user"></i> &nbsp; &nbsp; Customer Management System</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form id="myForm" method="post" action="/customer/edit/{{md5($customer->id)}}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Customer First Name</label>
                                        <input type="text" class="form-control" id="name" name="first_name" placeholder="Enter Customer's Name" value={{$customer->first_name}}>
                                        <span class="text-danger">
                                            @error('first_name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Customer Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Customer's Name" value={{$customer->last_name}}>
                                        <span class="text-danger">
                                            @error('last_name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Customer UserName</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Customer's User Name" value={{$customer->username}}>
                                        <span class="text-danger">
                                            @error('username')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Customer Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Customer Email Address" value={{$customer->email}} readonly>
                                        <span class="text-danger">
                                            @error('email')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Customer Profile Image</label>
                                
                                        <input type="file" class="form-control images" id="image" name="image" placeholder="Enter Customer's Image" accept="image/png, image/gif, image/jpeg, image/jpg, image/webp">
                                        <div class="container">
                                            <img id="preview" class="previewing" src="#" alt="your image" height="100" width="100" style="display:none; margin: 10px;"/>
                                            <img id="preimage" class="preimage" src="{{url('customerImage/'.$customer->profile_image)}}" height="100" width="100">
                                        </div>
                                        <span class="text-danger">
                                            @error('image')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <a class="btn btn-default" href="/customer"><i
                                class="glyphicon glyphicon-chevron-left glyphicon-white"></i> Back</a>
                                    <button type="submit" class="btn btn-default">Update</button>
                                </form>
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