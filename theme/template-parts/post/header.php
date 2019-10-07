<?php get_template_part( 'template-parts/content/title' ); ?>
<p class="article__date">
    <span class="fa fa-calendar"></span>
    <time datetime="<?php echo get_the_date('Y-m-d H:i') ?>"><?php echo get_the_date() ?> às <?php the_time('H') ?>h<?php the_time('m') ; ?></time>
</p>
<p class="article__readTime">
    <span class="fa fa-clock-o"></span> Tempo médio para leitura: <?php echo readingTime(get_the_content()); ?>
</p>