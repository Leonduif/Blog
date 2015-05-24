<?php 
	require 'config.php';

	Class Database {
		private $dbtype;
		private $host;
		private $dbname;
		private $username;
		private $password;
		public $conn;

		public function __construct($config) {
			$this->dbtype   = $config['dbtype'];
			$this->host     = $config['host'];
			$this->dbname   = $config['dbname'];
			$this->username = $config['username'];
			$this->password = $config['password'];
			$this->connect();
		}

		public function connect() {
			try {
				$this->conn = new PDO("$this->dbtype:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				$this->conn = false;
			}
		}

		public function fetch($query, $bindings = []) {
			if ($this->conn) {
				$statement = $this->conn->prepare($query);
				$statement->execute($bindings);

				$results = $statement->fetchAll();

				return $results ? $results : false;
			}
			echo "Couldn't fetch data because there is no connection to the DB";
			return false;
		}

		public function write($query, $bindings, $conn) {
			$statement = $conn->prepare($query);
			$statement->execute($bindings);
		}
	}

	$conn = new Database($config);
?>