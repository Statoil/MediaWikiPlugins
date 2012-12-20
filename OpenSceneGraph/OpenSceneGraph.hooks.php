<?php

class OpenSceneGraphHooks {

	public static function init(Parser &$parser) {
		$parser->setHook('openscenegraph', 'OpenSceneGraphHooks::renderFromTag');
		return true;
	}

	public static function renderFromTag($input, array $args, Parser $parser, PPFrame $frame) {
		global $wgServer, $wgScriptPath;
		$basepath = $wgScriptPath;
		$config = self::getTagConfig($args);
		$url = $wgServer;
		if ($args['file']) {
			if (stripos($args['file'], 'http://') === 0 ||
			    stripos($args['file'], 'https://') === 0) {
				$url = $args['file'];
			} else if ($args['file'][0] !== '/') {
				$url .= $basepath;
			} else {
				$url .= $args['file'];
			}
			$output = "<object type=\"application/osg-viewer\" data=\"$url\" width=\"" . $config['width'] . "\" height=\"" . $config['height'] . "\"></object>";
		} else {
			$output = "<div>IVS file " . $args['file'] . "doesn't exist</div>";
		}
		return array($output, 'noparse' => true, 'isHTML' => true);
	}


	public static function registerUnitTests(&$files) {
		return true;
	}

	public static function getTagConfig($args) {
		$config['width'] = array_key_exists('width', $args) ? filter_var($args['width'], FILTER_VALIDATE_INT) : 1024;
		$config['height'] = array_key_exists('height', $args) ? filter_var($args['height'], FILTER_VALIDATE_INT) : 768;
		return $config;
	}
}
