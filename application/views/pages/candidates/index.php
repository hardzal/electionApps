<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>

		<div class="section-body">
			<h2 class="section-title"><?= $title_page; ?></h2>

			<div class="row">
				<?php foreach ($candidates as $candidate) : ?>
					<div class="col-12 col-md-4 col-lg-4">
						<article class="article article-style-c">
							<div class="article-header">
								<div class="article-image" data-background="<?= base_url(); ?>storage/candidates/images/<?= $candidate->image; ?>">
								</div>
							</div>
							<div class="article-details">
								<div class="article-title">
									<h2><a href="#"><?= $candidate->name; ?></a></h2>
								</div>
								<p><?= $candidate->nim; ?></p>	
								<div class="article-cta">
									<a href="#candidate<?= $candidate->id; ?>" data-toggle="collapse" role="button" class="btn btn-primary centered">Readmore</a>
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
		</div>
	</section>
</div>
