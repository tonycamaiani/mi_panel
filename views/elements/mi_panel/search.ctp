<div id='search'>
	<h2><span>Buscar</span></h2>
	<?php echo $form->create(null, array('action'=> 'search', 'id' => 'search')) ?>
	<p><?php echo $form->text('query') ?></p>
	<p><button type="button" onclick="$('search').submit()"><span><?php __('Search', true) ?></span></button></p>
<?php echo $form->submit(); echo $form->end(); ?>
</div>
<?php echo $this->element('mi_panel/filter') ?>