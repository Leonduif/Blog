<?php 
	function isOld($input) {
		if (isset($_POST[$input])) {
			return $_POST[$input];
		} 
	}

	function view($view_path, $data = null) {
		include "$view_path";
	}
?>