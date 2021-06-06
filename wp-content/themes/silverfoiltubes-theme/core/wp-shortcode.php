<?php
// Social media sharer
function sharer($atts){
  ob_start();

  $sc_atts = shortcode_atts(
    array(
      'href' => get_bloginfo('url'),
      'title' => get_the_title(),
      'thumbnail' => get_bloginfo('template_directory').'/img/no-image.jpg',
    ), $atts
  );

  echo '<div class="sharer-lists">';
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.$sc_atts['href'].'" class="sharer-item" target="_BLANK">';
      echo '<i class="fab fa-facebook-square" aria-hidden="true"></i>';
    echo '</a>';
    echo '<a href="https://twitter.com/home?status='.$sc_atts['href'].'" class="sharer-item" target="_BLANK">';
      echo '<i class="fab fa-twitter" aria-hidden="true"></i>';
    echo '</a>';
    echo ' <a href="https://plus.google.com/share?url='.$sc_atts['href'].'"  class="sharer-item" target="_BLANK"> ';
      echo ' <i class="fab fa-google-plus" aria-hidden="true"></i> ';
    echo ' </a> ';
    echo ' <a href="https://pinterest.com/pin/create/button/?url='.$sc_atts['href'].'&media='.$sc_atts['thumbnail'].'&description=" class="sharer-item" target="_BLANK"> ';
      echo ' <i class="fab fa-pinterest-square" aria-hidden="true"></i> ';
    echo ' </a> ';
    echo ' <a href="https://www.linkedin.com/shareArticle?mini=true&url='.$sc_atts['href'].'&title='.$sc_atts['title'].'&summary=&source="  class="sharer-item" target="_BLANK"> ';
      echo ' <i class="fab fa-linkedin" aria-hidden="true"></i> ';
    echo ' </a> ';
  echo '</div>';

  return ob_get_clean();
}
add_shortcode( 'sharer', 'sharer');