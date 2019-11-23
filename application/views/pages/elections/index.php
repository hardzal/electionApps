<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title; ?></h1>
		</div>

		<div class="section-body">
			<h2 class="section-title"><?= $title_page; ?></h2>
			<div class="row">

				<?php if ($this->session->flashdata('message')) : ?>
					<div class="col-md-8 m-3">
						<?= $this->session->flashdata('message'); ?>
					</div>
				<?php endif; ?>

				<?php foreach ($elections as $election) : ?>
					<div class="col-12 mb-4">
						<div class="hero text-white hero-bg-image hero-bg-parallax" data-background="<?= base_url(); ?>storage/elections/images/<?= $election->image; ?>">
							<div class="hero-inner">
								<h2><?= $election->title; ?></h2>
								<p class="lead"><?= $election->description; ?></p>
								<div class="mt-4">
									<?php if (checkVote($this->session->userdata('id'), $election->id)) : ?>
										<p class="alert alert-success col-sm-2 mb-5">You've vote this election</p>
										<a href="<?= base_url(); ?>election/votes/<?= $election->id; ?>" class="btn btn-outline-success btn-lg btn-icon icon-left">Detail Election</a>
									<?php else : ?>
										<a href="<?= base_url(); ?>election/<?= $election->id; ?>" class="btn btn-outline-primary btn-lg btn-icon icon-left"><i class="far fa-user"></i>Votes Now!</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
