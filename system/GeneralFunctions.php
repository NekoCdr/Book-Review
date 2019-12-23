<?php

use System\Blade;

/**
 * @param string $view
 * @param array $variables
 * @return string
 * @throws Exception
 */
function view(string $view, array $variables = []): string
{
	return Blade::run($view, $variables);
}

/**
 * @param string $file
 * @return string
 * @throws Exception
 */
function asset(string $file): string
{
	$path = '/'.$file;
	if(!file_exists(PUBLIC_PATH.$path))
		throw new Exception("Unable to locate asset file");

	return $path;
}

/**
 * @param null $key
 * @return string|null
 */
function __($key = null)
{
	if(is_null($key)) {
		return $key;
	}

	$locale = 'en'; // hardcoded

	$parsed = strtok($key, '.');

	$filename = ROOT_PATH."/resources/lang/$locale/$parsed.php";

	if(!file_exists($filename))
		return $key;

	$lang = require($filename);

	$left = count(explode('.', $key))-1;

	while($parsed = strtok('.'))
	{
		if((!is_array($lang) && $left) || !isset($lang[$parsed]))
		{
			$lang = null;
			break;
		}
		$lang = $lang[$parsed];
	}

	return !is_null($lang) ? $lang : $key;
}

/**
 * Generate the URL to a named route.
 *
 * @param  array|string  $name
 * @param  mixed  $parameters
 * @param  bool  $absolute
 * @return string
 */
function route($name, $parameters = [], $absolute = true)
{
	return \System\Routes::route($name, $parameters, $absolute);
}
