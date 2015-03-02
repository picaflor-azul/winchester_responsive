<?php
/**
 * 
 * init_display_mode.php
 *
 * @package initSystem
 * @copyright Copyright 2003-2011 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * Added by rbarbour (ZCAdditions.com), Responsive DIY Template Default for 1.5.x (65)
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

if ( isset($_GET['display_mode']) ) { $_SESSION['display_mode'] = $_GET['display_mode'];
}

?>