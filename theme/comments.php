<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Este artigo está protegido por password. Insira-a para ver os comentários.</p>
	<?php
		return;
	}
?>

<section id="comments">
	<h2><?php comments_number('0 Comentários', '1 Comentário', '% Comentários' );?></h2>
	
	<?php if ( have_comments() ) : ?>
	
		<ol class="commentsList">
			<?php wp_list_comments('avatar_size=64&type=comment'); ?>   
		</ol>
    
		<?php if ($wp_query->max_num_pages > 1) : ?>
		<div class="pagination">
    	<ul>
    		<li class="older"><?php previous_comments_link('Anteriores'); ?></li>
   			<li class="newer"><?php next_comments_link('Novos'); ?></li>
   		</ul>
    </div>
    <?php endif; ?>
    
	<?php endif; ?>


	<?php if ( comments_open() ) : ?>

		
	<div class="commentsResponse">
		<h2>Deixe o seu comentário!</h2>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <fieldset>
				<?php if ( $user_ID ) : ?>				
					<p class="commentsResponse__activeUser">Autentificado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>
				<?php else : ?>
				
				<label for="author" class="font-weight-bold">Nome</label>
				<input class="form-control" type="text" name="author" id="author" value="<?php echo $comment_author; ?>"  placeholder="Digite seu nome"/>

				<label for="email" class="font-weight-bold">Email</label>
				<input class="form-control" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>"  placeholder="Digite seu e-mail"/>
						
				<label for="url" class="font-weight-bold">Website</label>
				<input class="form-control mb-3" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Digite seu website"/>
                
                <?php endif; ?>

                <label for="comment" class="font-weight-bold">Mensagem</label>
                <textarea class="form-control mb-3" name="comment" id="comment" rows="" cols="" placeholder="Digite sua mensagem"></textarea>
                
                <button type="submit" class="btn btn-dark">Enviar Comentário</button>
            	
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </fieldset>          
        </form>
        <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
		</div>           
	 <?php else : ?>
		<h2>Os comentários estão fechados.</h2>
<?php endif; ?>
</section>