<?php
/**
 * @version		$Id: $
 * @author		Nguyen Dinh Luan
 * @package		Joomla!
 * $subpackage	Accordion Menu Lite
 * @copyright	Copyright (C) 2008 - 2011 Joomseller Solutions. All rights reserved.
 * @license		GNU/GPL http://www.gnu.org/licenses/gpl-3.0.html, see LICENSE.txt
 * This file may not be redistributed in whole or significant part.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).DS.'helper.php');

$menutype 	= $params->def( 'menutype', 'mainmenu' );
$parentlink	= $params->def( 'parentlink', 1 );
$remind 	= $params->def( 'remind', 1 );

$rows	= new modAccordionMenuLite;

if ($menutype) {
	$menus		= $rows->getAllMenuItems($menutype, $parentlink);
}

//Get header
$document = &JFactory::getDocument();
$document->addScript('modules/mod_accordionmenu_lite/lib/js/yahoo_2.0.0-b2.js');
$document->addScript('modules/mod_accordionmenu_lite/lib/js/event_2.0.0-b2.js');
$document->addScript('modules/mod_accordionmenu_lite/lib/js/dom_2.0.2-b3.js');
$document->addScript('modules/mod_accordionmenu_lite/lib/js/animation_2.0.0-b3.js');
$document->addScript('modules/mod_accordionmenu_lite/lib/js/accordion-menu-v2.js');
$document->addStyleSheet('modules/mod_accordionmenu_lite/lib/css/accordion-menu-v2.css');

require(JModuleHelper::getLayoutPath('mod_accordionmenu_lite'));
