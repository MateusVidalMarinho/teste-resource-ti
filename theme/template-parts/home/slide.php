<!-- SLIDE -->
<?php 
    if (is_front_page()):
    $postsCarousel = new WP_Query(array('posts_per_page' => 3));
?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php 
            $i = 0;
            if ( $postsCarousel->have_posts() ) : while ( $postsCarousel->have_posts()) : $postsCarousel->the_post(); 
        ?>
        <li data-target="#carouselExampleCaptions" data-slide-to="<?php $i ?>" class="<?php echo $i == 0 ? "active" : "" ?>"></li>
        <?php 
            $i++;
            endwhile
        ?>
        <?php else: ?>
            Nenhum post cadastrado
        <?php endif; ?>
    </ol>
    <div class="carousel-inner">
        <?php 
            $i = 0;
            if ( $postsCarousel->have_posts() ) : while ( $postsCarousel->have_posts()) : $postsCarousel->the_post(); 
        ?>
        <div class="carousel-item slide <?php echo $i == 0 ? "active" : "" ?>">
            <img src="https://dummyimage.com/1200x800/e0e0e0/fff" class="d-block slide__image" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="slide__title">
                    <a class="slide__link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h2>
            </div>
        </div>
        <?php 
            $i++;
            endwhile
        ?>
        <?php else: ?>
            Nenhum post cadastrado
        <?php endif; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php 
    endif;
?>