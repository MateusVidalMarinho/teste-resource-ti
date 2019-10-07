<?php get_header(); ?>
	<div class="container">
		<section class="row">
			<div class="col-md-8">
				<article class="article">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content/title' ); ?>
						<div class="article__content">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</article>
			</div>
			<?php get_sidebar(); ?>
		</section>
	</div>
<?php get_footer(); ?>