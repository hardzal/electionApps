<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>

		<div class="section-body">
			<h2 class="section-title"><?= $election[0]->title; ?></h2>
			
			<form method="post" action="">
				<div class="row d-flex justify-content-center">
					<?php foreach ($election as $candidate) : ?>
						<div class="col-12 col-md-4 col-lg-4">
							<article class="article article-style-c">
								<div class="article-header">
									<div class="article-image" data-background="<?= base_url(); ?>storage/candidates/images/<?= $candidate->image; ?>">
									</div>
								</div>
								<div class="article-details">
									<div class="article-title">
										<h1 class="text-center"><a href="<?= base_url(); ?>candidate/<?= $candidate->id; ?>"><?= $candidate->name; ?></a></h1>
									</div>
									<div class="d-flex justify-content-center">
										<label class="selectgroup-item">
											<input type="radio" name="candidate_id" class="selectgroup-input" value="<?= $candidate->id; ?>" />
											<span class="selectgroup-button">PILIH</span>
										</label>
									</div>
									<div class="article-cta">
										<a href="#candidate<?= $candidate->id; ?>" data-toggle="collapse" role="button" class="btn btn-primary centered">Detail</a>
									</div>
									<div class="collapse" id="candidate<?= $candidate->id; ?>">
										<h2>Visi</h2>
										<?= $candidate->visi; ?>
										<h2>Misi</h2>
										<?= $candidate->misi; ?>
									</div>
								</div>
							</article>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="row d-flex justify-content-center">
					<div class="col-md-6 text-center">
						<input type="hidden" name="user_id" value="<?= $this->session->userdata('id'); ?>" />
						<input class="btn-lg btn-primary" type="submit" name="submit" onclick="return confirm('Apakah anda yakin dengan pilihan anda?');?>" />
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
