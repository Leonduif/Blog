<?php 
	require 'config.php';

	Class Database {
		private $dbtype;
		private $host;
		private $dbname;
		private $username;
		private $password;

		public static function connect($config) {
			$dbtype   = $config['dbtype'];
			$host     = $config['host'];
			$dbname   = $config['dbname'];
			$username = $config['username'];
			$password = $config['password'];

			try {
				$conn = new PDO("$dbtype:host=$host;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				return $conn;
			} catch (PDOException $e) {
				return false;
			}
		}

		public static function fetch($query, $bindings, $conn) {
			if ($conn) {
				$statement = $conn->prepare($query);
				$statement->execute($bindings);

				$results = $statement->fetchAll();

				return $results ? $results : false;
			}
			echo "Couldn't fetch data because there is no connection to the DB";
			return false;
		}

		public static function write($query, $bindings, $conn) {
			if ($conn) {
				$statement = $conn->prepare($query);
				$statement->execute($bindings);
			}
			else {
				echo "Couldn't add something to the DB because there is no connection";
			}
		}
	}

	$conn = Database::connect($config);
?>