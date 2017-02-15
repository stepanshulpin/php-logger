<?php
namespace Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

abstract class Route extends AbstractLogger implements LoggerInterface
{
	/**
	 * @var bool Включен ли роут
	 */
	public $isEnable = true;
}