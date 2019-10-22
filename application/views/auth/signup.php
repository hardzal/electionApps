
    <div id="app">
        <section class="section">
        <div class="container mt-5">
            <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                <img src="<?= base_url('assets/img/header.jpg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-info">
                <div class="card-header"><h4 class="text-info">Register</h4></div>

                <div class="card-body">
                    <form method="POST" action="<?= base_url('auth/registration'); ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Fill your name">
                        <div class="invalid-feedback">
                        <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input id="nim" type="text" class="form-control" name="nim" placeholder="Fill your nim">
                        <div class="invalid-feedback">
                        <?= form_error('nim','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Fill your email">
                        <div class="invalid-feedback">
                        <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Hp</label>
                        <input id="no_telp" type="text" class="form-control" name="no_telp" placeholder="Fill your no hp">
                        <div class="invalid-feedback">
                        <?= form_error('no_telp','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" type="text" name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                        <div class="invalid-feedback">
                        <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="angkatan" >Angkatan</label>
                    <select class="form-control" name="angkatan" id="angkatan">
                        <?php foreach($user as $data) : ?>
                        <option value="<?= $data['id']; ?>"><?= $data['generation'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('angkatan','<small class="text-danger pl-3">','</small>'); ?>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                        <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        </div>
                        <div class="form-group col-6">
                        <label for="password2" class="d-block">Password Confirmation</label>
                        <input id="password2" type="password" class="form-control" name="password-confirm">
                        <?= form_error('password-confirm','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-lg btn-block">
                        Register
                        </button>
                    </div>
                    <div class="form-group text-center">
                        have an account? <a class="text-info" href="<?= base_url('auth'); ?>">Login</a>
                    </div>
                    </form>
                </div>
                </div>
                <div class="simple-footer">
                Copyright &copy;Himatif <?= date('Y'); ?>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>