<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Inventory Gudang</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-f8mUMCRNrJxPBDzPJx3n+Y5TC5xp6SmStstEfgsDXZJTcxBakoB5hvPLhAfJKa9rCvH+n3xpJ2vQByxLk4WP2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/stisla/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/stisla/components.css') ?>">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <h4 class="text-dark font-weight-normal">Register to <span class="font-weight-bold">Inventory Gudang</span></h4>
                        <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
                        <form action="register/proses_register" method="post" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your Username
                                </div>
                                <div class="valid-feedback">
                                    Good
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_user">Name</label>
                                <input id="nama_user" type="text" class="form-control" name="nama_user" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your Name
                                </div>
                                <div class="valid-feedback">
                                    Good
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="2" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your Email
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="3" required minlength="8" pattern=".{8,}" title="8 characters minimum">
                                <div class="invalid-feedback">
                                    password minimum 8 character
                                </div>
                                <div class="valid-feedback">
                                    Good
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="cpassword" class="control-label">Confirm Password</label>
                                </div>
                                <input id="cpassword" type="password" class="form-control" name="confirm_password" tabindex="4" required minlength="8" pattern=".{8,}" title="8 characters minimum">
                                <div class="invalid-feedback">
                                    confirm password minimum 8 character
                                </div>
                                <div class="valid-feedback">
                                    Good
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="5" id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="auth-forgot-password.html" class="float-left mt-3" tabindex="6">
                                    Forgot Password?
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="7">
                                    Create Account
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                                Have an account? <a href="<?= base_url('login') ?>">Login</a>
                            </div>
                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; APPLIED IT Made with 💙 by Stisla
                            <div class="mt-2">
                                <a href="#">Privacy Policy</a>
                                <div class="bullet"></div>
                                <a href="#">Terms of Service</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                /* This sets the $time variable to the current hour in the 24 hour clock format */
                $time = date("H");
                /* Set the $timezone variable to become the current timezone */
                $timezone = date("e");
                /* If the time is less than 1200 hours, show good morning */
                if ($time < "12") {
                    $selamat = "Good Morning";
                } else
                    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                    if ($time >= "12" && $time < "17") {
                        $selamat = "Good Afternoon";
                    } else
                        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                        if ($time >= "17" && $time < "19") {
                            $selamat = "Good Evening";
                        } else
                            /* Finally, show good night if the time is greater than or equal to 1900 hours */
                            if ($time >= "19") {
                                $selamat = "Good Night";
                            }
                ?>

                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url('assets/stisla/bg.jpg') ?>">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold"><?= $selamat ?></h1>
                                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
                            </div>
                            Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('/assets/stisla/stisla.js') ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url('/assets/stisla/script.js') ?>"></script>
    <script src="<?= base_url('/assets/stisla/custom.js') ?>"></script>

    <!-- Page Specific JS File -->
</body>

</html>