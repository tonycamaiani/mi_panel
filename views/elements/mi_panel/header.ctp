<div id='header' class="clearfix">
	<div id="headerContent">
		<?php echo $html->link(MiCache::setting('Site.name'), '/admin', array('id' => 'logo')) ?>
		<h2><span><?php echo $pageTitle ?></span></h2>
	</div>

	<div id='navcontainer'>
		<div id="hoverMenu">
		<?php echo $html->link('', '/',
			array('class' => 'mini-icon mini-extlink', 'target' => '_blank', 'title' => __('Public Site', true)) );
		   echo $html->link('', '/users/logout',
			array('class' => 'mini-icon mini-power', 'title' => __('Logout', true)) )?>
		</div>
	<?php
		$menu->settings(__('main', true), array('activeMode' => 'controller', 'id' => 'main-nav'));
		if (empty($menus)) {
			Configure::load('mi_panel');
			$menus = Configure::read('MiPanel.menu.top');
		}
		$controller = Inflector::underscore($this->name);
		if ($menus) {
			$whichOne = key($menus);
			foreach($menus as $section => $items) {
				if (in_array($this->name, $items) || in_array($this->name, array_values($items))) {
					$whichOne = $section;
					break;
				}
				foreach($items as $title => $params) {
					if (strpos($title, '[') !== 0 && is_array($params) && (
						(isset($params['url']) && $params['url']['controller'] === $controller) ||
						(!isset($params['url']) && $params['controller'] === $controller))
					) {
						$whichOne = $section;
						break (2);
					}
				}
			}
			$toAdd = array();
			foreach($menus[$whichOne] as $title => $params) {
				if (is_numeric($title)) {
					$title = Inflector::humanize($params);
					$url = array('controller' => Inflector::underscore($params), 'action' => 'index');
					$params = compact('title', 'url');
				} elseif (!is_array($params) || !isset($params['url'])) {
					$url = $params;
					$params = compact('url');
				}
				$params['title'] = $title;
				$params['url'] = am(array('plugin' => null), $params['url']);
				$toAdd[] = $params;
			}
			$menu->add($toAdd);
		} else {
			echo $this->element('mi_panel/menu/auto');
		}
		echo $menu->display();
	?></div>
</div>