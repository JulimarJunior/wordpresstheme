<?php get_header(); ?>

<?php the_post(); ?>

<?php 
	if (has_post_thumbnail($post->ID)) {
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
	} else {
		$image[0] = get_template_directory_uri().'/assets/img/no-image-post.png';
	}
?>
	
	<div class="article">
		<div class="article-header">
			<div class="article-img-bg" style="background-image: url('<?= $image[0] ?>');"></div>
			<div class="article-shadow"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="article-img" style="background-image: url('<?= $image[0] ?>');"></div>
						<div class="article-infos">
							<h1><?php the_title(); ?></h1>
							<p><?= mb_strimwidth(get_the_excerpt(), 0, 200, "..."); ?></p>
						</div>
						<div class="article-img-border"></div>
						<div class="article-infos-items">
							<div class="row">
								<div class="col-md-5 article-infos-item">
									<?php
										if(get_the_category()[0]->name) {
											?> <p class="article-category"><?= get_the_category()[0]->name ?></p> <?php
										}
									?>
									<?= get_the_date('F') ?> <?= get_the_date('d') ?>, <?= get_the_date('Y') ?> AT <?= get_the_date('H') ?>:<?= get_the_date('i') ?>
								</div>
								<div class="col-md-4 article-infos-item">
									Author: <?php the_author(); ?>
								</div>
								<div class="col-md-3 article-infos-item">
									Article
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="article-content">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
