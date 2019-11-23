<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>

		<div class="section-body">
			<h2 class="section-title"><?= $candidates[0]->title; ?></h2>

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
								<p>Result : <?= resultVote($candidate->election_id, $candidate->id); ?> votes</p>
							</div>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
