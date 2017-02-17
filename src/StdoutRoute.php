<?php
namespace Logger;

use Logger;

class StdoutRoute extends Route
{
	public $template = "{date} {level} {message} {context}";
	
	public function log($level, $message, array $context = [])
	{
		$stdout = fopen('php://stdout', 'w');
		fwrite($stdout, trim(strtr($this->template, [
			'{date}' => $this->getDate(),
			'{level}' => $level,
			'{message}' => $message,
			'{context}' => $this->contextStringify($context),
		])). PHP_EOL);
		fclose($stdout);
	}
}