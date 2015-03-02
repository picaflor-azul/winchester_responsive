<?php
//Flexible Footer Menu
//english defines
//Added by rbarbour (ZCAdditions.com), Flexible Footer Menu 1.1 (3)

define('TEXT_FLEXIBLE_FOOTER_MENU_HEADING_TITLE','Flexible Footer Menu');
define('BOX_TOOLS_FLEXIBLE_FOOTER_MENU','Flexible Footer Menu');
define('FILENAME_FLEXIBLE_FOOTER_MENU','flexible_footer_menu.php');
define('TABLE_FLEXIBLE_FOOTER_MENU', DB_PREFIX . 'flexible_footer_menu');
define('HEADING_TITLE','Flexible Footer Menu');

//Main Page Plugin Defines
define('TABLE_HEADER_NAME','Header Name');
define('TABLE_PAGE_NAME','Page Name');
define('TABLE_COLUMN_ID','Column');
define('TABLE_SORT_ORDER','Sort Order');
define('TABLE_STATUS','Status');
define('ICON_STATUS_GREEN','Displaying on Footer Menu');
define('ICON_STATUS_RED','Not Displaying on Footer Menu');
define('BUTTON_NEW','Add a new Column Page');
define('BOX_INFO_STATUS','<strong>Page Status:&nbsp;</strong>');
define('BOX_INFO_NO_IMAGE','<strong><font color="red">No Image Uploaded</font></strong>');
define('BOX_INFO_TEXT','<strong>Column Text/Comments:&nbsp;</strong>');
define('SUCCESS_PAGE_STATUS_UPDATED','Flexible Footer Menu Status Updated!');

//New-Update Page Plugin Defines
define('TEXT_COLUMN_HEADER','Column Header/Sub Header:');
define('TEXT_COLUMN_HEADER_TIP','(Option 1) Displays Column Header/Sub Header Text.');
define('TEXT_PAGES_NAME','Page Name:');
define('TEXT_PAGES_NAME_TIP','(Option 2) Displays Pages Name Text.');
define('TEXT_HAS_IMAGE','Current Associated Image:');
define('TEXT_USE_IMAGE','Upload Image:');
define('TEXT_USE_IMAGE_TIP','(Option 3) Use an Image to Display Column Header/Sub Header or Page Name instead of Text.');
define('TEXT_DELETE_IMAGE','Delete Current Image:');
define('TEXT_DELETE_IMAGE_NO','&nbsp;No');
define('TEXT_DELETE_IMAGE_YES','&nbsp;Yes');
define('TEXT_LINKAGE','Add a Link:');
define('TEXT_LINKAGE_TIP','Add a Link URL to the Column Header/Sub Header, Page Name or Image.<br />INTERNAL link URL Example: index.php?main_page=reviews<br/>EXTERNAL link URL Example: http://www.zcadditions.com <b>(http://)</b> strips INTERNAL link URL and auto opens in new tab/window.');
define('TEXT_ADD_TEXT','Column Text/Comments:');
define('TEXT_ADD_TEXT_TIP','Add Text or Comment below Column Header/Sub Header or Page Name.<br />To add above Column Header/Sub Header or Page Name just add to the sort_order 1 less than this one.<br />You can even just enter your Text or Comment and give it it\'s own sort_order.');
define('TEXT_COLUMN','Column:');
define('TEXT_COLUMN_TIP','(Optional) I use this ONLY to group your columns on the Main Page of this plugin for ease of updating and setting sort_order. Plan for this in upcoming versions!');
define('TEXT_COLUMN_SORT','Sort Order:');
define('TEXT_COLUMN_SORT_TIP','<b>!imortant</b> Sort order must be greater than 0<br />The first list item sort order value for Column 1 should be 1, Column 2 should be 2<br />Ever list item after that should be <b>1</b>1, <b>1</b>2, <b>1</b>3 or <b>2</b>1, <b>2</b>2, <b>2</b>3 upto <b>1</b>9<br />To add more than 9 list items per column double up <b>1</b>, <b>1</b>1, <b>1</b>11, <b>1</b>111,  <b>1</b>2, <b>1</b>22, <b>1</b>222');












?>