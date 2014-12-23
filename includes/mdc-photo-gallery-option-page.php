<?php

function mdc_gallery_menu() {
    add_menu_page('Gallery Settings', 'Gallery Settings', 'administrator', 'mdc-photo-gallery-settings', 'mdc_photo_gallery_option_page', plugins_url('mdc-photo-gallery').'/assets/img/settings.png', 42.02);
}

add_action('admin_menu', 'mdc_gallery_menu');

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
                                <form method="POST" action="" class="gen-shortcode">
                                    <input type="hidden" name="gene-code" value="1" />
                                    <table class="form-table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <label for="gallery_category">Choose Gallery Type</label>
                                                </th>
                                                <td>
                                                    <select id="gallery_category" name="gallery_category[]" class="chosen" multiple="true" style="width:400px;">
                                                        <option value="">All</option>
                                                        <?php
                                                        $caregories = get_terms('gallery_category');
                                                        foreach ($caregories as $term) {
                                                            echo "<option value=" . $term->slug . ">" . $term->name . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="submit">
                                        <input id="submit" class="button button-primary gen-button" onclick="return false" type="submit" value="Generate Shortcode"/>
                                    </p>
                                </form>
                                <div id="how-to-shortcode" style="display: none">
                                    <h3>How to create an gallery page</h3>
                                    <form action="" method="POST">
                                        <input type="hidden" name="gene-page" value="1" />
                                        <ol>
                                            <li>Copy the shortcode below.<br /><span id="generate" ></span></li>
                                            <li>Go to <a href="<?php echo admin_url(); ?>post-new.php?post_type=page" target="_blank">Pages > Add New</a>. Give a title and paste the shortcode in the content editor area.</li>
                                            <li>Publish the page.</li>
                                            <li>Or, give a page title, click the button below and let us do it for you-</li>
                                        </ol>
                                        <input type="text" name="gallery_title" placeholder="Page Title" required>
                                        <input id="submit" type="submit" class="button button-primary gen-page-btn" value="Generate Gallery Page" />
                                    </form>
                                </div>
                                <?php
                                if ($_POST['gene-page']) {
                                    // Create post object
                                    $my_post = array(
                                        'post_title' => $_POST['gallery_title'],
                                        'post_content' => $_POST['shortcode'],
                                        'post_status' => 'publish',
                                        'post_type' => 'page'
                                    );

                                    // Insert the post into the database
                                    $faq_pid = wp_insert_post($my_post);
                                    echo "<span class=\"gen-success\">Gallery page has been created. <a href=\"" . get_the_permalink($faq_pid) . "\" target=\"_blank\">Click here</a> to view the page.</span>";
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar -->
                <div class="postbox-container" id="postbox-container-1">
                    <div class="meta-box-sortables">
                        <div class="postbox">
                            <h3><span>MDC Photo Gallery</span></h3>
                            <div class="inside">
                                <a target="_blank" href="http://mukto.medhabi.com/">
                                    <img src="<?php echo plugins_url('mdc-photo-gallery') ?>/assets/img/mukto90.png" style="width: 130px" />
                                </a>
                                <p>By <a href="http://mukto.medhabi.com" target="_blank">Nazmul Ahsan</a>, a passionate PHP Programmer and WordPress Ninja.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br class="clear">
        </div> <!-- #poststuff -->
    </div>
    </div>
    <?php
}
