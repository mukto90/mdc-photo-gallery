<?php

function mdc_photo_gallery_option_page() {
   ?>
    <div class="wrap">
        <h2>Gallery Settings</h2>
        <div id="poststuff">
            <div class="metabox-holder columns-2" id="post-body">
                <!-- main content -->
                <div id="post-body-content">
                    <div class="meta-box-sortables ui-sortable">
                        <div class="postbox">
                            <div class="inside">
								<?php if($_POST['gallery_settings'] == 1){
									update_option('mdc_enable_gallery_button', $_POST['mdc_enable_gallery_button']);
									update_option('mdc_enable_gallery_thumbnail', $_POST['mdc_enable_gallery_thumbnail']);
									update_option('mdc_enable_gallery_title', $_POST['mdc_enable_gallery_title']);
								}?>
                                <form method="POST" action="" class="gen-shortcode">
                                    <input type="hidden" name="gallery_settings" value="1" />
                                    <table class="form-table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <label for="mdc_enable_gallery_button">Enable Button</label>
                                                </th>
                                                <td>
                                                    <input type="checkbox" id="mdc_enable_gallery_button" name="mdc_enable_gallery_button" value="1" <?php if(get_option('mdc_enable_gallery_button') == 1){echo "checked";}?> /> Enable Next/Previuos/Slideshow Button
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <label for="mdc_enable_gallery_thumbnail">Enable Thumbnail</label>
                                                </th>
                                                <td>
                                                    <input type="checkbox" id="mdc_enable_gallery_thumbnail" name="mdc_enable_gallery_thumbnail" value="1" <?php if(get_option('mdc_enable_gallery_thumbnail') == 1){echo "checked";}?> /> Enable Gallery Thumbnail
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <label for="mdc_enable_gallery_title">Show Title</label>
                                                </th>
                                                <td>
                                                    <input type="checkbox" id="mdc_enable_gallery_title" name="mdc_enable_gallery_title" value="1" <?php if(get_option('mdc_enable_gallery_title') == 1){echo "checked";}?> /> Show Title of Image in FancyBox
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="submit">
                                        <input id="submit" class="button button-primary" type="submit" value="Save Settings"/>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <?php include "mdc-photo-gallery-credit.php";?>
            </div>
            <br class="clear">
        </div> <!-- #poststuff -->
    </div>
    </div>
    <?php
}
