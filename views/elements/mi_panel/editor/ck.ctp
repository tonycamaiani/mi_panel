<?php
if (!$process) {
	return;
}
$process = explode(',', $process);
foreach($process as &$id) {
	$id = trim($id, '# ');
	$id = "CKEDITOR.replace('$id');";
}
$asset->js('ckeditor/ckeditor', $this->name);
$asset->codeBlock(implode($process, "\r\n"), $this->name);