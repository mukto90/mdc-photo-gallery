<?php

function mdc_gallery_menu() {
    add_menu_page('Gallery Settings', 'Gallery Settings', 'administrator', 'mdc-photo-gallery-settings', 'mdc_photo_gallery_option_page', plugins_url('mdc-photo-gallery').'/assets/img/settings.png', 42.02);
	add_submenu_page('mdc-photo-gallery-settings', 'Gallery Page Generator', 'Gallery Generator', 'administrator', 'mdc-photo-gallery-page-generator', 'mdc_photo_gallery_page_generator');
}

add_action('admin_menu', 'mdc_gallery_menu');

include "mdc-photo-gallery-settings-page.php";
include "mdc-photo-gallery-page-generator.php";