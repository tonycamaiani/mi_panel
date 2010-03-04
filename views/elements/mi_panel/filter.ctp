<?php
if (empty($filters)) {
	return;
}
?>
<div id="searchFilter">
	<h2><span><?php echo __d('mi_panel', 'Filter') ?></span></h2>
<?php
if (empty($filterMode)) {
	$filterMode = 'simple';
}
$_data = $form->data;
$form->data = $session->read($modelClass . '.filterForm');
echo $form->create();
foreach ($filters as $filter => $settings) {
	if (!is_array($settings)) {
		$filter = $settings;
		$settings = array();
	}
	$settings = am(array('filterOptions' => $filterOptions), $settings);
	if (!$filterOptions) {
		echo $form->input($filter, $settings);
		continue;
	}
	$select = '';
	if ($filterMode !== 'simple' && $settings['filterOptions']) {
		$selectOptions = am(array('empty' => true, 'div' => 'filter', 'label' => false, 'options' => $settings['filterOptions']));
		$select = $form->input($filter . '_type', $selectOptions);
	}
	unset($settings['filterOptions']);
	if (strpos($filter, 'date') || strpos($filter, 'expires') || in_array($filter, array('created', 'modified', 'deleted'))) {
		$inputOptions = am(array('type' => 'text', 'between' => $select), $settings);
	} elseif (preg_match('@_id$@', $filter)) {
		$inputOptions = am(array('options' => array('--autocomplete--' => true), 'between' => $select), $settings);
	} else {
		if ($filterMode === 'simple') {
			$inputOptions = am(array('between' => $select), $settings);
		} else {
			$inputOptions = am(array('between' => $select, 'multiple' => true), $settings);
		}
	}
	$input = $form->input($filter, $inputOptions);
	echo $input;
}
echo $form->end('apply filter');
$form->data = $_data;
?>
</div>