<?php
if($_POST['gene-code']){
	$output	 = "[mdc_photo_gallery";
	if(isset($_POST['gallery_category'][0]) && $_POST['gallery_category'][0] != ''){
		$output	.= " category='";
		foreach($_POST['gallery_category'] as $cat){
			$output	.= $cat.", ";
		}
		$output .= "'";
	}
	$output .= "]";
	$output = str_replace(", '", "'", $output);
	echo "<input onClick=\"this.setSelectionRange(0, this.value.length)\" type=\"text\" name=\"shortcode\" value=\"".$output."\" style=\"width:400px;\" readonly />";
}
