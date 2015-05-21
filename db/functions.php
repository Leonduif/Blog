<?php 
	function isOld($input) {
		if (isset($_POST[$input])) {
			return $_POST[$input];
		} 
	}
?>