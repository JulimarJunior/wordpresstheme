<?php get_header(); ?>
	
	<div class="article">
		<div class="article-top"></div>
		<div class="content-article">
			<?php the_post(); ?>
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
