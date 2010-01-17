<?php
/**
 * Example config file
 */
$config['MiPanel']['menu']['top'] = array(
	'general' => array(
		'Controller Name',
		'Alias' => array('controller' => 'x', 'action' => 'y'),
		'[ » ]' => array('url' => array('controller' => 'y', 'action' => 'z'), 'class' => 'special')
	),
	'next' => array(
		'Another Controller Name',
		'[ « ]' => array('url' => '/admin', 'class' => 'special'),
		'[ » ]' => array('url' => array('controller' => 'provinces', 'action' => 'index'), 'class' => 'special')
	),
	'setup' => array(
		__('Settings', true) => array('plugin' => 'mi_settings', 'controller' => 'mi_settings', 'action' => 'index'),
		__('Dev Tools', true) => array('plugin' => 'mi_development', 'controller' => 'mi_development', 'action' => 'index'),
		'[ » ]' => array('url' => array('controller' => 'y', 'action' => 'z'), 'class' => 'special')
	)
);
/* Rename these */
$config['MiPanel']['themeColors'] = array(
	'000' => '#000',
	'222' => '#222',
	'333' => '#333',
	'444' => '#444',
	'666' => '#666',
	'888' => '#888',
	'ccc' => '#ccc',
	'fff' => '#fff',
	'1a80bb' => '#1a80bb',
	'21415f' => '#21415f',
	'152739' => '#152739',
	'ecf0f8' => '#ecf0f8',
	'e5f0fc' => '#e5f0fc',
	'f0f0f0' => '#f0f0f0',
	'f2f2f2' => '#f2f2f2',
	'ffd0cd' => '#ffd0cd',
	'ffe8e8' => '#ffe8e8',
	'fc0' => '#fc0',
	'dark' => 'rgba(0, 0, 0, 0.5)',
	'light' => 'rgba(255, 255, 255, 0.5)',
	'pale' => 'rgba(255, 255, 255, 0.8)',
	'red' => 'red',
	'yellow' => 'yellow'
);
$themeColors = $config['MiPanel']['themeColors'];
$config['MiPanel']['css'] = array(
	'body' => array(
		'background' => "{$themeColors['000']} url(img/bg.jpg) no-repeat 50% 90%",
		'color' => $themeColors[444]
	),
	'header-logo' => array(
		'background' => 'transparent url(img/logo.png) no-repeat scroll 0 -3px',
		'border-right-color' => $themeColors[152739]
	),
	'page-wrap' => array(
		'background' => $themeColors['light'],
	),
	'sidebar' => array(
		'background' => $themeColors['light'],
	),
	'message' => array(
		'background' => $themeColors['light'],
	),
	'flashWarn' => array(
		'background-color' => $themeColors['e5f0fc'],
		'border-color' => $themeColors['yellow']
	),
	'flashError' => array(
		'background-color' => $themeColors['ffe8e8'],
		'border-color' => $themeColors['red'],
		'color' => $themeColors['red']
	),
	'button' => array(
		'background' => 'url(img/button_bg.png) repeat-x 0 0',
		'color' => $themeColors['fff'],
		'border-color' => $themeColors['222'],
		'text-shadow' => "1px 1px 1px {$themeColors['000']}"
	),
	'main-nav-li-active' => array(
		'background' => 'transparent url(img/main-nav-active.gif) center bottom no-repeat'
	),
	'sidebar-h2' => array(
		'background' => 'transparent url(img/main-nav-active.gif) no-repeat scroll 90% 95%'
	),
	'main-nav' => array(
		'background' => $themeColors['21415f']
	),
	'main-h1' => array(
		'background' => $themeColors['fff'],
	),
	'main-h1-span' => array(
		'color' => $themeColors['333']
	),
	'sidebar-h2-span' => array(
		'background' => $themeColors['21415f'],
		'color' => $themeColors['fff']
	),
	'container' => array(
		'background' => $themeColors['pale'],
		'border-color' => $themeColors['pale'],
	),
	'container-table-thead-th' => array(
		'background' => $themeColors['21415f'],
		'color' => $themeColors['666']
	),
	'tr-even' => array(
		'background' => $themeColors['f0f0f0']
	),
	'tr-hover' => array(
		'background' => $themeColors['fc0'],
		'color' => $themeColors['000']
	),
	'div-navigation' => array(
		'background' => $themeColors['f2f2f2']
	),
	'div-error' => array(
		'background' => $themeColors['ffd0cd']
	),
	'h1' => array(
		'text-shadow' => "{$themeColors['000']} 1px 1px 1px"
	),
	'h2' => array(
		'color' => $themeColors['fff'],
		'text-shadow' => "{$themeColors['000']} 1px 1px 1px"
	),
	'h3' => array(
		'text-shadow' =>  "{$themeColors['000']} 1px 1px 1px"
	),
	'header-h1-a' => array(
		'color' => $themeColors['333']
	),
	'header-h2' => array(
		'color' => $themeColors['fff']
	),
	'header-p-a' => array(
		'color' => $themeColors['333']
	),
	'main-nav-li-a' => array(
		'color' => $themeColors['fff']
	),
	'sidebar-li-a' => array(
		'color' => $themeColors['444']
	),
	'sidebar-li-a-hover' => array(
		'color' => $themeColors['000']
	),
	'sidebar-li-active-a' => array(
		'color' => $themeColors['000'],
		'border-color' => $themeColors['333']
	),
	'container-h2-span' => array(
		'color' => $themeColors['333']
	),
	'container-h2-span-a' => array(
		'color' => $themeColors['666']
	),
	'a' => array(
		'color' => $themeColors['1a80bb']
	),
	'th-a' => array(
		'color' => $themeColors['888']
	),
	'button-hover' => array(
		'color' => $themeColors['ccc'],
		'border-color' => $themeColors['666']
	),
	'textarea-input' => array(
		'background' => $themeColors['fff'],
		'border-color' => $themeColors['333']
	),
	'body-pre' => array(
		'background' => $themeColors['fff'],
		'border-color' => $themeColors['666'],
		'color' => $themeColors['333']
	),
	'container-h3' => array(
		'color' => $themeColors['ccc']
	),
	'container-odd' => array(
		'background' => $themeColors['ecf0f8']
	),
	'container-even' => array(
		'background' => $themeColors['fff']
	),
	'container-name' => array(
		'color' => $themeColors['ccc']
	),
	'container-image' => array(
		'background' => $themeColors['fff']
	),
	'container-image-img' => array(
		'border-color' => $themeColors['ecf0f8']
	),
	'overrides' => ''
);