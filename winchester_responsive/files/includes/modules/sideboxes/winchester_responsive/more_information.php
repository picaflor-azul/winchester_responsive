<?php
/**
 * more_information sidebox - displays list of links to additional pages on the site.  Must separately build those pages' content.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: more_information.php 3464 2006-04-19 00:07:26Z ajeh $
 *
 * BetterCategoriesEzInfo v1.3.5 added  2006-09-19  gilby
 */
 
$pointer = zen_image(DIR_WS_TEMPLATE_IMAGES . 'bc_moreinfo.gif');
// uncomment next line to add 1 space between image & text
// $pointer .= '&nbsp;';

// test if box should display

  unset($more_information);

// test if links should display
  if (DEFINE_PAGE_2_STATUS <= 1) {
    $more_information[] = '<a href="' . zen_href_link(FILENAME_PAGE_2) . '">' . $pointer . BOX_INFORMATION_PAGE_2 . '</a>';
  }
  if (DEFINE_PAGE_3_STATUS <= 1) {
    $more_information[] = '<a href="' . zen_href_link(FILENAME_PAGE_3) . '">' . $pointer . BOX_INFORMATION_PAGE_3 . '</a>';
  }
  if (DEFINE_PAGE_4_STATUS <= 1) {
    $more_information[] = '<a href="' . zen_href_link(FILENAME_PAGE_4) . '">' . $pointer . BOX_INFORMATION_PAGE_4 . '</a>';
  }

// insert additional links below to add to the more_information box
// Example:
//    $more_information[] = '<a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . 'TESTING' . '</a>';


// only show if links are active
  if (sizeof($more_information) > 0) {
    require($template->get_template_dir('tpl_more_information.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_more_information.php');

    $title =  BOX_HEADING_MORE_INFORMATION;
    $title_link = false;
    require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
  }
?>