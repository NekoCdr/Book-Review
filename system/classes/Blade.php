<?php

namespace System;

use eftec\bladeone;

/**
 * Class Blade
 * @package System
 */
class Blade
{
	/**
	 * @var string
	 */
	private static $_views = ROOT_PATH.'/resources/views';

	/**
	 * @var string
	 */
	private static $_views_system = ROOT_PATH.'/system/views';

	/**
	 * @var string
	 */
	private static $_cache = ROOT_PATH.'/cache';

	/**
	 * @var string
	 */
	private static $_cache_system = ROOT_PATH.'/cache/system';

	/**
	 * @param string $view
	 * @param array $variables
	 * @return string
	 * @throws \Exception
	 */
	public static function run(string $view, array $variables = []): string
	{
		$blade = new bladeone\BladeOne(self::$_views, self::$_cache, bladeone\BladeOne::MODE_AUTO);
		return $blade->run($view, $variables);
	}

	/**
	 * @param string $view
	 * @param array $variables
	 * @return string
	 * @throws \Exception
	 */
	public static function runSystem(string $view, array $variables = []): string
	{
		$blade = new bladeone\BladeOne(self::$_views_system, self::$_cache_system, bladeone\BladeOne::MODE_AUTO);
		return $blade->run($view, $variables);
	}
}
