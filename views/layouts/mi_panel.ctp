<?php echo $html->docType('xhtml-trans'); ?>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
	<head>
		<?php echo $html->charset(); ?>
		<title><?php echo htmlspecialchars($title_for_layout); ?></title>
		<?php
		if (!isset($pageTitle)) {
			$pageTitle = $title_for_layout;
		}
		echo $html->meta('icon');
		if (isset ($asset)) {
			echo $asset->css(array(
				'/mi_panel/css/mi_panel',
				'/mi_panel/css/mi_panel_icons',
				'/js/theme/ui.all',
			));
			echo $asset->out('css');

			$locale = I18n::getInstance()->l10n->locale;
			if ($locale !== 'eng' && file_exists(APP . 'locale' . DS . $locale)) {
				echo $asset->js('i18n.' . $locale, 'localization');
			}
			$asset->js(array(
				'jquery', 'jquery-ui',
				'jquery.blockUI',
				'jquery.mi.cloner', 'jquery.mi.dialogs', 'jquery.mi.lookups',
				'/mi_panel/js/cookies',
				'/mi_panel/js/mi_panel'
			));
		}
		echo $scripts_for_layout;
		if (empty($mainDivClass)) {
			$mainDivClass = 'container';
		}
		?>
	</head>
	<body id="<?php echo $this->name; ?>" class="<?php echo $this->action; ?>">
		<div id="page-wrap">
			<?php echo $this->element('mi_panel/header', array('pageTitle' => $pageTitle)); ?>
			<div id='content'>
				<?php echo $this->element('mi_panel/flash'); ?>
				<div id='main'>
					<div class="<?php echo $mainDivClass ?>"><?php echo $content_for_layout; ?></div>
				</div>
				<?php echo $this->element('mi_panel/menu/sidebar'); ?>
			</div><?php
			echo $this->element('mi_panel/footer');
			echo $asset->out('js');
			?>
		</div>
	</body>
</html>