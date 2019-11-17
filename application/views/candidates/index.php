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
								<a href='<?= base_url(); ?>admin/candidate/create' class="btn btn-primary">Tambah Candidate</a>
							</div>
							<div class="col-md-8 m-3">
								<?= $this->session->flashdata('message'); ?>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="table-2">
										<thead>
											<tr>
												<th class="text-center"># </th>
												<th>Nama</th>
												<th>NIM</th>
												<th>Pemilihan</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($candidate_data as $candidate) : ?>
												<tr>
													<td class="align-middle text-center"><?= $no++; ?></td>
													<td class="align-middle"><?= $candidate->name; ?></td>
													<td class="align-middle"><?= $candidate->nim; ?></td>
													<td class="align-middle"><?= $candidate->title; ?></td>
													<td>
														<?= statusBadge($candidate->status); ?>
													</td>
													<td>
														<a href="<?= base_url('admin/candidate/') . $candidate->id . "/details"; ?>" class="detail btn btn-primary" data-toggle="modal" data-target="#detailModal"><i class="fas fa-info-circle"></i></a>
														<a href="<?= base_url('admin/candidate/') . $candidate->id . "/edit"; ?>" class="btn btn-success"><i class="far fa-edit"></i></a>
														<a data-link="admin/candidate/<?= $candidate->id; ?>/delete" data-id="<?= $candidate->id; ?>" class="hapus btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
