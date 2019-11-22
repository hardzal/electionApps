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
							</div>
							<div class="tombol">
								<a href='<?= base_url(); ?>admin/election/create' class="btn btn-primary">Tambah Pemilihan</a>
							</div>

							<?php if ($this->session->flashdata('message')) : ?>
								<div class="col-md-8 m-3">
									<?= $this->session->flashdata('message'); ?>
								</div>
							<?php endif; ?>

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
													<td class="align-middle">
														<?= $election->id; ?>
													</td>
													<td class="align-middle"><?= $election->title; ?></td>
													<td class="align-middle">
														<?= $election->total; ?> Orang
													</td>
													<td class="align-middle">
														<?= $election->start_at; ?>
													</td>
													<td class="align-middle"><?= $election->end_at; ?></td>
													<td>
														<?= statusBadge($election->status); ?>
													</td>
													<td>
														<a href="<?= base_url('admin/election/') . $election->id . "/details"; ?>" class="election_details btn btn-primary" data-toggle="modal" data-target="#detailModal" data-id="<?= $election->id; ?>" data-link="admin/election/details"><i class="fas fa-info-circle"></i></a>
														<a href="<?= base_url('admin/election/') . $election->id . "/edit"; ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
														<a data-link="admin/election/<?= $election->id; ?>/delete" data-id="<?= $election->id; ?>" class="hapus btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
					<h5 class="modal-title">Detail Election</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row mb-3">
						<div class="col-md-4"><strong>Nama Pemilihan</strong></div>
						<div class="col-md-2">:</div>
						<div class="col-md-6 name"></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4"><strong>Waktu Mulai</strong></div>
						<div class="col-md-2">:</div>
						<div class="col-md-6 start"></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4"><strong>Waktu Akhir</strong></div>
						<div class="col-md-2">:</div>
						<div class="col-md-6 end"></div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4"><strong>Kandidat</strong></div>
						<div class="col-md-2">:</div>
						<div class="col-md-6 candidates"></div>
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<a href="<?= base_url(); ?>" class="btn btn-primary">Details</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
