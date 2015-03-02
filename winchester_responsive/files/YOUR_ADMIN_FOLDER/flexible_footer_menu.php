<?php
/** Flexible Footer Menu
 * @package admin
 * @copyright Copyright 2003-2009 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @updated for Flexible Footer Menu v1.0 4/17/2013 ZCadditions.com (Raymond A. Barbour) $
 */

  require('includes/application_top.php');
  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  if (zen_not_null($action)) {
    switch ($action) {
      case 'setflag':
        if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
          zen_set_flexible_footer_menu_status($_GET['bID'], $_GET['flag']);
          $messageStack->add_session(SUCCESS_PAGE_STATUS_UPDATED, 'success');
        } else {
          $messageStack->add_session(ERROR_UNKNOWN_STATUS_FLAG, 'error');
        }
        zen_redirect(zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']));
        break;
      case 'insert':
      case 'update':
        if (isset($_POST['page_id'])) 
$page_id = zen_db_prepare_input($_POST['page_id']);
$page_title = zen_db_prepare_input($_POST['page_title']);
$page_url = zen_db_prepare_input($_POST['page_url']);
$col_header = zen_db_prepare_input($_POST['col_header']);
$col_id = zen_db_prepare_input($_POST['col_id']);
$col_sort_order = zen_db_prepare_input($_POST['col_sort_order']);
$page_date = (empty($_POST['date_added']) ? zen_db_prepare_input('0001-01-01 00:00:00') : zen_db_prepare_input($_POST['date_added']));
$col_html_text = zen_db_prepare_input($_POST['col_html_text']);

        $page_error = false;
        if (empty($col_sort_order)) {
          $messageStack->add('Please add a Sort Order value', 'error');
          $page_error = true;
        }

if ($page_error == false) {
$language_id = (int)$_SESSION['languages_id'];
$sql_data_array = array(
'language_id' => $language_id,
'page_title' => $page_title,
'page_url' => $page_url,
'col_header' => $col_header,
'col_id' => $col_id,
'col_sort_order' => $col_sort_order,
'col_html_text' => $col_html_text);

          if ($action == 'insert') {
		if (empty($_POST['date_added'])) {
		$page_date = 'now()';
		} else {
		$page_date = zen_date_raw($_POST['date_added']);
		}

            $insert_sql_data = array('status' => '1', 'date_added' => $page_date);
            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);
            zen_db_perform(TABLE_FLEXIBLE_FOOTER_MENU, $sql_data_array);	
            $page_id = zen_db_insert_id();
          } elseif ($action == 'update') {
            $insert_sql_data = array('status' => '1', 'last_update' => 'now()');
            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);
            zen_db_perform(TABLE_FLEXIBLE_FOOTER_MENU, $sql_data_array, 'update', "page_id = '" . (int)$page_id . "'");
          }
 
 
 
 if ($col_image = new upload('col_image')) {
          $col_image->set_destination(DIR_FS_CATALOG_IMAGES . 'footer_images/');
          if ($col_image->parse() && $col_image->save()) {
            $col_image_name = 'footer_images/' . $col_image->filename;
          }
          if ($col_image->filename != 'none' && $col_image->filename != '') {
            $db->Execute("update " . TABLE_FLEXIBLE_FOOTER_MENU . "
                          set col_image = '" . $col_image_name . "'
                          where page_id = '" . (int)$page_id . "'");
          } else {

            if ($col_image->filename == 'none' || $_POST['image_delete'] == 1) {
//		  if ($col_image->filename == 'none') {
              $db->Execute("update " . TABLE_FLEXIBLE_FOOTER_MENU . "
                            set col_image = ''
                            where page_id = '" . (int)$page_id . "'");
            }
          }
}
 
 
 
          zen_redirect(zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'bID=' . $page_id));
        } else {
          $action = 'new';
        }
        break;
      case 'deleteconfirm':
        $page_id = zen_db_prepare_input($_GET['bID']);
        $db->Execute("delete from " . TABLE_FLEXIBLE_FOOTER_MENU . " where page_id = '" . (int)$page_id . "'");

        zen_redirect(zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page']));
        break;
    }
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script type="text/javascript" src="includes/menu.js"></script>
<script type="text/javascript" src="includes/general.js"></script>
<script type="text/javascript">
  <!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
  if (typeof _editor_url == "string") HTMLArea.replaceAll();
  }
  // -->
</script>
</head>
<body onLoad="init()">
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
<?php
  if ($action == 'new') {
    $form_action = 'insert';

    $parameters = array(
'language_id' => '',
'page_title' => '',
'page_url' => '',    
'col_header' => '',
'col_image' => '',
'col_html_text' => '',
'col_id' => '',
'col_sort_order' => '',
'date_added' => '',
'status' =>'');

    $bInfo = new objectInfo($parameters);

    if (isset($_GET['bID'])) {
      $form_action = 'update';

      $bID = zen_db_prepare_input($_GET['bID']);

      $page_query = "select * from " . TABLE_FLEXIBLE_FOOTER_MENU . " where page_id = '" . $_GET['bID'] . "'";
      $page = $db->Execute($page_query);
      $bInfo->objectInfo($page->fields);
    } elseif (zen_not_null($_POST)) {
      $bInfo->objectInfo($_POST);
    }
?>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo zen_draw_form('new_page', FILENAME_FLEXIBLE_FOOTER_MENU, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'action=' . $form_action, 'post', 'enctype="multipart/form-data"'); if ($form_action == 'update') echo zen_draw_hidden_field('page_id', $bID); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">

<tr>
<td class="main"><?php echo TEXT_COLUMN_HEADER; ?></td>
<td class="main"><?php echo zen_draw_input_field('col_header', $bInfo->col_header, '', false); ?><br /><?php echo TEXT_COLUMN_HEADER_TIP; ?></td>
</tr>

<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>

<tr>
<td class="main"><?php echo TEXT_PAGES_NAME; ?></td>
<td class="main"><?php echo zen_draw_input_field('page_title', $bInfo->page_title, '', false); ?><br /><?php echo TEXT_PAGES_NAME_TIP; ?></td>
</tr>

<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>

<?php if (($bInfo->col_image) != ('')) { ?>
<tr>
<td valign="top" class="main"><?php echo TEXT_HAS_IMAGE; ?></td>
<td class="main"><?php echo $bInfo->col_image; ?></td>
</tr>
<?php } ?> 
<tr>
<td valign="top" class="main"><?php echo TEXT_USE_IMAGE; ?></td>
<td class="main"><?php echo zen_draw_file_field('col_image'); ?><br /><?php echo TEXT_USE_IMAGE_TIP; ?></td>
</tr>

<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>

<tr>
<td class="main"><?php echo TEXT_DELETE_IMAGE; ?></td>
<td class="main"><?php echo zen_draw_radio_field('image_delete', '0', 'checked="checked"', $off_image_delete) . TEXT_DELETE_IMAGE_NO . ' ' . zen_draw_radio_field('image_delete', '1', $on_image_delete) . TEXT_DELETE_IMAGE_YES; ?></td>
</tr>

<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>

<?php if ($form_action == 'insert') { ?>
<?php zen_draw_input_field('date_added', zen_date_short($bInfo->date_added), '', false); ?>
<?php } ?>

<tr>
<td class="main"><?php echo TEXT_LINKAGE; ?></td>			
<td class="main"><?php echo zen_draw_input_field('page_url', zen_not_null($bInfo->page_url) ? $bInfo->page_url : '', 'maxlength="255"', false); ?><br /><?php echo TEXT_LINKAGE_TIP; ?></td>		
</tr>

<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>

<tr>
<td valign="top" class="main"><?php echo TEXT_ADD_TEXT; ?></td>
<td class="main"><?php echo zen_draw_textarea_field('col_html_text', 'soft', '60', '10', $bInfo->col_html_text, '', false); ?><br /><?php echo TEXT_ADD_TEXT_TIP; ?></td>
</tr>
		  
<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>
<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>
<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>
		  
<tr>
<td class="main"><?php echo TEXT_COLUMN; ?></td>
<td class="main"><?php echo zen_draw_input_field('col_id', $bInfo->col_id, '', false); ?><?php echo TEXT_COLUMN_TIP; ?></td>
</tr>
		  
<tr><td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>

<tr>
<td class="main"><?php echo TEXT_COLUMN_SORT; ?></td>
<td class="main"><?php echo zen_draw_input_field('col_sort_order', $bInfo->col_sort_order, '', false); ?><br /><?php echo TEXT_COLUMN_SORT_TIP; ?></td>
</tr>


        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td colspan="2" class="main" align="left" valign="top" nowrap><?php echo (($form_action == 'insert') ? zen_image_submit('button_insert.gif', IMAGE_INSERT) : zen_image_submit('button_update.gif', IMAGE_UPDATE)). '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . (isset($_GET['bID']) ? 'bID=' . $_GET['bID'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
          </tr>
        </table></td>
      </form></tr>
<?php
  } else {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow" width="100%">
<td class="dataTableHeadingContent"><?php echo 'Header / Sub-Header or Image'; ?></td>
<td class="dataTableHeadingContent"><?php echo TABLE_COLUMN_ID; ?></td>
<td class="dataTableHeadingContent"><?php echo TABLE_SORT_ORDER; ?></td>
<td class="dataTableHeadingContent" align="center"><?php echo TABLE_STATUS; ?></td>
                <td class="dataTableHeadingContent"></td>
                <td class="dataTableHeadingContent"></td>
              </tr>

<?php
    $flexfooter_query_raw = "select page_id, language_id, col_image, page_title, col_header, col_html_text, status, date_added, last_update, col_sort_order, col_id from " . TABLE_FLEXIBLE_FOOTER_MENU . " order by col_id ASC, col_sort_order";

    $flexfooter = $db->Execute($flexfooter_query_raw);

while (!$flexfooter->EOF) {
     if ((!isset($_GET['bID']) || (isset($_GET['bID']) && ($_GET['bID'] == $flexfooter->fields['page_id']))) && !isset($bInfo) && (substr($action, 0, 3) != 'new')) {
        $bInfo_array = array_merge($flexfooter->fields);
        $bInfo = new objectInfo($bInfo_array);
      }
      if (isset($bInfo) && is_object($bInfo) && ($flexfooter->fields['page_id'] == $bInfo->page_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $flexfooter->fields['page_id']) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'flexfooter=' . $_GET['page'] . '&bID=' . $flexfooter->fields['page_id']) . '\'">' . "\n";
      }
?>
<td class="dataTableContent"><?php echo $flexfooter->fields['page_title'] . $flexfooter->fields['col_header'] . zen_image(DIR_WS_CATALOG_IMAGES . $flexfooter->fields['col_image']); ?></td>
<td class="dataTableContent"><?php echo $flexfooter->fields['col_id']; ?></td>
<td class="dataTableContent"><?php echo $flexfooter->fields['col_sort_order']; ?></td>


                <td class="dataTableContent" align="center">
<?php
      if ($flexfooter->fields['status'] == '1') {
        echo zen_image(DIR_WS_IMAGES . 'icon_status_green.gif', ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $flexfooter->fields['page_id'] . '&action=setflag&flag=0') . '">' . zen_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', ICON_STATUS_RED, 10, 10) . '</a>';
      } else {
        echo '<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $flexfooter->fields['page_id'] . '&action=setflag&flag=1') . '">' . zen_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', ICON_STATUS_GREEN, 10, 10) . '</a>&nbsp;&nbsp;' . zen_image(DIR_WS_IMAGES . 'icon_status_red.gif', ICON_STATUS_RED, 10, 10);
      }
?></td>
                <td class="dataTableContent" align="right"><?php if (isset($bInfo) && is_object($bInfo) && ($flexfooter->fields['page_id'] == $bInfo->page_id)) { echo zen_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, zen_get_all_get_params(array('bID')) . 'bID=' . $flexfooter->fields['page_id']) . '">' . zen_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
                <td class="dataTableContent" align="right"></td>
              </tr>
<?php

 $flexfooter->MoveNext();
    }
?>

              <tr>
                <td colspan="5"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'action=new') . '">' . 
zen_image(DIR_WS_IMAGES . 'button_new_columnpage.gif', BUTTON_NEW) . '</a>'; ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
if ($bInfo->status == 0) {
$teststatus = ICON_STATUS_RED;
} else {
$teststatus = ICON_STATUS_GREEN;
}
  $heading = array();
  $contents = array();
  switch ($action) {
    case 'delete':
      $heading[] = array('text' => '<b>' . $bInfo->col_header . $bInfo->page_title . '</b>');

      $contents = array('form' => zen_draw_form('testimonials', FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $bInfo->page_id . '&action=deleteconfirm'));
      $contents[] = array('text' => 'Delete');
      $contents[] = array('text' => '<br /><b>' . $bInfo->page_title . '</b>');
      if ($bInfo->col_image) $contents[] = array('text' => '<br />' . zen_draw_checkbox_field('delete_image', 'on', true) . ' ' . 'Delete Image?');
      $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_delete.gif', IMAGE_DELETE) . '&nbsp;<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (is_object($bInfo)) {
	  
        $heading[] = array('text' => '<b>' . $bInfo->col_header . $bInfo->page_title . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $bInfo->page_id . '&action=new') . '">' . zen_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . zen_href_link(FILENAME_FLEXIBLE_FOOTER_MENU, 'page=' . $_GET['page'] . '&bID=' . $bInfo->page_id . '&action=delete') . '">' . zen_image_button('button_delete.gif', IMAGE_DELETE) . '</a><br /><br /><br />');

$contents[] = array('text' => '<br />' . BOX_INFO_STATUS . ' '  . $teststatus);

		if (zen_not_null($bInfo->col_image)) {
$contents[] = array('text' => '<br />' . zen_image(DIR_WS_CATALOG_IMAGES . $bInfo->col_image, $bInfo->page_title) . '<br />' . $bInfo->page_title);
		} else {
$contents[] = array('text' => '<br />' . BOX_INFO_NO_IMAGE);
		}

$contents[] = array('text' => '<br />' . BOX_INFO_TEXT . '<br /> ' . $bInfo->col_html_text);

      }
      break;
  }

  if ( (zen_not_null($heading)) && (zen_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>