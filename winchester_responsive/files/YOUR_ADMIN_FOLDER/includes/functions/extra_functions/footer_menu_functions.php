<?php
/**
 * Flexible Footer Menu
 *
 * @package Template System
 * @copyright 2007 Clyde Jones
  * @copyright Portions Copyright 2003-2007 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * Added by rbarbour (ZCAdditions.com), Flexible Footer Menu 1.1 (3)
 */
 
function zen_set_flexible_footer_menu_status($page_id, $status) {
global $db;
    if ($status == '1') {
      return $db->Execute("update " . TABLE_FLEXIBLE_FOOTER_MENU . " set status = '1' where page_id = '" . $page_id . "'");
    } elseif ($status == '0') {
      return $db->Execute("update " . TABLE_FLEXIBLE_FOOTER_MENU . " set status = '0' where page_id = '" . $page_id . "'");
    } else {
      return -1;
    }
  }
?>
