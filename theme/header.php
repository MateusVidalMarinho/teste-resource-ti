<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta name="theme-color" content="#1e1e22">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
    <?php wp_head(); ?>
</head>
<body class="<?php get_body_class(); ?>">
<?php wp_body_open(); ?>
<div id="resouceItTest" class="resouceItTest light-mode">
<nav class="navbar navbar-expand-md navbar-light bg-light custom-navbar">
    <div class="container d-flex justify-content-between">
        <a href="<?php echo get_home_url(); ?>" class="navbar-brand">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholderImage.jpg" alt="Logotipo <?php bloginfo('name'); ?>">
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#toggleMenuButton" aria-controls="toggleMenuButton" aria-expanded="false" aria-label="Alternar menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button id="darkModeTogglerButton" class="darkModeTogglerButton" title="Alternar modos escuro/claro">
            <span class="fa fa-lightbulb-o"></span>
        </button>
        <?php if ( get_pages() ) : ?>
            <div class="d-md-block collapse navbar-collapse" id="toggleMenuButton">
                <ul class="navbar-nav text-right">
                    <?php foreach (get_pages() as $page): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title; ?></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        <?php endif ?>
    </div>
</nav>
<?php get_template_part( 'template-parts/home/slide' ); ?>
<div class="container-custom">