<?php 
	// Checks if user already submitted form and prevents them to type the same thing in again
	function isOld($input) {
		if (isset($_POST[$input])) {
			return $_POST[$input];
		} 
	}

	// Shows view and passes data with it
	function view($page, $data = null) {
		if ($data) {
			extract($data);
		}

		$view_path  = "views/" . $page . ".view.php";

		if (file_exists($view_path)) {
			include "views/layout.php";
		}
		else {
			echo "View file does not exist";
			return false;
		}
	}

	function model($models = []) {
		if (count($models) > 0) {
			foreach ($models as $model) {
				if (file_exists("models/$model.model.php")) {
					include "models/$model.model.php";
				}
				else {
					"Model: $model does not exist";
				}
			}
		}
		else {
			echo "No models";
		}
	}
?>