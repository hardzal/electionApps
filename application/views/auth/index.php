
    <body>
    <div id="app">
        <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
            <div class="p-4 m-3">
                <img src="<?= base_url(); ?>/assets/img/header.jpg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
                <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Himatif Election</span></h4>
                <p class="text-grey">Before you vote, you must login or register if you don't already have an account.</p>
                <form method="POST" action="" class="needs-validation" novalidate="">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input id="nim" type="text" class="form-control" name="nim" tabindex="1" autofocus placeholder="Please fill in your nim">
                </div>

                <div class="form-group">
                    <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="please fill in your password">
                </div>

                <div class="form-group text-right">
                    <a href="" class="float-left mt-3 text-info">
                    Forgot Password?
                    </a>
                    <button type="submit" class="btn btn-info btn-lg btn-icon icon-right" tabindex="4">
                    Login
                    </button>
                </div>

                <div class="mt-5 text-center">
                    Don't have an account? <a class="text-info" href="<?= base_url('auth/registration') ?>">Create new account</a>
                </div>
                </form>

                <div class="text-center mt-5 text-small">
                Copyright &copy;Himatif <?= date('Y'); ?>.
                <div class="mt-2">
                    <a class="text-info" href="#">Privacy Policy</a>
                    <div class="bullet"></div>
                    <a class="text-info" href="#">Terms of Service</a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url(); ?>/assets/img/landing.jpeg">
            <div class="absolute-bottom-left index-2">
                <div class="text-light p-5 pb-2">
                <div class="mb-5 pb-3">
                    <h1 class="mb-2 display-4 font-weight-bold">Wellcome</h1>
                    <h5 class="font-weight-normal text-muted-transparent">Himatif UPN"V" YK</h5>
                </div>
                <p>Alqory Aji Alamsyah as head of HIMATIF</p>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>