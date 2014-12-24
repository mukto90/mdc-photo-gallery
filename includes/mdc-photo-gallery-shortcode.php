<?php

//archive of all photos
function mdc_photo_gallery_shortcode($atts) {
    extract(shortcode_atts(array(
        'category' => '', //faq_category slug, default all
                    ), $atts));
    $all = array(
        'post_type' => 'gallery',
        'gallery_category' => $category
    );
    $all_faq = new WP_Query($all);
    if ($all_faq->have_posts()):
        echo "<div class=\"mdc-gallery\">";
        while ($all_faq->have_posts()): $all_faq->the_post();
            // the_title(); echo "<br />";
            $title = get_the_title();
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail_size');
            $url = $thumb['0'];
            echo "<div class='mdc-gallery-item'>
					<a href='$url' class='fancybox-thumb' rel='fancybox-thumb' title='$title' alt='$title'><img src='$url' title='$title' alt='$title' /></a>
				</div>";
        endwhile;
        echo "</div>";
    else:
        echo "No Images found!";
    endif;
}

add_shortcode('mdc_photo_gallery', 'mdc_photo_gallery_shortcode');
