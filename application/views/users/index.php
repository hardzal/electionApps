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
							</div>
							<div class="tombol">
								<a href='<?= base_url(); ?>/user/create' class="btn btn-primary">Tambah User</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="table-1">
										<thead>
											<tr>
												<th class="text-center">
													#
												</th>
												<th>Nama</th>
												<th>NIM</th>
												<th>Email</th>
												<th>Role</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($users as $user) : ?>
												<tr class="user-row">
													<td><?= $no++; ?></td>
													<td><?= $user->name; ?></td>
													<td><?= $user->nim; ?></td>
													<td><?= $user->email; ?></td>
													<td><?= getUserRole($user->role_id); ?></td>
													<td><?= isUserActive($user->id, $user->is_active); ?></td>
													<td>
														<a href="<?= base_url('user/') . $user->id . "/details"; ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
														<a href="<?= base_url('user/') . $user->id . "/edit"; ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
														<a class="hapus btn btn-danger" data-id="<?= $user->id; ?>"><i class="far fa-trash-alt"></i></button>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>


	
