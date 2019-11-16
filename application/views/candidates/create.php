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
								<?= $this->session->flashdata('message'); ?>
							</div>
							<div class="card-body">
								<form method="POST" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-form-label" for="NIM">NIM</label>
										<input class="form-control" name="nim" type="text" />
									</div>
									<div class="form-group">
										<label class="col-form-label">Thumbnail</label>
										<div class="col-sm-12 col-md-7">
											<div id="image-preview" class="image-preview">
												<label for="image-upload" id="image-label">Choose File</label>
												<input type="file" name="image" id="image-upload" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="deskripsi">Misi</label>
										<textarea class="form-control summernote-simple" name="misi"></textarea>
									</div>
									<div class="form-group">
										<label for="deskripsi">Visi</label>
										<textarea class="form-control summernote-simple" name="visi"></textarea>
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
