<?php
/**
 * Include this component in your app controller to use the layout css and js from this
 * plugin for your administration panel
 *
 * PHP versions 4 and 5
 *
 * Copyright (c) 2009, Javi Arques
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) 2009, Javi Arques
 * @link          www.tbd.com
 * @package       mi_panel
 * @subpackage    mi_panel.controllers.components
 * @since         v 1.0 (23-Nov-2009)
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * MiPanelComponent class
 *
 * @uses          Object
 * @package       mi_panel
 * @subpackage    mi_panel.controllers.components
 */
class MiPanelComponent extends Object {

/**
 * enabled property
 *
 * @var mixed null
 * @access public
 */
	var $enabled = null;

/**
 * initialize method
 *
 * @param mixed $Controller
 * @return void
 * @access public
 */
	function initialize($Controller) {
		$this->Controller =& $Controller;
		if (empty($Controller->params['admin'])) {
			return;
		}
		$this->setPanelPaths();
	}

/**
 * setPanelPaths method
 *
 * Manipulate the paths to add, as a last path, the paths to this plugin to the array of paths
 * cake will search for view files.
 *
 * If the class MiCache exists - delete the view path cache as otherwise the mi_panel view will
 * yield a missing layout/missing element error (because their path cannot be guarenteed to be
 * in the cached view paths)
 *
 * @param mixed $filters null
 * @return void
 * @access public
 */
	function setPanelPaths($filters = null) {
		$Inst = App::getInstance();
		$dir = dirname(dirname(dirname(__FILE__))) . DS . 'views' . DS;
		if (!in_array($dir, $Inst->views)) {
			$Inst->views[] = $dir;
			if (class_exists('MiCache')) {
				if ($language = MiCache::setting('Site.lang')) {
					Configure::write('Config.language', $language);
				}
				$plugin = (string)$this->Controller->plugin;
				$theme = 'default';
				// TODO temporary - clear the whole cache
				MiCache::clear();
				//MiCache::delete('Mi', 'paths', array('view', compact('plugin', 'theme')));
			}
		}
		$this->Controller->layout = 'mi_panel';
		if ($filters || ($filters === null && $this->Controller->action === 'admin_index')) {
			$this->Controller->set('filters', $this->Controller->{$this->Controller->modelClass}->searchFilterFields());
			$this->Controller->set('addFilter', true);
		}
	}
}