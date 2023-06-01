<!DOCTYPE html>
<!--
* Backstrap - Free Bootstrap Admin Template
* @version v0.2.0
* @link https://backstrap.net
* Copyright (c) 2018 Cristian Tabacitu
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description"☻ content="Backstrap - Open Source Bootstrap 4 Admin Template on top of CoreUI">
    <meta name="author" content="Cristian Tabacitu">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard,CoreUI">
    <title>BackStrap - Free Bootstrap 4 Admin Template</title>
    <!-- Icons-->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/pace.min.css') }}" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>

                        @include('_includes.admin._modules.errores')

                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\AdminController::class, 'loguear']) }}" autocomplete="off">

                            @csrf

                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="icon-user"></i></span></div>
                                <input class="form-control" name="email" type="text" placeholder="Email" autocomplete="off">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="icon-lock"></i></span></div>
                                <input class="form-control" name="password" type="password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4" type="submit">Login</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <button class="btn btn-primary active mt-3" type="button">Register Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/pace.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/coreui.min.js') }}"></script>
<script src="node_modules/pnotify/dist/iife/Pnotify.js"></script>
<script src="node_modules/pnotify/dist/iife/PnotifyButtons.js"></script>
<script src="node_modules/pnotify/dist/iife/PnotifyConfirm.js"></script>
<script src="node_modules/pnotify/dist/iife/PnotifyMobile.js"></script>
<script src="node_modules/pnotify/dist/iife/PnotifyNonBlock.js"></script>
<script>
    PNotify.defaults.styling = 'bootstrap4';
</script>
</body>
</html>