<?php
namespace Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = [])
	{
		//тут мы будем логировать
	}
}