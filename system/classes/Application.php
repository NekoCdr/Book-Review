<?php

namespace System;

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Application
 * @package System
 */
class Application
{
	/**
	 * Application constructor.
	 */
	public function __construct()
	{
//		require_once(ROOT_PATH.'/routes/web.php');
	}

	/**
	 * @throws \Exception
	 * @return void
	 */
	public function run(): void
	{
		$this->preload();

		Routes::init();
	}

	/**
	 * @return void
	 */
	private function preload(): void
	{
		Dotenv::createImmutable(ROOT_PATH)->load();

		$capsule = new Capsule();
		$capsule->addConnection([
			'driver'    => env('DB_CONNECTION', 'pgsql'),
			'host'      => env('DB_HOST', '127.0.0.1'),
			'port'      => env('DB_PORT', '5432'),
			'database'  => env('DB_DATABASE', 'database'),
			'username'  => env('DB_USERNAME', 'root'),
			'password'  => env('DB_PASSWORD', 'password'),
			'charset'   => env('DB_CHARSET', 'utf8'),
			'prefix'    => '',
		]);
		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}
}
