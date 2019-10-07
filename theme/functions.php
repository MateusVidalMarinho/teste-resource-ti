<?php
wp_enqueue_style('style', get_stylesheet_uri());

wp_enqueue_script('dark-mode', get_template_directory_uri() . '/assets/js/dark-mode.js', false, 1.1, true);
wp_enqueue_script('jquery-3.3.1', get_template_directory_uri() . '/assets/js/jquery-3.3.1.slim.min.js', false, 1.1, true);
wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', false, 1.1, true);
wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', false, 1.1, true);

add_theme_support('title-tag');

function register_my_service_worker () {
  echo "<script>
  if (\"serviceWorker\" in navigator) {
      navigator.serviceWorker.register(\"http://teste-resource-it.local/wp-content/themes/fatecpraiagrande/sw.js\").then(function(registration) { 
          console.info(\"Service Worker registration successful with scope: \", registration.scope);
      }).catch(function(err) { 
          console.error(\"Service Worker registration failed: \", err);
      });
  }
</script>";
}
add_action ( 'wp_head', 'register_my_service_worker' );

function readingTime($postContent) {
  $wordCount = str_word_count(strip_tags($postContent));
  $minutes = ceil($wordCount / 200);
  if ($minutes <= 1) {
    $minutesFormated = '1 minuto.';
  }
  else {
    $minutesFormated = $minutes . ' minutos.';
  }
  return $minutesFormated;
}

function getSmallContent() {
  $originalContent = strip_tags(get_the_content());
  echo rtrim(substr($originalContent, 0, 200))."..."; 
}
?>