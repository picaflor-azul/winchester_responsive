<?php
/**
 * tpl_main_page.php
 *
 * Governs the overall layout of an entire page<br />
 * Normally consisting of a header, left side column. center column. right side column and footer<br />
 * For customizing, this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * - make a directory /templates/my_template/privacy<br />
 * - copy /templates/templates_defaults/common/tpl_main_page.php to /templates/my_template/privacy/tpl_main_page.php<br />
 * <br />
 * to override the global settings and turn off columns un-comment the lines below for the correct column to turn off<br />
 * to turn off the header and/or footer uncomment the lines below<br />
 * Note: header can be disabled in the tpl_header.php<br />
 * Note: footer can be disabled in the tpl_footer.php<br />
 * <br />
 * $flag_disable_header = true;<br />
 * $flag_disable_left = true;<br />
 * $flag_disable_right = true;<br />
 * $flag_disable_footer = true;<br />
 * <br />
 * // example to not display right column on main page when Always Show Categories is OFF<br />
 * <br />
 * if ($current_page_base == 'index' and $cPath == '') {<br />
 *  $flag_disable_right = true;<br />
 * }<br />
 * <br />
 * example to not display right column on main page when Always Show Categories is ON and set to categories_id 3<br />
 * <br />
 * if ($current_page_base == 'index' and $cPath == '' or $cPath == '3') {<br />
 *  $flag_disable_right = true;<br />
 * }<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_main_page.php 7085 2007-09-22 04:56:31Z ajeh $
 * Altered by rbarbour (ZCAdditions.com), Responsive DIY Template Default for 1.5.x (65)
 * Modified by Anne (Picaflor-Azul.com) Winchester Respnsive v1.0
 */

// the following IF statement can be duplicated/modified as needed to set additional flags
  if (in_array($current_page_base,explode(",",'shopping_cart')) ) {
    $flag_disable_right = true;
  }

  if (in_array($current_page_base,explode(",",'login')) ) {
    $flag_disable_right = true;
    $flag_disable_left = true;
  }

if ($this_is_home_page) {
  $flag_disable_right = true;
  $flag_disable_left = true;
}



// (BOF - 2.1) Responsive DIY Template Default for 1.5.x (65)
if ($flag_disable_right or COLUMN_RIGHT_STATUS == '0') {
$box_width_right = preg_replace('/[^0-9]/', '', '0'); 
$box_width_right_new = '';
}else{
$box_width_right = COLUMN_WIDTH_RIGHT;
$box_width_right = preg_replace('/[^0-9]/', '', $box_width_right); 
$box_width_right_new = 'col' . $box_width_right;
}

if ($flag_disable_left or COLUMN_LEFT_STATUS == '0') {
$box_width_left = preg_replace('/[^0-9]/', '', '0'); 
$box_width_left_new = '';
}else{
$box_width_left = COLUMN_WIDTH_LEFT;
$box_width_left = preg_replace('/[^0-9]/', '', $box_width_left); 
$box_width_left_new = 'col' . $box_width_left;
}

$side_columns_total = $box_width_left + $box_width_right;
$center_column = '970'; // This value should not be altered
$center_column_width = $center_column - $side_columns_total;
// (EOF - 2.1) Responsive DIY Template Default for 1.5.x (65)

  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = ($this_is_home_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);
?>
<body id="<?php echo $body_id . 'Body'; ?>"<?php if($zv_onload !='') echo ' onload="'.$zv_onload.'"'; ?>>

<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/back_to_top.min.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
BackToTop({
text : '<?php echo BACK_TO_TOP; ?>',
autoShow : true,
timeEffect : 750
});
});
</script> 

<?php
  if (SHOW_BANNERS_GROUP_SET1 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET1)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerOne" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>





<!--(BOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
<?php if (COLUMN_WIDTH == '0'){ ?>
<!--(EOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
<div id="mainWrapper">

<?php
 /**
  * prepares and displays header output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_header = true;
  }
  require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" id="contentMainWrapper">
  <tr>
<?php
if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
  // global disable of column_left
  $flag_disable_left = true;
}
if (!isset($flag_disable_left) || !$flag_disable_left) {
?>

 <td id="navColumnOne" class="columnLeft" style="width: <?php echo COLUMN_WIDTH_LEFT; ?>">
<?php
 /**
  * prepares and displays left column sideboxes
  *
  */
?>
<div id="navColumnOneWrapper" style="width: <?php echo BOX_WIDTH_LEFT; ?>"><?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?></div></td>
<?php
}
?>
<td valign="top">

<!--(BOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
<?php }else{ ?>
<?php
 /**
  * prepares and displays header output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_header = true;
  }


	if ($detect->isMobile() && !$detect->isTablet() or $detect->isMobile() && !$detect->isTablet() && $_SESSION['display_mode']=='isMobile' or $detect->isTablet() && $_SESSION['display_mode']=='isMobile' or $_SESSION['display_mode']=='isMobile') {

    	require($template->get_template_dir('tpl_header_mobile.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header_mobile.php');

} else if ($detect->isTablet() or $detect->isMobile() && $_SESSION['display_mode']=='isTablet' or $detect->isTablet() && $_SESSION['display_mode']=='isTablet' or $_SESSION['display_mode']=='isTablet'){

	require($template->get_template_dir('tpl_header_tablet.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header_tablet.php');

} else if ($detect->isMobile() && !$detect->isTablet() && $_SESSION['display_mode']=='isDesktop' or $detect->isTablet() && $_SESSION['display_mode']=='isDesktop' or $_SESSION['display_mode']=='isNonResponsive'){

	require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');

} else {

	require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');

  }  

?>



<div class="onerow-fluid <?php echo $fluidisFixed; ?>">

<?php
if (COLUMN_LEFT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_LEFT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
  // global disable of column_left
  $flag_disable_left = true;
}
if (!isset($flag_disable_left) || !$flag_disable_left) {
?>

<div class="<?php echo $box_width_left_new; ?>">

<?php
 /**
  * prepares and displays left column sideboxes
  *
  */
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?>
</div>

<?php
}
?>

<?php
 /**
  * decide center column width
  *
  */
 ?>

<div class="<?php echo 'col' . $center_column_width; ?>">

  <?php } ?>

<!--(EOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->

<!-- bof  breadcrumb -->
<?php if (DEFINE_BREADCRUMB_STATUS == '1' || (DEFINE_BREADCRUMB_STATUS == '2' && !$this_is_home_page) ) { ?>
    <div id="navBreadCrumb"><?php echo $breadcrumb->trail(BREAD_CRUMBS_SEPARATOR); ?></div>
<?php } ?>
<!-- eof breadcrumb -->

<?php
  if (SHOW_BANNERS_GROUP_SET3 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET3)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerThree" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>

<!-- bof upload alerts -->
<?php if ($messageStack->size('upload') > 0) echo $messageStack->output('upload'); ?>
<!-- eof upload alerts -->

<?php
 /**
  * prepares and displays center column
  *
  */
 require($body_code); ?>

<?php
  if (SHOW_BANNERS_GROUP_SET4 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET4)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerFour" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>

<!--(BOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
<?php if (COLUMN_WIDTH == '0'){ ?>
<!--(EOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
</td>

<?php
//if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' && $_SESSION['customers_authorization'] != 0)) {
if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
  // global disable of column_right
  $flag_disable_right = true;
}
if (!isset($flag_disable_right) || !$flag_disable_right) {
?>
<td id="navColumnTwo" class="columnRight" style="width: <?php echo COLUMN_WIDTH_RIGHT; ?>">
<?php
 /**
  * prepares and displays right column sideboxes
  *
  */
?>
<div id="navColumnTwoWrapper" style="width: <?php echo BOX_WIDTH_RIGHT; ?>"><?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?></div></td>
<?php
}
?>
  </tr>
</table>
<!--(BOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
<?php }else{ ?>
<br class="clearBoth" /> 
<br class="clearBoth" />
</div>


<?php
//if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' && $_SESSION['customers_authorization'] != 0)) {
if (COLUMN_RIGHT_STATUS == 0 || (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '') || (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_COLUMN_RIGHT_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == ''))) {
  // global disable of column_right
  $flag_disable_right = true;
}
if (!isset($flag_disable_right) || !$flag_disable_right) {
?>

<div class="<?php echo $box_width_right_new; ?>">

<?php
 /**
  * prepares and displays right column sideboxes
  *
  */
?>

<?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?>
</div>
<?php
}
?>
</div>
<?php } ?>
<!--(EOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->

<?php
 /**
  * prepares and displays footer output
  *
  */
  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
    $flag_disable_footer = true;
  }

	require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
?>

<!--bof- parse time display -->
<?php
  if (DISPLAY_PAGE_PARSE_TIME == 'true') {
?>
<div class="smallText center">Parse Time: <?php echo $parse_time; ?> - Number of Queries: <?php echo $db->queryCount(); ?> - Query Time: <?php echo $db->queryTime(); ?></div>
<?php
  }
?>
<!--eof- parse time display -->
<!--bof- banner #6 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET6 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET6)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerSix" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof- banner #6 display -->
<!--(BOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->
<?php if (COLUMN_WIDTH == '0'){ ?>
</div><!--eof-->
<br class="clearBoth">
<?php }else{ ?>
<?php //do nothing ?>
<?php } ?>
<!--(EOF - 2.1) Responsive DIY Template Default for 1.5.x (65)-->

<script src="<?php echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/jquery.tabSlideOut.v1.3.js' ?>" type="text/javascript"></script>

    <script type="text/javascript">
    $(function(){
        $('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     //class of the element that will become your tab
            pathToTabImage: 'includes/templates/winchester_responsive/images/tab.png', //path to the image for the tab //Optionally can be set using css
            imageHeight: '50px',                     //height of tab image           //Optionally can be set using css
            imageWidth: '60px',                       //width of tab image            //Optionally can be set using css
	    tabLocation: 'left',                      //side of screen where tab lives, top, right, bottom, or left
            speed: 300,                               //speed of animation
            action: 'click',                          //options: 'click' or 'hover', action to trigger animation
            topPos: '100px',                          //position from the top/ use if tabLocation is left or right
            leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top
            fixedPosition: true                      //options: true makes it stick(fixed position) on scroll
        });

    });

    </script>

   <div class="slide-out-div">
    <a class="handle" href="http://link-for-non-js-users.html">Content</a>
<?php echo SLIDE_OUT_CONTENT; ?>
         </div>
        
</body>
