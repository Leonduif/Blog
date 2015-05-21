<?php 
	// Checks if user already submitted form and prevents them to type the same thing in again
	function isOld($input) {
		if (isset($_POST[$input])) {
			return $_POST[$input];
		} 
	}

	function test() {
		$test = "test";
		return $test;
	}

	// Shows view and passes data with it
	function view($view_path, $data = null) {
		if ($data) {
			extract($data);
		}

		$view_path = "views/" . $view_path . ".view.php";
		include "views/layout.php";
	}
?>