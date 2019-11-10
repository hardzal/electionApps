	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Users Management</h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="#">Management</a></div>
					<div class="breadcrumb-item"><a href="#">Users</a></div>
					<div class="breadcrumb-item">List</div>
				</div>
			</div>

			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4><?= $title; ?></h4>
								<?= $this->session->flashdata('message'); ?>
							</div>
							<div class="card-body">
								<form method="POST" action="">
									<div class="form-group">
										<label for="nim">NIM</label>
										<input class="form-control" name="nim" type="text" maxlength="10" value="<?= $user->nim; ?>" />
									</div>
									<div class="form-group">
										<label for="nama">Nama</label>
										<input class="form-control" name="nama" type="text" value="<?= $user->detail->name; ?>" />
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input class="form-control" name="email" type="email" value="<?= $user->email; ?>" />
									</div>
									<div class="form-group">
										<label for="email">No Hp</label>
										<input class="form-control" name="hp" type="text" maxlength="12" value="<?= $user->detail->hp; ?>" />
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input class="form-control" name="password" type="password" />
										<input type="hidden" name="password_current" value="<?= $user->password; ?>" />
									</div>
									<div class="form-group">
										<label for="role">Role</label>
										<select class="form-control" name="role_id">
											<?php if (isset($roles)) : foreach ($roles as $role) : ?>
													<?php
															if ($role->id == $user->role_id) {
																$selected = "selected";
															} else {
																$selected = "";
															};
															?>
													<option value="<?= $role->id; ?>" style="text-transform: capitalize;" <?= $selected; ?>><?= $role->role; ?></option>
											<?php endforeach;
											endif; ?>
										</select>
									</div>
									<div class="form-group">
										<input type='hidden' name='user_id' value='<?= $user->id; ?>' />
										<input type='submit' name='submit' value='Simpan' class='btn btn-primary' />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
