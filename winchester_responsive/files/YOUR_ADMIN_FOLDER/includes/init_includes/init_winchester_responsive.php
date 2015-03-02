<?php
if (!defined('IS_ADMIN_FLAG'))
{
	die('Illegal Access');
}

// check that Winchester Responsive is enabled
$template_select = $db->Execute("SELECT * FROM " . TABLE_TEMPLATE_SELECT . " WHERE template_dir = 'winchester_responsive' LIMIT 1;");
if ($template_select->RecordCount() > 0) {
  // add upgrade script
  $winchester_responsive_version = (defined('WINCHESTER_RESPONSIVE_VERSION') ? WINCHESTER_RESPONSIVE_VERSION : 'new');
  $current_version = '1.0';
  while ($winchester_responsive_version != $current_version)
  {
	  switch ($winchester_responsive_version)
	  {
		  case 'new':
			  // perform upgrade
			  if (file_exists(DIR_WS_INCLUDES . 'installers/winchester_responsive/1_0.php'))
			  {
				  include_once(DIR_WS_INCLUDES . 'installers/winchester_responsive/1_0.php');
				  $winchester_responsive_version = '1.0';
				  break;
			  }
			  else
			  {
				  break 2;
			  }
		  case '1.0':
			  // perform upgrade
			  if (file_exists(DIR_WS_INCLUDES . 'installers/winchester_responsive/1_1.php'))
			  {
				  include_once(DIR_WS_INCLUDES . 'installers/winchester_responsive/1_1.php');
				  $winchester_responsive_version = '1.1';
				  break;
			  }
			  else
			  {
				  break 2;
			  }
		  default:
			  $winchester_responsive_version = $current_version;
			  // break all the loops
			  break 2;
	  }
  }
  $zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
  if ($zc150) // continue Zen Cart 1.5.0
  {
	  // add configuration menu
	  if (!zen_page_key_exists('configWinchester_Responsive'))
	  {
		  $configuration          = $db->Execute("SELECT configuration_group_id FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'WINCHESTER_RESPONSIVE_VERSION' LIMIT 1;");
		  $configuration_group_id = $configuration->fields['configuration_group_id'];
		  if ((int) $configuration_group_id > 0)
		  {
			  zen_register_admin_page('configWinchester_Responsive', 'BOX_CONFIGURATION_WINCHESTER_RESPONSIVE', 'FILENAME_CONFIGURATION', 'gID=' . $configuration_group_id, 'configuration', 'Y', $configuration_group_id);
			  
			  $messageStack->add('Added to Configuration menu.', 'success');
		  }
	  }
	  // add the template configuration page
  }
}