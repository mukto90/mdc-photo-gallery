<?php
function mdc_photo_gallery_admin_enqueue_script(){
$plugin_url = plugins_url('mdc-photo-gallery');
?>
	<link rel="stylesheet" href="<?php echo $plugin_url;?>/assets/chosen/chosen.css" />
	<script src="<?php echo $plugin_url;?>/assets/js/jquery.js"></script>
	<script src="<?php echo $plugin_url;?>/assets/chosen/chosen.jquery.js"></script>
	<script src="<?php echo $plugin_url;?>/assets/js/mdc-admin-faq.js"></script>
	<script>
		cjq = new jQuery.noConflict();
		cjq(document).ready(function(){
			cjq(".chosen").chosen();
			//generate shortcode with ajax
			cjq(".gen-button").click(function(event) {
				cjq("#how-to-shortcode").show();
				cjq("#wpfooter").hide();
				cjq(".gen-success").hide();
				cjq.ajax({
					url: "<?php echo plugins_url('mdc-photo-gallery');?>/assets/ajax.php",
					type: "post",
					data: cjq(".gen-shortcode").serialize(),
					success: function(d) {
						document.getElementById("generate").innerHTML  = d;
					}
				});
			});
		});
		
	</script>
<?php
}
if($_GET['page'] && $_GET['page'] == 'mdc-photo-gallery-settings'){
add_action('admin_head', 'mdc_photo_gallery_admin_enqueue_script');
}
function mdc_photo_gallery_enqueue_script(){
$plugin_url = plugins_url('mdc-photo-gallery');
?>
<link rel="stylesheet" href="<?php echo $plugin_url;?>/assets/css/mdc-gallery.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo $plugin_url;?>/assets/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $plugin_url;?>/assets/fancybox/jquery.fancybox.pack.js"></script>


<script type="text/javascript" src="<?php echo $plugin_url;?>/assets/fancybox/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $plugin_url;?>/assets/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="<?php echo $plugin_url;?>/assets/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $plugin_url;?>/assets/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="<?php echo $plugin_url;?>/assets/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?php echo $plugin_url;?>/assets/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript" src="<?php echo $plugin_url;?>/assets/js/fancybox.js?v=1.0.6"></script>

<?php
}
add_action('wp_head', 'mdc_photo_gallery_enqueue_script');