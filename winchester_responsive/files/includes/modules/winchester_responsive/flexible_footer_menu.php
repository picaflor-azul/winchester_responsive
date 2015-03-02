<?php
/** Flexible Footer Menu
 * @package admin
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * Added by rbarbour (ZCAdditions.com), Flexible Footer Menu 1.1 (3)
 *
 */
 
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

  if (isset($var_linksList)) {
    unset($var_linksList);
  }
  $page_query = $db->Execute("select * from " . TABLE_FLEXIBLE_FOOTER_MENU . " where status = 1 and col_sort_order > 0 order by col_sort_order, col_header");
  if ($page_query->RecordCount()>0) {
    $rows = 0;



    while (!$page_query->EOF) {
      $rows++;
      $page_query_list_footer[$rows]['id'] = $page_query->fields['pages_id'];
      $page_query_list_footer[$rows]['header'] = $page_query->fields['col_header'];
      $page_query_list_footer[$rows]['title'] = $page_query->fields['page_title'];
      $page_query_list_footer[$rows]['text'] = $page_query->fields['col_html_text'];
      $page_query_list_footer[$rows]['image'] = $page_query->fields['col_image'];
      $page_query_list_footer[$rows]['sort'] = $page_query->fields['col_sort_order'];
      $URL = $page_query->fields['page_url'];

  if(strpos($URL, "http://") !== false) {
      $page_query_list_footer[$rows]['link'] = $URL . '" target="_blank ';
    } else {
      $page_query_list_footer[$rows]['link'] = $URL;
    }  



     $page_query->MoveNext();
    }

    $var_linksList = $page_query_list_footer;
  }

?>