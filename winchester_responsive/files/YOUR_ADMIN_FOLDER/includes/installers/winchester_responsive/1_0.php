<?php
$configuration = $db->Execute("SELECT configuration_group_id FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_title = '" . BOX_CONFIGURATION_WINCHESTER_RESPONSIVE . "' ORDER BY configuration_group_id ASC;");
if ($configuration->RecordCount() > 0) {
  while (!$configuration->EOF) {
    $db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = " . $configuration->fields['configuration_group_id'] . ";");
    $db->Execute("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = " . $configuration->fields['configuration_group_id'] . ";");
    $configuration->MoveNext();
  }
}

// Layout Settings
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '&nbsp;<i class=\"fa fa-angle-right\"></i>&nbsp;' WHERE configuration_key = 'BREAD_CRUMBS_SEPARATOR' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'DEFINE_BREADCRUMB_STATUS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '250px' WHERE configuration_key = 'COLUMN_WIDTH_LEFT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'COLUMN_RIGHT_STATUS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '' WHERE configuration_key = 'CATEGORIES_SEPARATOR' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '' WHERE configuration_key = 'CATEGORIES_SEPARATOR_SUBS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '<span class=\"cat-count\">' WHERE configuration_key = 'CATEGORIES_COUNT_PREFIX' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '</span>' WHERE configuration_key = 'CATEGORIES_COUNT_SUFFIX' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_CUSTOMER_GREETING' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_FOOTER_IP' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'Yes' WHERE configuration_key = 'IMAGE_USE_CSS_BUTTONS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'CATEGORIES_TABS_STATUS' LIMIT 1;");

// Maximum Values
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'MAX_MANUFACTURERS_LIST' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'MAX_RECORD_COMPANY_LIST' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'MAX_MUSIC_GENRES_LIST' LIMIT 1;");

// Images
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'SMALL_IMAGE_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'SMALL_IMAGE_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_LISTING_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_NEW_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_NEW_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_NEW_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_ALL_LISTING_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '200' WHERE configuration_key = 'IMAGE_PRODUCT_ALL_LISTING_HEIGHT' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 4 WHERE configuration_key = 'IMAGES_AUTO_ADDED' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '300' WHERE configuration_key = 'MEDIUM_IMAGE_WIDTH' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '300' WHERE configuration_key = 'MEDIUM_IMAGE_HEIGHT' LIMIT 1;");

// Product Listing
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'PRODUCT_LIST_IMAGE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_MANUFACTURER' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_MODEL' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'PRODUCT_LIST_NAME' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 3 WHERE configuration_key = 'PRODUCT_LIST_PRICE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'PRODUCT_LIST_PRICE_BUY_NOW' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_DESCRIPTION' LIMIT 1;");

//  Shipping/Packaging
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'SHOW_SHIPPING_ESTIMATOR_BUTTON' LIMIT 1;");

// Stock
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'SHOW_SHOPPING_CART_DELETE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 1 WHERE configuration_key = 'SHOW_SHOPPING_CART_UPDATE' LIMIT 1;");

// Product Info
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_INFO_CATEGORIES' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 2 WHERE configuration_key = 'PRODUCT_INFO_PREVIOUS_NEXT' LIMIT 1;");

// Index Listing
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_UPCOMING' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING' LIMIT 1;");

// EZ Pages
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'EZPAGES_STATUS_HEADER' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'EZPAGES_STATUS_FOOTER' LIMIT 1;");

// ZCA Responsive Template Switch
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES 
(NULL, '<b>ACTIVATE Responsive Template</b>', 'COLUMN_WIDTH', '1', 'Column Width - Left Boxes &<br /> Column Width - Right Boxes<br /><b>DO NOT WORK WITH</b><br />(1)Responsive Template Settings<br /><br /><b>Use</b><br />Column Width - Left &<br /> Column Width - Right<br /><br /><br /> 0 = Use Default Template Settings<br />1 = Use Responsive Template Settings<br />', '19', NULL, NOW(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),');");

global $db;
$sql = "SELECT * from " . TABLE_LAYOUT_BOXES . " LIMIT 1";
$result = $db->Execute($sql);
$value = $result->fields['show_box_min_width'];
$type = gettype($value);
if ($type == 'NULL'){

$db->Execute("ALTER TABLE " . TABLE_LAYOUT_BOXES  . " ADD show_box_min_width TINYINT( 1 ) NOT NULL DEFAULT '1' AFTER layout_box_status_single;");

}

// Layout Boxes
$db->Execute("INSERT IGNORE INTO " . TABLE_LAYOUT_BOXES . "   (layout_id, layout_template, layout_box_name, layout_box_status, layout_box_location, layout_box_sort_order, layout_box_sort_order_single, layout_box_status_single, show_box_min_width) VALUES
(NULL, 'default_template_settings', 'ezpages_drop_menu.php', 0, 0, 0, 0, 1, 1);");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'banner_box.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name =  'banner_box2.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'banner_box_all.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'best_sellers.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'categories.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'currencies.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'document_categories.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'ezpages.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'featured.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'information.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'languages.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'manufacturer_info.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'manufacturers.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'more_information.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'music_genres.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'order_history.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'product_notifications.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'record_companies.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'reviews.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'search.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'shopping_cart.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'specials.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'whats_new.php' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_LAYOUT_BOXES . " SET show_box_min_width = 0 WHERE layout_box_name = 'whos_online.php' LIMIT 1;");

// About Us
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value,configuration_description, configuration_group_id, sort_order,last_modified, date_added, use_function, set_function) VALUES ('Define About Us Status', 'DEFINE_ABOUT_US_STATUS', '1', 'Enable the Defined About Us Link/Text?0= Link ON, Define Text OFF1= Link ON, Define Text ON2= Link OFF, Define Text ON3= Link OFF, Define Text OFF', 25, 90, '', '', NULL, 'zen_cfg_select_option(array(''0'', ''1'', ''2'', ''3''),');");

// Carousel Featured Products
$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_title, configuration_group_description, sort_order, visible) VALUES ('Carousel Featured Products', 'Set Carousel Featured Products Options', '1', '1');");
$configuration_group_id = $db->Insert_ID();

$db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = " . $configuration_group_id . " WHERE configuration_group_id = " . $configuration_group_id . ";");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_id, configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) VALUES(NULL, 'Carousel Featured Products', 'CAROUSEL_FEATURED_PRODUCTS', 'true', 'Display your featured products in a carousel?<br /><br/>Default = true<br/>', " . $configuration_group_id . ", 101, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
(NULL, 'Maximum Display Carousel Featured Products', 'MAX_DISPLAY_SEARCH_RESULTS_CAROUSEL_FEATURED', '10', 'Set this to how many featured products you have - regardless of the number, only three will show on the carousel at a time.<br/><br/>Default = 10<br/>', " . $configuration_group_id . ", 102, NULL, now()),
(NULL, 'Display Description', 'CAROUSEL_FEATURED_DESCRIPTION', 'false', 'Display featured products description?<br/><br/>Default = true<br/>', " . $configuration_group_id . ", 105, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
(NULL, 'Description Length', 'CAROUSEL_FEATURED_DESCRIPTION_LENGTH', '100', '--ONLY APPLICABLE IF DISPLAY DISCRIPTION IS TRUE--<br/><br/>Featured product description length in chatacters<br/><br/>Default = 100<br/>', " . $configuration_group_id . ", 106, NULL, now()),
(NULL, 'Display Button', 'CAROUSEL_FEATURED_LINK', 'true', 'Display \"Buy Now\" or \"More Information\" buttons?<br/><br/>Default = true<br/>', " . $configuration_group_id . ", 107, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
(NULL, 'Display Price', 'CAROUSEL_FEATURED_PRICE', 'true', 'Display featured product price?<br/><br/>Default = true<br/>', " . $configuration_group_id . ", 107, 'zen_cfg_select_option(array(\'true\', \'false\'), ', now()),
(NULL, 'Carousel Featured Image Listing Width', 'IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_WIDTH', '200', 'The width of the product images in the carousel.<br/>Default = 100', " . $configuration_group_id . ", 108, NULL, now()),
(NULL, 'Carousel Featured Image Listing Height', 'IMAGE_CAROUSEL_FEATURED_PRODUCTS_LISTING_HEIGHT', '200', 'The height of the product images in the carousel.<br/>Default = 80', " . $configuration_group_id . ", 109, NULL, now());");

$db->Execute("INSERT IGNORE INTO  " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES ('configCarouselFeatured','BOX_CONFIGURATION_CAROUSEL','FILENAME_CONFIGURATION',CONCAT('gID='," . $configuration_group_id . "),'configuration','Y', 65);");

// Flexible Footer Menu
$db->Execute("CREATE TABLE IF NOT EXISTS " . TABLE_FLEXIBLE_FOOTER_MENU . "(
  page_id int(11) NOT NULL AUTO_INCREMENT,
  language_id int(11) NOT NULL DEFAULT '1',
  page_title varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  page_url varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  col_header varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  col_image varchar(254) CHARACTER SET utf8 NOT NULL DEFAULT '',
  col_html_text text CHARACTER SET utf8,
  status int(1) NOT NULL DEFAULT '0',
  col_sort_order int(11) NOT NULL DEFAULT '0',
  col_id int(11) NOT NULL DEFAULT '0',
  date_added datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  last_update datetime DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29;");

$db->Execute("INSERT  IGNORE INTO " . TABLE_FLEXIBLE_FOOTER_MENU . " (page_id, language_id, page_title, page_url, col_header, col_image, col_html_text, status, col_sort_order, col_id, date_added, last_update) VALUES
(3, 1, 'Home', 'index.php?main_page=', '', '', '', 1, 11, 1, '0000-00-00 00:00:00', '2014-04-15 12:23:45'),
(5, 1, 'Featured', 'index.php?main_page=featured_products', '', '', '', 1, 12, 1, '2013-06-24 07:45:26', '2014-04-15 12:25:49'),
(6, 1, '', '', 'Shop', '', '', 1, 1, 1, '2013-06-24 09:03:26', '2014-04-15 13:05:43'),
(8, 1, 'Specials', 'index.php?main_page=specials', '', '', '', 1, 13, 1, '2013-06-24 09:11:56', '2014-04-15 12:25:28'),
(9, 1, 'New Arrivals', 'index.php?main_page=products_new', '', '', '', 1, 14, 1, '2013-06-24 09:12:50', '2014-04-15 12:26:11'),
(10, 1, 'View All', 'index.php?main_page=products_all', '', '', '', 1, 15, 1, '2013-06-24 09:14:04', '2014-04-15 13:03:06'),
(11, 1, '', '', 'Customer Service', '', '', 1, 21, 2, '2013-06-24 09:15:49', '2014-04-15 15:00:16'),
(12, 1, 'About Us', 'index.php?main_page=about_us', '', '', '', 1, 24, 2, '2013-06-24 09:18:43', '2014-04-15 15:03:23'),
(14, 1, 'Gift Certificate FAQ', 'index.php?main_page=gv_faq', '', '', '', 1, 26, 2, '2013-06-24 09:19:40', '2014-04-15 15:02:42'),
(15, 1, 'Discount Coupons', 'index.php?main_page=discount_coupon', '', '', '', 1, 28, 2, '2013-06-24 09:20:12', '2014-04-15 15:04:14'),
(16, 1, 'Newsletter Unsubscribe', 'index.php?main_page=unsubscribe', '', '', '', 1, 28, 2, '2013-06-24 09:21:30', '2014-04-15 15:04:46'),
(18, 1, 'Contact Us', 'index.php?main_page=contact_us', '', '', '', 1, 23, 2, '2013-06-24 09:32:08', '2014-04-15 15:01:46'),
(19, 1, 'Shipping and Returns', 'index.php?main_page=shippinginfo', '', '', '', 1, 22, 2, '2013-06-24 09:32:33', '2014-04-15 15:01:33'),
(23, 1, 'My Account', 'index.php?main_page=account', '', '', '', 1, 25, 2, '2013-06-24 09:35:02', '2014-04-15 15:03:47'),
(25, 1, '', '', 'Share and Connect', '', '', 1, 4, 4, '2013-06-24 09:36:48', '2013-06-24 14:45:35'),
(26, 1, '', '', '', '', '<a href=\"https://www.facebook.com/Custom.Zen.Cart.Design\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a><a href=\"https://twitter.com/picaflorazul\" target=\"_blank\"><i class=\"fa fa-twitter\"></i></a><a href=\"http://www.pinterest.com/picaflorazul\" target=\"_blank\"><i class=\"fa fa-pinterest\"></i></a><a href=\"https://www.youtube.com/user/ZenCartEasyHelp\" target=\"_blank\"><i class=\"fa fa-youtube\"></i></a><a href=\"\" target=\"_blank\"><i class=\"fa fa-instagram\"></i></a>', 1, 41, 4, '2013-06-24 09:44:30', '2014-04-25 09:26:24');");

$db->Execute("SELECT @sortorder:=max(sort_order) FROM " . TABLE_ADMIN_PAGES . " ;");
$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key, language_key, main_page, page_params, menu_key, display_on_menu, sort_order) VALUES
('flexibleFooterMenu', 'BOX_TOOLS_FLEXIBLE_FOOTER_MENU', 'FILENAME_FLEXIBLE_FOOTER_MENU', '', 'tools', 'Y', @sortorder+1);");

// Column Layout Grid
$db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " where configuration_key IN ('PRODUCT_LISTING_LAYOUT_STYLE,PRODUCT_LISTING_COLUMNS_PER_ROW,PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER,PRODUCT_LISTING_GRID_SORT');");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, 
       configuration_description, configuration_group_id, sort_order, 
       last_modified, date_added, use_function, set_function) 
       VALUES ('Product Listing - Layout Style', 'PRODUCT_LISTING_LAYOUT_STYLE', 'rows', 
               'Select the layout style:<br />Each product can be listed in its own row (rows option)
                or products can be listed in multiple columns per row (columns option)<br />
				If customer control is enabled this sets the default style.', '8', '41', NULL, 
                now(), NULL, 'zen_cfg_select_option(array(\'rows\', \'columns\'),'),
               ('Product Listing - Columns Per Row', 'PRODUCT_LISTING_COLUMNS_PER_ROW', '3', 
               'Select the number of columns of products to show in each row in the product listing.  
               The default setting is 3.', '8', '42', NULL, now(), NULL, NULL),
               ('Product Listing - Layout Style - Customer Control', 'PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER', '0', 
               'Allow the customer to select the layout style (0=no, 1=yes):', '8', '43', NULL, 
                now(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),'),
               ('Product Listing - Show Sorter for Columns Layout', 'PRODUCT_LISTING_GRID_SORT', '0', 
               'Allow the customer to select the item sort order (0=no, 1=yes):', '8', '44', NULL, 
                now(), NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),');");
                
// Product Listing
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_FILTER' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 0 WHERE configuration_key = 'PRODUCT_LIST_PRICE_BUY_NOW' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'columns' WHERE configuration_key = 'PRODUCT_LISTING_LAYOUT_STYLE' LIMIT 1;");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'false' WHERE configuration_key = 'PRODUCT_LIST_ALPHA_SORTER' LIMIT 1;");

// Banners
$db->Execute("INSERT IGNORE INTO " . TABLE_BANNERS . " (banners_id, banners_title, banners_url, banners_image, banners_group, banners_html_text, expires_impressions, expires_date, date_scheduled, date_added, date_status_change, status, banners_open_new_windows, banners_on_ssl, banners_sort_order)
  VALUES 
('', 'Modern Responsive Design', 'http://www.picaflor-azul.com', 'banners/slide6.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Optimized for All Devices', 'http://www.picaflor-azul.com', 'banners/slide7.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Packed with Features', 'http://www.picaflor-azul.com', 'banners/slide14.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Extensive Documentation', 'http://www.picaflor-azul.com', 'banners/slide9.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Custom Tab', '', '', 'Custom Tab', '<div id=\"custom-tab-wrapper\"><img src=\"includes/templates/winchester_responsive/images/summer.png\" class=\"custom-tab-image\" alt=\"your alt text here\" /><div id=\"custom-tab-text\">You can add any content to this tab that you like.  If you want to add text and/images you can use the Admin--Tools--Banner Manager.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum feugiat ipsum vehicula sollicitudin. Integer sed lacus eget risus consectetur ullamcorper. Pellentesque rutrum ullamcorper faucibus. Nam porttitor iaculis enim, mattis tristique velit tristique bibendum. Aliquam porta nisl tortor, non luctus justo. Nam tincidunt dui vel mauris tincidunt posuere. Phasellus rhoncus elit et lorem sodales ullamcorper.</div><div class=\"clearBoth\"></div></div>', '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0'),
('', 'Manage Slide show via the Admin', 'http://www.picaflor-azul.com', 'banners/slide10.jpg', 'homepageslide', NULL, '0', NULL, NULL, '0001-01-01 00:00:00', NULL, '1', '1', '1', '0');");

#$db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = 0;");
$db->Execute("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '';");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_title, configuration_group_description, sort_order, visible) VALUES ('" . BOX_CONFIGURATION_WINCHESTER_RESPONSIVE. "', 'Set Winchester Responsive Template Options', '1', '1');");
$configuration_group_id = $db->Insert_ID();

$db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = " . $configuration_group_id . " WHERE configuration_group_id = " . $configuration_group_id . ";");

$db->Execute("INSERT IGNORE INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
            ('Version', 'WINCHESTER_RESPONSIVE_VERSION', '1.3', 'Version installed:', " . $configuration_group_id . ", 0, NOW(), NOW(), NULL, NULL),
	    ('Home Page Slideshow', 'WIN_SLIDER_STATUS', 'true', 'Activate Home Page Slideshow', " . $configuration_group_id . ", 1, NOW(), NOW(), 'zen_cfg_select_option(array(\'true\', \'false\'),', NULL),
	    ('Banner Display Groups Custom Tab', 'SHOW_BANNERS_GROUP_SETCUSTOMTAB', 'Custom Tab', 'Custom Tab for product info page', " . $configuration_group_id . ", 2, NOW(), NOW(), NULL, NULL),
	    ('EZ Pages in Header Menu', 'SHOW_EZ_PAGES_MENU', 'true', 'Shows the menu option for EZ pages/important links in the header menu', " . $configuration_group_id . ", 3, NOW(), NOW(),'zen_cfg_select_option(array(\'true\', \'false\'),', NULL);");


$messageStack->add('Installed Winchester Responsive Template v1.3', 'success');
