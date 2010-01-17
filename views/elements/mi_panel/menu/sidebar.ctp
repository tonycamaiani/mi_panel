<div id="sidebar"><?php
	$sections = $menu->sections();
	foreach ($sections as $section) {
		echo '<div><h2><span>' . $section . '</span></h2>';
		echo $menu->generate($section);
		echo '</div>';
	}
	echo $this->element('mi_panel/search');
?>
</div>