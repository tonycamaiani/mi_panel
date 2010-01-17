<?php
$section = isset($section)?$section:__('main', true);
$menu->settings($section);

$menus = Configure::listObjects('controller');
$ignore = array('App', 'Tree', 'List', 'Pages', 'Lookup');
$menus = array_diff($menus, $ignore);
sort($menus);
$plugins = Mi::plugins();
foreach($plugins as $path => $plugin) {
	if (!file_exists($path . DS . $plugin . '_app_controller.php')) {
		continue;
	}
	if (!file_exists($path . DS . 'controllers' . DS . $plugin . '_controller.php')) {
		continue;
	}
	$menus[$plugin] = $plugin;
}
$menus = array_chunk($menus, 10, true);
$whichOne = key($menus);
foreach($menus as $section => $items) {
	if (in_array($this->name, $items) || in_array($this->name, array_values($items))) {
		$whichOne = $section;
		break;
	}
	foreach($items as $title => $params) {
		if (strpos($title, '[') !== 0 && is_array($params) && (isset($params['url']) && $params['url']['controller'] === $controller)) {
			$whichOne = $section;
			break (2);
		}
	}
}
if (count($menus) > 1) {
	if ($whichOne !== 0) {
		$plugin = end($menus[$whichOne - 1]);
		$controller = key($menus[$whichOne - 1]);
		$menus[$whichOne]['[ « ]'] = compact('controller', 'plugin');
	}
	if ($whichOne < (count($menus) -1)) {
		$plugin = reset($menus[$whichOne + 1]);
		$controller = key($menus[$whichOne + 1]);
		$menus[$whichOne]['[ » ]'] = compact('controller', 'plugin');;
	}
}
foreach($menus[$whichOne] as $controller => $plugin) {
	$title = null;
	if (is_array($plugin)) {
		$title = $controller;
		extract($plugin);
	}
	if (is_numeric($controller)) {
		$controller = $plugin;
		$plugin = null;
	}
	$controller = Inflector::underscore($controller);
	if (!$title) {
		$title = Inflector::humanize($controller);
	}
	$menu->add(array(
		'title' => __($title, true),
		'url' => array('plugin' => $plugin, 'controller' => $controller, 'action' => 'index'),
	));
}