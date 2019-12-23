<?php

namespace System;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ExceptionHandler
 * @package System
 */
class ExceptionHandler
{
	/**
	 * @param \Throwable|NotFoundHttpException $e
	 * @return void|string
	 * @throws \Exception
	 */
	public static function run(\Throwable $e)
	{
		$status_code = 0;
		if(get_class($e) === NotFoundHttpException::class)
			$status_code = $e->getStatusCode();

		if($status_code)
		{
			exit(Blade::runSystem('error', ['status_code' => $status_code]));
		}
		else
		{
			$message_tpl = "Message: %s\n\nFile: %s\nLine: %s\nDebug Backtrace:\n%s";
			$message     = sprintf($message_tpl, $e->getMessage(), $e->getFile(), $e->getLine(), str_replace($_SERVER['DOCUMENT_ROOT'], '.', htmlspecialchars($e->getTraceAsString())));
			exit(nl2br($message));
		}
	}
}
