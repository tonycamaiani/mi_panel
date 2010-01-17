<?php
if (empty($editor)) {
	$editor = $session->read('Auth.UserProfile.editor');
	if (empty($editor) && $editor !== false) {
		$editor = Configure::read('Editor.default');
		if (empty($editor) && $editor !== false) {
			$editor = 'tiny';
		}
	}
}
if ($editor) {
	echo $this->element('mi_panel/editor/' . $editor, compact('process'));
}