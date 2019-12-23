<?php

namespace System;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;

/**
 * Class Routes
 * @package System
 */
class Routes
{
	/**
	 * @var Request
	 */
	private static $_request;

	/**
	 * @var Router
	 */
	private static $_router;

	/**
	 * @brief This method is written following the example on GitHub:
	 * https://github.com/mattstauffer/Torch/blob/master/components/routing/index.php
	 *
	 * @return void
	 */
	public static function init()
	{
		$container = new Container();

		$request = Request::capture();
		$container->instance('Illuminate\Http\Request', $request);

		$events = new Dispatcher();

		$router = new Router($events, $container);

		require_once(ROOT_PATH.'/routes/web.php');

		self::$_request = $request;
		self::$_router  = $router;

		$response = $router->dispatch($request);

		$response->send();
	}

	/**
	 * Generate the URL to a named route.
	 *
	 * @param  array|string  $name
	 * @param  mixed  $parameters
	 * @param  bool  $absolute
	 * @return string|bool
	 */
	public static function route($name, $parameters = [], $absolute = true)
	{
		$routes = new UrlGenerator(self::$_router->getRoutes(), self::$_request);
		return $routes->route($name, $parameters, $absolute);
	}

	/**
	 * @param $name
	 * @return bool
	 */
	public static function has($name)
	{
		if (!is_null(self::$_router->getRoutes()->getByName($name)))
			return true;
		else
			return false;
	}
}
