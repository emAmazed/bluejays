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
	
class modAccordionMenuLite {

	// get main menu item
	function getAllMenuItems($menutype, $parentlink) {
		global $Itemid;
		$db	= &JFactory::getDBO();
		$id = $Itemid;
		
		while (1) {
			$sql = "SELECT m1.id"
				." FROM #__menu AS m1"
				." INNER JOIN #__menu AS m2 ON (m1.id = m2.parent AND m2.id = '" . $id . "')"
				." WHERE m1.published = 1 ". $this->getaccess('m1')
				." ORDER BY m1.ordering";
				
			$db->setQuery($sql);
			$temp	= (int)$db->loadResult();
			if ($temp) {
				$id	= $temp;
			} else {
				break;
			}
		}
		
		$sql = "SELECT *"
			." FROM #__menu AS m"
			." WHERE m.menutype='".$menutype."' && m.parent = 0 AND m.published = 1 ". $this->getaccess('m')
			." ORDER BY m.ordering";
			
		$db->setQuery($sql);
		$rows	= $db->loadObjectList();
		$n		= count($rows);
		if ($n) {
			for ($i = 0; $i < $n; $i++) {
				$this->makecorrectlink($rows[$i]);
				$rows[$i]->subs		= $this->getSublevel($rows[$i]->id); //Get the first sublevel of main item i
				$rows[$i]->active	= ($rows[$i]->id == $id) ? 1 : 0;
				
				//If link is click
				$rows[$i]->haslink = count($rows[$i]->subs) ? 0 : 1;
				if ($parentlink) $rows[$i]->haslink = 1;
			}
		}
		return $rows;
	}
	
	function makecorrectlink(&$row) {
	switch ($row->type) {
		case 'separator' :
			break;

		case 'url' :
			if (eregi('index.php\?', $row->link)) {
				if (!eregi('Itemid=', $row->link)) {
					$row->link .= '&amp;Itemid='.$row->id;
				}
			}
			break;

		default :
			$row->link = 'index.php?Itemid='.$row->id;
			break;
	}
	}

	function getSublevel($id) {
		global $Itemid;
		$db	= &JFactory::getDBO();
		//Get menu level 2
		$sql = "SELECT *"
			." FROM #__menu AS m"
			." WHERE m.parent = '".$id."' AND m.published = 1 ". $this->getaccess('m')
			." ORDER BY m.ordering";
		$db->setQuery($sql);
		$rows = $db->loadObjectList();
		for ($i=0;$i<count($rows);$i++) {
			$this->makecorrectlink($rows[$i]);
			$rows[$i]->active = ($rows[$i]->id == $Itemid) ? 1 : 0;
		}
		return $rows;
	}

	function getaccess($prex) {
		$user	= &JFactory::getUser();
		if ($user->id) {
			$text = "";
		} else $text = " AND $prex.access = 0";
		return $text;
	}
}
?>