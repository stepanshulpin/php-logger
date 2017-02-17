<?php
namespace Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

abstract class Route extends AbstractLogger implements LoggerInterface
{
    public $isEnable = true;
	
    public function __construct(array $attributes = [])
	{
        foreach ($attributes as $attribute => $value)
        {
            if (property_exists($this, $attribute))
            {
                $this->{$attribute} = $value;
            }
        }
    }

    public function getDate()
    {
        date_default_timezone_set('Europe/Moscow');
        return (date("Y-m-d H:i:s"));
    }

    public function contextStringify(array $context = [])
    {
        return !empty($context) ? json_encode($context) : null;
    }
}