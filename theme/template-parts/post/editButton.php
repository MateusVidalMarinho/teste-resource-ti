<?php if(current_user_can('editor') || current_user_can('administrator')): ?>
    <span class="article__editButton badge badge-secondary">
        <?php edit_post_link('Editar', '', '', get_the_ID(), ''); ?>
    </span>
<?php endif; ?>