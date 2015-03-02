<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_ezpages.php 2982 2006-02-07 07:56:41Z birdbrain $
 * Modified by Anne (Picaflor-Azul.com) Winchester Respnsive v1.0
 */
  $content = "";$content .="\n";for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {$content .= '          <li><i class="icon-circle-arrow-right"></i><a href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a></li>' . "\n" ;} // end FOR loop
?>