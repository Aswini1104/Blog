<!doctype html>
<html lang="en">


<!-- Mirrored from skote-v-light.codeigniter.themesbrand.com/auth-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 04:30:58 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8" />
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="admin/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
<link href="admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Your Network.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="admin/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="admin/assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="admin/assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" action="login" method = "post">
                                    @csrf
                                    <div class="form-group">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                            @enderror
                        </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">email</label>
                                        <input type="email" name = "email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                   

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
<script src="admin/assets/libs/jquery/jquery.min.js"></script>
<script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="admin/assets/libs/simplebar/simplebar.min.js"></script>
<script src="admin/assets/libs/node-waves/waves.min.js"></script>
    <!-- App js -->
    <script src="admin/assets/js/app.js"></script>
</body>


<!-- Mirrored from skote-v-light.codeigniter.themesbrand.com/auth-login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 04:30:58 GMT -->
</html>