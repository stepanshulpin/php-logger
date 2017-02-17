<?php
namespace Logger;

use PDO;
use Logger;

class SQLRoute extends Route
{
	public $server;
	
	public $username;
	
	public $password;
	
	public $dbname;
	
	public $table;
	
	private $conn;
	
	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes);
		$this->conn = new \mysqli($this->server, $this->username, $this->password, $this->dbname);
			if ($this->conn->connect_error)
				die ("Logger failed to connect to database: " . $this->conn->connect_error);
			if (!$this->conn->query("DESCRIBE `".$this->table."`"))
			{
				$sql = "CREATE TABLE ".$this->table." (\n
					"."date"." DATETIME,\n
					"."level"." TEXT,\n
					"."message"." TEXT,\n
					"."context"." TEXT\n
					);";
				if ($this->conn->query($sql) === false)
				{
					die("Logger failed to create a table: " . $this->conn->error . "\nQuery: $sql");
				}
			}
	}
	
	public function log($level, $message, array $context = [])
	{
		$statement = $this->conn->prepare(
			'INSERT INTO ' . $this->table . ' (date, level, message, context) ' .
			'VALUES (?, ?, ?, ?)'
		);
		$statement->bind_param('ssss', $this->getDate(), $level, $message, $this->contextStringify($context));
		$statement->execute();		
	}
}