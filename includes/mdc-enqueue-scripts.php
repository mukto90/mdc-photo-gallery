<?php

function mdc_photo_gallery_admin_enqueue_script() {
    $plugin_url = plugins_url('mdc-photo-gallery');
    wp_enqueue_style('mdc-chosen-main', $plugin_url . '/assets/chosen/chosen.css');

    wp_enqueue_script('mdc-jquery-main', $plugin_url . '/assets/js/jquery.js', array(), '1.0.0', false);
    wp_enqueue_script('mdc-chosen-main', $plugin_url . '/assets/chosen/chosen.jquery.js', array(), '1.0.0', false);
}

add_action('admin_enqueue_scripts', 'mdc_photo_gallery_admin_enqueue_script');

function mdc_add_to_admin_head() {
    ?>
    <script>
        cjq = new jQuery.noConflict();
        cjq(document).ready(function () {
            cjq(".chosen").chosen();
            //generate shortcode with ajax
            cjq(".gen-button").click(function (event) {
                cjq("#how-to-shortcode").show();
                cjq("#wpfooter").hide();
                cjq(".gen-success").hide();
                cjq.ajax({
                    url: "<?php echo plugins_url('mdc-photo-gallery'); ?>/assets/ajax.php",
                    type: "post",
                    data: cjq(".gen-shortcode").serialize(),
                    success: function (d) {
                        document.getElementById("generate").innerHTML = d;
                    }
                });
            });
        });

    </script>
    <?php
}

add_action('admin_head', 'mdc_add_to_admin_head');

function mdc_photo_gallery_enqueue_script() {
    $plugin_url = plugins_url('mdc-photo-gallery');
    wp_enqueue_style('mdc-galley-main', $plugin_url . '/assets/css/mdc-gallery.css');
    wp_enqueue_style('jquery-fancybox', $plugin_url . '/assets/fancybox/jquery.fancybox.css');
    wp_enqueue_style('jquery-fancybox-buttons', $plugin_url . '/assets/fancybox/helpers/jquery.fancybox-buttons.css');
    wp_enqueue_style('jquery-fancybox-thumbs', $plugin_url . '/assets/fancybox/helpers/jquery.fancybox-thumbs.css');

    wp_enqueue_script('mdc-main-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js', array(), '1.7', false);
    wp_enqueue_script('jquery-fancybox-pack', $plugin_url . '/assets/fancybox/jquery.fancybox.pack.js', array(), '1.0.0', false);
    wp_enqueue_script('jquery-mousewheel-pack', $plugin_url . '/assets/fancybox/lib/jquery.mousewheel.pack.js', array(), '1.0.0', false);
    wp_enqueue_script('jquery-fancybox-buttons', $plugin_url . '/assets/fancybox/helpers/jquery.fancybox-buttons.js', array(), '1.0.0', false);
    wp_enqueue_script('jquery-fancybox-thumbs', $plugin_url . '/assets/fancybox/helpers/jquery.fancybox-thumbs.js', array(), '1.0.0', false);
    wp_enqueue_script('jquery-fancybox-media', $plugin_url . '/assets/fancybox/helpers/jquery.fancybox-media.js', array(), '1.0.0', false);
    // wp_enqueue_script('mdc-custom-jquery', $plugin_url . '/assets/js/fancybox.js', array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'mdc_photo_gallery_enqueue_script');

function mdc_add_to_head() {
?>
<script>
$(document).ready(function() {
	$(".fancybox-thumb").fancybox({
		prevEffect	: 'none',
		nextEffect	: 'none',
		helpers	: {
			<?php if(get_option('mdc_enable_gallery_title') == 1){ ?>
			title	: {
				type: 'inside'
			},
			<?php } else{?>
			title: null,
			<?php } if(get_option('mdc_enable_gallery_button') == 1){?>
			buttons : true,
			<?php } else{?>
			buttons : false,
			<?php } if(get_option('mdc_enable_gallery_thumbnail') == 1){?>
			thumbs	: {
				width	: 50,
				height	: 50
			}
			<?php } ?>
		}
	});
});
</script>
    <?php
}

add_action('wp_head', 'mdc_add_to_head');