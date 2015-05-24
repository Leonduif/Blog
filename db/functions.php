<?php 
	// Checks if user already submitted form and prevents them to type the same thing in again
	function isOld($input) {
		if (isset($_POST[$input])) {
			return $_POST[$input];
		} 
	}

	// Shows view and passes data with it
	function viewModel($page, $data = null) {
		if ($data) {
			extract($data);
		}

		$view_path  = "views/" . $page . ".view.php";
		$model_path = "models/" . $page . ".model.php";

		if (file_exists($view_path) && file_exists($model_path)) {
			include "views/layout.php";
		}
		else {
			return false;
		}
	}
?>