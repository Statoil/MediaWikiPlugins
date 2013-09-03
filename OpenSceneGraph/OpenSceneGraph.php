<?php

if (!defined('MEDIAWIKI')) {
	die('Not an entry point.');
}


$wgExtensionCredits['parserhook'][] = array(
	'path' => __FILE__,
	'name' => 'OpenSceneGraph',
	'version' => 0.1,
	'author' => 'Mathias Lidal',
	'url' => '',
	'descriptionmsg' => 'openscenegraph-desc'
);

$wgHooks['ParserFirstCallInit'][] = 'OpenSceneGraphHooks::init';

$wgAutoloadClasses['OpenSceneGraphHooks'] = dirname(__FILE__) . '/OpenSceneGraph.hooks.php';

$wgResourceModules['ext.OpenSceneGraph'] = array(
	'scripts' => 'js/ext.OpenSceneGraph.js',
	'styles' => array('css/ext.OpenSceneGraph.css'),
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'OpenSceneGraph',
);

?>
