<div class="content-slider">
        <?php

                $banner = $db->Execute("SELECT banners_id, banners_title, banners_image, banners_html_text, banners_open_new_windows, banners_url FROM " . TABLE_BANNERS . " WHERE status = 1 AND banners_group = 'homepageslide'");
                
                if ($banner->RecordCount() > 0) {
                
                        echo '<div class="flexslider"><ul class="slides">';
                
                        while (!$banner->EOF) {
                
                                if (zen_not_null($banner->fields['banners_html_text'])) {
                                        $banner_string = '<a href="' . zen_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $banner->fields['banners_id']) . '">' . $banner->fields['banners_html_text'] . '</a>';
                                } else {
                                        if ($banner->fields['banners_url'] == '') {
                                                $banner_string = zen_image(DIR_WS_IMAGES . $banner->fields['banners_image'], $banner->fields['banners_title']) . '<span class="banner"><span>' . $banner->fields['banners_title'] . '</span></span>';
                                        } else {
                                              if ($banner->fields['banners_open_new_windows'] == '1') {
                                                        $banner_string = '<a href="' . zen_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $banner->fields['banners_id']) . '" target="_blank">' . zen_image(DIR_WS_IMAGES . $banner->fields['banners_image'], $banner->fields['banners_title']) . '<span class="banner"><span>' . $banner->fields['banners_title'] . '</span></span></a>';

          } else {
                                            $banner_string = '<a href="' . zen_href_link(FILENAME_REDIRECT, 'action=banner&goto=' . $banner->fields['banners_id']) . '">' . zen_image(DIR_WS_IMAGES . $banner->fields['banners_image'], $banner->fields['banners_title']) . '<span class="banner"><span>' . $banner->fields['banners_title'] . '</span></span></a>';
                                         }
                                        }
                                }
                
                                echo '<li>' . $banner_string . '</li>';
                
                                zen_update_banner_display_count($banner->fields['banners_id']);
                                $banner->MoveNext();
                                
                        }
                
                        echo '</ul></div>';
                }
                
        ?>
</div>


<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/jquery.flexslider.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  
  });
});
</script>