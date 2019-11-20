	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1><?= $title_header; ?></h1>
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

							<?= $this->session->flashdata('message'); ?>

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
														<a href="<?= base_url('admin/user/') . $user->id . "/details"; ?>" class="detail btn btn-primary" data-toggle="modal" data-target="#detailModal"><i class="fas fa-info-circle"></i></a>
														<a href="<?= base_url('admin/user/') . $user->id . "/edit"; ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
														<a data-link="admin/user/<?= $user->id; ?>/delete" data-id="<?= $user->id; ?>" class="hapus btn btn-danger"><i class="far fa-trash-alt"></i></button>
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

	<div class="modal fade" tabindex="-1" role="dialog" id="detailModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4"><strong>Nama</strong></div>
						<div class="col-md-8"></div>
					</div>
					<div class="row">
						<div class="col-md-4"><strong>NIM</strong></div>
						<div class="col-md-8"></div>
					</div>
					<div class="row">
						<div class="col-md-4"><strong>Email</strong></div>
						<div class="col-md-8"></div>
					</div>
					<div class="row">
						<div class="col-md-4"><strong></strong></div>
						<div class="col-md-8"></div>
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
