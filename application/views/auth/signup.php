<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
					<div class="login-brand">
						<img src="<?= base_url('assets/img/header.jpg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
					</div>

					<div class="card card-info">
						<div class="card-header">
							<h4 class="text-info">Pendaftaran</h4>
						</div>

						<?= $this->session->flashdata('message'); ?>

						<div class="card-body">
							<form method="POST" action="<?= base_url('auth/signup'); ?>">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input id="nama" type="text" value="<?= set_value('nama'); ?>" class="form-control" name="nama" placeholder="Isikan nama...">
									<!--<div class="invalid-feedback">-->
									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
									<!--</div>-->
								</div>

								<div class="form-group">
									<label for="nim">NIM</label>
									<input id="nim" type="text" value="<?= set_value('nim'); ?>" class="form-control" name="nim" placeholder="Isikan NIM..">
									<!--<div class="invalid-feedback">-->
									<?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
									<!--</div>-->
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="text" value="<?= set_value('email'); ?>" class="form-control" name="email" placeholder="Isikan email..">
									<!--<div class="invalid-feedback">-->
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									<!--</div>-->
								</div>

								<div class="form-group">
									<label for="hp">No HP</label>
									<input id="hp" type="text" value="<?= set_value('hp'); ?>" class="form-control" name="hp" placeholder="Isikan no hp..">
									<!--<div class="invalid-feedback">-->
									<?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
									<!--</div>-->
								</div>

								<div class="row">
									<div class="form-group col-6">
										<label for="password" class="d-block">Password</label>
										<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
										<div id="pwindicator" class="pwindicator">
											<div class="bar"></div>
											<div class="label"></div>
										</div>
									</div>
									<div class="form-group col-6">
										<label for="confirm_password" class="d-block">Konfirmasi Password</label>
										<input id="confirm_password" type="password" class="form-control" name="confirm_password">
										<?= form_error('confirm_password', '<small class="text-danger pl-3">', '</small>'); ?>
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
						Copyright &copy;HIMATIF <?= date('Y'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
