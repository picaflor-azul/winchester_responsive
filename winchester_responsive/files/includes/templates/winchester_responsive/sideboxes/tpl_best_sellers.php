<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_best_sellers.php 2982 2006-02-07 07:56:41Z birdbrain $
 * @version $Id: tpl_best_sellers.php 2982 2007-12-15 21:00:00 TRUST IT - www.trustit.ca - ahmad@trustit.ca $
 * @version $Id: tpl_best_sellers.php 2982 2010-10-20 15:25:00 Dutchy
 * Modified by Anne (Picaflor-Azul.com) Winchester Respnsive v1.0
 */
  $content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n";
  $content .= '<div class="wrapper">' .  "\n";
  for ($i=1; $i<=sizeof($bestsellers_list); $i++) {
    $imgLink =  DIR_WS_IMAGES . $bestsellers_list[$i]['image'];
	if ($i==2) {$content .= '';}
    $content .= '<div class="bs-wrapper"><div class="bs-image"><a href="' . zen_href_link(zen_get_info_page($bestsellers_list[$i]['id']), 'products_id=' . $bestsellers_list[$i]['id']) . '">' . 	zen_image($imgLink, zen_trunc_string($bestsellers_list[$i]['name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div><div class="bs-name"><a href="' . zen_href_link(zen_get_info_page($bestsellers_list[$i]['id']), 'products_id=' . $bestsellers_list[$i]['id']) . '">' . zen_trunc_string($bestsellers_list[$i]['name'], BEST_SELLERS_TRUNCATE, BEST_SELLERS_TRUNCATE_MORE) . '</a><div class="bs-price">' . zen_get_products_display_price($bestsellers_list[$i]['id']) . '</div></div><br class="clearBoth" /></div>' . 	"\n";
  }
  $content .= '</div>' . "\n";
  $content .= '</div>';

?>