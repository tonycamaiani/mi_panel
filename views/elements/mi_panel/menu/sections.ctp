<?php /* SVN FILE: $Id: sections.ctp 863 2009-11-17 11:50:40Z javi.a $ */
if (!isset($sections)) {
	$sections = $menu->sections();
}
foreach ((array)$sections as $section) {
	$out = $menu->generate($section);
	if ($out) {
		echo '<div><h2><span>' . $section . '</span></h2>' . $out . '</div>';
	}
}
?>