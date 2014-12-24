<?php

add_action('init', 'mdc_photo_gallery_cpt');

function mdc_photo_gallery_cpt() {
    $labels = array(
        'name' => _x('Gallery', 'post type general name', 'mdc-photo-gallery'),
        'singular_name' => _x('Photo', 'post type singular name', 'mdc-photo-gallery'),
        'menu_name' => _x('Gallery', 'admin menu', 'mdc-photo-gallery'),
        'name_admin_bar' => _x('Gallery Photo', 'add new on admin bar', 'mdc-photo-gallery'),
        'add_new' => _x('Add New Photo', 'gallery', 'mdc-photo-gallery'),
        'add_new_item' => __('Add New Photo', 'mdc-photo-gallery'),
        'new_item' => __('New Photo', 'mdc-photo-gallery'),
        'edit_item' => __('Edit Photo', 'mdc-photo-gallery'),
        'view_item' => __('View Photo', 'mdc-photo-gallery'),
        'all_items' => __('All Photos', 'mdc-photo-gallery'),
        'search_items' => __('Search Gallery', 'mdc-photo-gallery'),
        'parent_item_colon' => __('Parent Photo:', 'mdc-photo-gallery'),
        'not_found' => __('No photos found.', 'mdc-photo-gallery'),
        'not_found_in_trash' => __('No photos found in Trash.', 'mdc-photo-gallery')
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gallery'),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 42.01,
        'menu_icon' => plugins_url('mdc-photo-gallery').'/assets/img/icon.png',
        'supports' => array('title', 'thumbnail')
    );

    register_post_type('gallery', $args);
}

add_action('init', 'mdc_photo_gallery_category');

function mdc_photo_gallery_category() {
    register_taxonomy(
            'gallery_category', 'gallery', array(
        'label' => __('Gallery Type'),
        'rewrite' => array('slug' => 'gallery-category'),
        'hierarchical' => true,
            )
    );
}

add_action('admin_head', 'customposttype_image_box');

function customposttype_image_box() {
    remove_meta_box('postimagediv', 'gallery', 'side');
    add_meta_box('postimagediv', __('Gallery Photo'), 'post_thumbnail_meta_box', 'gallery', 'normal', 'high');
}

add_action('init', 'mdc_post_meta_box_hacks');

function mdc_post_meta_box_hacks() {
    add_post_type_support('gallery', array('title'));
}

add_filter('gettext', 'mdc_enter_photo_title_here');

function mdc_enter_photo_title_here($input) {
    global $post_type;
    if (is_admin() && 'Enter title here' == $input && 'gallery' == $post_type)
        return 'Enter Photo Title here';
    return $input;
}
