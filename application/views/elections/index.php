	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1><?= $title_header; ?></h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="#">Management</a></div>
					<div class="breadcrumb-item"><a href="#">Elections</a></div>
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
							<div class="tombol">
								<a href='<?= base_url(); ?>/user/create' class="btn btn-primary">Tambah Pemilihan</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="table-2">
										<thead>
											<tr>
												<th class="text-center">
													<div class="custom-checkbox custom-control">
														<input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
														<label for="checkbox-all" class="custom-control-label">&nbsp;</label>
													</div>
												</th>
												<th>Title</th>
												<th>Candidates</th>
												<th>Started</th>
												<th>Ended</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($elections_data as $election) : ?>
												<tr>
													<td>

													</td>
													<td><?= $election->title; ?></td>
													<td class="align-middle">
														<?= $election->total; ?> Orang
													</td>
													<td>
														<?= $election->started_at; ?>
													</td>
													<td><?= $election->end_at; ?></td>
													<td>
														<?= statusBadge($election->status); ?>
													</td>
													<td>
														<a href="<?= base_url('user/') . $election->id . "/details"; ?>" class="detail btn btn-primary" data-toggle="modal" data-target="#detailModal"><i class="fas fa-info-circle"></i></a>
														<a href="<?= base_url('user/') . $election->id . "/edit"; ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
														<a data-id="<?= $election->id; ?>" class="hapus btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
