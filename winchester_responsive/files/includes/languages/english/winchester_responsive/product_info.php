<?php
// dgReviews
//Modified to work with version 3.0.2 of the zencart
// This is a quick down and dirty mod to add product reviews onto the product info page
// by MichaelDuvall.com
/**
 * @package languageDefines
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: product_info.php 3159 2006-03-11 01:35:04Z drbyte $
 * Modified by Anne (Picaflor-Azul.com) Winchester Responsive v1.0
 */

define('TEXT_PRODUCT_NOT_FOUND', 'Sorry, the product was not found.');
define('TEXT_CURRENT_REVIEWS', 'Current Reviews:');
define('TEXT_MORE_INFORMATION', 'For more information, please visit this product\'s <a href="%s" target="_blank">webpage</a>.');
define('TEXT_DATE_ADDED', 'This product was added to our catalog on %s.');
define('TEXT_DATE_AVAILABLE', 'This product will be in stock on %s.');
define('TEXT_ALSO_PURCHASED_PRODUCTS', 'Customers who bought this product also purchased...');
define('TEXT_PRODUCT_OPTIONS', 'Please Choose: ');
define('TEXT_PRODUCT_MANUFACTURER', 'Manufactured by: ');
define('TEXT_PRODUCT_WEIGHT', 'Shipping Weight: ');
define('TEXT_PRODUCT_QUANTITY', ' Units in Stock');
define('TEXT_PRODUCT_MODEL', 'Model: ');



// previous next product
define('PREV_NEXT_PRODUCT', 'Product ');
define('PREV_NEXT_FROM', ' from ');
define('IMAGE_BUTTON_PREVIOUS','Previous Item');
define('IMAGE_BUTTON_NEXT','Next Item');
define('IMAGE_BUTTON_RETURN_TO_PRODUCT_LIST','Back to Product List');

// missing products
//define('TABLE_HEADING_NEW_PRODUCTS', 'New Products For %s');
//define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Upcoming Products');
//define('TABLE_HEADING_DATE_EXPECTED', 'Date Expected');

define('TEXT_ATTRIBUTES_PRICE_WAS',' [was: ');
define('TEXT_ATTRIBUTE_IS_FREE',' now is: Free]');
define('TEXT_ONETIME_CHARGE_SYMBOL', ' *');
define('TEXT_ONETIME_CHARGE_DESCRIPTION', ' One time charges may apply');
define('TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK','Quantity Discounts Available');
define('ATTRIBUTES_QTY_PRICE_SYMBOL', zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;');

// added for product reviews to show on individual product pages
define('TEXT_OF_5_STARS', '%s of 5 Stars');
// change this constant to reflect the title you would like for your new customer reviews page
define('DG_CUSTOMER_REVIEWS_TITLE', 'Customer Reviews:');
?>