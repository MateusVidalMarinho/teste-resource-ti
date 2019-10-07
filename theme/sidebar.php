<aside class="col-md-4 sidebar">
	<h2>Últimos avisos</h2>
	<div>
		<?php
			$sidebar = new WP_Query(array(
				'posts_per_page' => 5, 
				'orderby' => 'post_date',
				'order' => 'DESC'
			));
		?>
		<?php if ( $sidebar->have_posts() ) : while ( $sidebar->have_posts()) : $sidebar->the_post(); ?>
		<article class="sidebar__item">
			<?php if (has_post_thumbnail()): ?>
				<?php get_the_post_thumbnail(); ?>
				<img class="sidebar__item__image" src="<?php the_post_thumbnail_url() ?>" alt="">
			<?php else: ?>
				<img class="sidebar__item__image" src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholderImage.jpg" alt="">
			<?php endif; ?>
			<h3>
				<a class="sidebar__item__link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h3>
		</article>
		<?php endwhile ?>
		<?php else: ?>
			Nenhum post cadastrado
		<?php endif; ?>
	</div>
</aside>