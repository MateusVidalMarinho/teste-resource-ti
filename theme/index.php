<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<main class="col-md-8 homeConteiner">
				<h2>Notícias</h2>
				<?php 
					$paged = get_query_var( 'paged' );
					$posts = new WP_Query(array(
						'orderby' => 'post_date', 
						'order' => 'DESC', 
						'paged' => $paged
					));
					if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<article class="card postCard">
						<?php 
							if (has_post_thumbnail()):?>
								<img src="<?php the_post_thumbnail_url() ?>" class="card-img-top" alt="">
							<?php
							else:?>
							
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholderImage.jpg" class="card-img-top" alt="">
							<?php endif;
						?>
						
						<div class="card-body">
							<h3 class="postCard__title card-title">
								<a class="postCard__link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								<?php if(current_user_can('editor') || current_user_can('administrator')): ?>
									<span class="postCard__edit badge badge-secondary">
										<?php edit_post_link('Editar', '', '', get_the_ID(), ''); ?>
									</span>
								<?php endif; ?>
							</h3>
							<p class="postCard__text">
								<span class="fa fa-calendar"></span>
								<time datetime="<?php echo get_the_date('Y-m-d H:i') ?>"><?php echo get_the_date() ?> às <?php the_time('H') ?>h<?php the_time('m') ; ?></time>
							</p>
							<div class="postCard__text text-justify">
								<?php 
									getSmallContent();
								?>
							</div>
							<a href="<?php the_permalink() ?>" class="postCard__readMore card-link">Ver mais</a>
						</div>
					</article>
				<?php endwhile?>
				<div class="pagination">
					<?php echo get_previous_posts_link('Página Anterior', $posts->max_num_pages); ?>
					<?php next_posts_link('Próxima Página', $posts->max_num_pages); ?>
				</div>
				<?php else: ?>
					<article class="card postCard">
						<div class="card-body">
							<h3 class="postCard__title card-title">Nenhum artigo cadastrado.</h3>
							<div class="postCard__text">Ainda não foi cadastrado nenhum artigo para este blog.</div>
						</div>
					</article>
				<?php endif; ?>
				
			</main>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
