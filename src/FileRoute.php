<?php
namespace Logger;

use Logger;

class FileRoute extends Route
{
    public $filePath;
	
    public $template = "{date} {level} {message} {context}";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        if (!file_exists($this->filePath))
        {
            touch($this->filePath);
        }
    }

    public function log($level, $message, array $context = [])
    {
        file_put_contents($this->filePath, trim(strtr($this->template, [
            '{date}' => $this->getDate(),
            '{level}' => $level,
            '{message}' => $message,
            '{context}' => $this->contextStringify($context),
        ])) . PHP_EOL, FILE_APPEND);
    }
}