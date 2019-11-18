	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1><?= $title_header; ?></h1>
				<div class="section-header-breadcrumb">
					<div class="breadcrumb-item active"><a href="#">Management</a></div>
					<div class="breadcrumb-item"><a href="#">Candidates</a></div>
					<div class="breadcrumb-item">Create</div>
				</div>
			</div>

			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4><?= $title; ?></h4>
							</div>

							<?= $this->session->flashdata('message'); ?>

							<div class="card-body">
								<form method="POST" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-form-label" for="pemilihan">Pemilihan</label>
										<select name="election_id" class="form-control">
											<?php foreach ($elections as $election) : ?>
												<option value="<?= $election->id; ?>"><?= $election->title; ?></option>
											<?php endforeach; ?>
										</select>
										<?= form_error('election_id', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<label class="col-form-label" for="NIM">NIM</label>
												<input class="form-control" name="nim" type="text" id="nim_candidate" />
												<?= form_error('nim', '<small class="text-danger">', '</small>'); ?>
											</div>
											<div class="col-md-8">
												<label class="col-form-label" for="nama">Nama</label>
												<input class="form-control" name="nama" type="text" id="nama_candidate" />
												<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
											</div>
											<input name="user_id" value="" type="hidden" id="user_id" />
											<?= form_error('user_id', '<small class="text-danger">', '</small>'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-form-label">Thumbnail</label>
										<div class="col-sm-12 col-md-7">
											<div id="image-preview" class="image-preview">
												<label for="image-upload" id="image-label">Choose File</label>
												<input type="file" name="image" id="image-upload" />
												<?= form_error('image', '<small class="text-danger">', '</small>'); ?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="deskripsi">Visi</label>
										<textarea class="form-control summernote-simple" name="visi"></textarea>
										<?= form_error('visi', '<small class="text-danger">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="deskripsi">Misi</label>
										<textarea class="form-control summernote-simple" name="misi"></textarea>
										<?= form_error('misi', '<small class="text-danger">', '</small>'); ?>
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
