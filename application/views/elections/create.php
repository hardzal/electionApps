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

							<div class="col-md-8 m-3">
								<?= $this->session->flashdata('message'); ?>
							</div>

							<div class="card-body">
								<form method="POST" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-form-label" for="judul">Judul</label>
										<input class="form-control" name="judul" type="text" />
									</div>
									<div class="form-group">
										<label for="date-range">Waktu Mulai</label>
										<input type="text" class="form-control datetimepicker" name="mulai" />
									</div>
									<div class="form-group">
										<label for="date-range">Waktu Akhir</label>
										<input type="text" class="form-control datetimepicker" name="akhir" />
									</div>
									<div class="form-group">
										<label class="col-form-label col-12 col-md-3 col-lg-3">Thumbnail</label>
										<div class="col-sm-12 col-md-7">
											<div id="image-preview" class="image-preview">
												<label for="image-upload" id="image-label">Choose File</label>
												<input type="file" name="image" id="image-upload" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="deskripsi">Deskripsi</label>
										<textarea class="form-control summernote-simple" name="deskripsi"></textarea>
									</div>

									<div class="form-group">
										<label for="tambah">Tambah Candidate?</label>
										<a href="#candidates" class="candidate btn btn-primary" name="candidate">Tambah</a>
									</div>

									<div id="candidates" class="candidates">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label for="num_candidates">Jumlah kandidat</label>
													<input type="number" name="num_candidates" class="num_candidate form-control" min=1 />
												</div>
												<div class="col-md-8">
													<label for="nim_candidate">NIM kandidat</label>
													<input type="text" class="nim_candidate1 form-control" name="nim_candidate[]" />
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
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
