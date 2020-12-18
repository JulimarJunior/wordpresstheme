<?php
/* Template Name: Home */

get_header();
?>

<?php
	$args = array( 'numberposts' => 7, 'order'=> 'DESC', 'orderby' => 'date');
	$postslist = get_posts( $args );
	$post = $postslist[0];
	unset($postslist[0]);
	if (has_post_thumbnail($post->ID)) {
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
	} else {
		$image[0] = get_template_directory_uri().'/assets/img/no-image-post.png';
	}

	if($post) {
		?>
		<div class="header" style="background-image: url('<?= $image[0] ?>');">
			<div class="header-content">
				<div class="container">
					<div class="row">
						<div class="my-auto">
							<?php
								if(get_the_category()[0]->name) {
									?> <p class="header-category"><?= get_the_category()[0]->name ?></p> <?php
								}
							?>
							<h1><?php the_title(); ?></h1>
							<p><?= mb_strimwidth(get_the_excerpt(), 0, 35, "..."); ?></p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<button class="btn">
									Read more
								</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="header-shadow"></div>
		</div>
		<?php
	} else {
		?>
		<div class="container no-publish">
			<img src="<?php bloginfo('template_url') ?>/assets/img/error.png" alt="">
			<br>
			No publications found!
		</div>
		<?php
	}
	?> 
	
<div class="news">
	<div class="container">
		<div class="row">
			<?php
				foreach ($postslist as $post) : setup_postdata($post);
					if (has_post_thumbnail($post->ID)) {
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
					} else {
						$image[0] = get_template_directory_uri().'/assets/img/no-image-post.png';
					}
			?> 
					<a class="col-md-4" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="news-item">
							<div class="news-content">
								<?php
									if(get_the_category()[0]->name) {
										?> <p class="news-category"><?= get_the_category()[0]->name ?></p> <?php
									}
								?>
								<p class="news-date"><?= get_the_date() ?></p>
								<h1><?php the_title(); ?></h1>
								<p><?= mb_strimwidth(get_the_excerpt(), 0, 35, "..."); ?></p>
							</div>
							<div class="news-image" style="background-image: url('<?= $image[0] ?>');"></div>
							<div class="news-shadow"></div>
						</div>
					</a>
            <?php
            	endforeach;
            ?>   
		</div>
	</div>
</div>

<?php get_footer(); ?>
