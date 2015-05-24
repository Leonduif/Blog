<?php 
	require 'config.php';

	Class Database {
		static function connect($config) {
			try {
				$conn = new PDO("$config[dbtype]:host=$config[host];dbname=$config[dbname]",
								 $config["username"], $config["password"]);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch (PDOException $e) {
				return false;
			}
		}

		static function fetch($query, $bindings, $conn) {
			if ($conn) {
				$statement = $conn->prepare($query);
				$statement->execute($bindings);

				$results = $statement->fetchAll();

				return $results ? $results : false;
			}
			return false;
		}

		static function add($query, $bindings, $conn) {
			$statement = $conn->prepare($query);
			return $statement->execute($bindings);
		}
	}

	$conn = Database::connect($config);
?>