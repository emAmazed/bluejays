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
?>
<!-- BEGIN ACCORDION MENU -->
<dl class="accordion-menu">
	<?php
	foreach ($menus as $menu) {
		$link = ($menu->haslink)? ('<a href="'.$menu->link.'">'.$menu->name.'</a>'):($menu->name);
		if ($remind) {
			$active = $menu->active?" active a-m-t-expand":"";
			$subactive = $menu->active?" a-m-d-expand":"";
		} else {
			$active = $menu->active?" active":"";
			$subactive = "";
		}
		if (count($menu->subs)) { ?>
		<dt class="a-m-t<?php echo $active; ?>"><?php echo $link; ?></dt>
		<dd class="a-m-d <?php echo $subactive; ?>">
			<div class="bd">
				<ul class="ojaccordionmenu_yaho">
				<?php foreach ($menu->subs as $sub) {
					$active = $sub->active?"sub_active":"";
				?>
					<li class="oj-accord_li">
						<a class="<?php echo $active; ?>" href="<?php echo $sub->link;?>"><?php echo $sub->name; ?></a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</dd>
		<?php
		} else {
			?>
			<li class="a-m-t<?php echo $active; ?>"><?php echo $link; ?></li>
			<?php
		}
	} 
?>
</dl>
<!-- BEGIN ACCORDION MENU -->