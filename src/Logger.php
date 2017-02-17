<?php
namespace Logger;

use Iterator;
use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger implements LoggerInterface
{
    public $routes;

    public function __construct(Iterator $routes)
	{
        $this->routes = $routes;
	}

    public function log($level, $message, array $context = [])
	{
        foreach ($this->routes as $route)
        {
            if (!$route instanceof Route)
            {
                continue;
            }
            if (!$route->isEnable)
			{
                continue;
            }
            $route->log($level, $message, $context);
        }
    }
}