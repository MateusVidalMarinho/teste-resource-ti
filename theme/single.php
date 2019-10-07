<?php get_header(); ?>
	<div class="container">
		<article class="article">
			<div class="row">
				<div class="col-md-8">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/post/header' ); ?>
						<div class="article__content">
							<?php the_content(); ?>
						</div>
						<?php comments_template(); ?>
					<?php 
						endwhile;
						endif;
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</article>
</div>
<?php get_footer(); ?>