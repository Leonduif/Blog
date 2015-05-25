<?php
	class Post {
		public $message;
		public $messageClass;
		public $conn;

		public function __construct($conn) {
			$this->conn = $conn;
		}

		public function add($title, $body) {
			if (!empty($title) && !empty($body)) {
				htmlspecialchars(trim($title));
				htmlspecialchars(trim($body));

				$this->message       = "Form succesfully submitted";
				$this->messageClass  = 'valid';

				Database::write("INSERT INTO posts(title, body) VALUES(:title, :body)",
							["title" => $title, "body" => $body],
							$this->conn);

				// Refresh page to prevent double submitting the form
				Header("Location:index.php");
			}
			else {
				$this->message      = "Please fill in all forms plx";
				$this->messageClass = 'error';
			}
		}
	}

	// On form submit
	if (isset($_POST['add-post']) && isset($_POST['title']) && isset($_POST['body'])) {
		echo "form submitted";
		$db = new Post($conn);

		$db->add($_POST['title'], $_POST['body']);

		$alert      = $db->message;
		$alertClass = $db->messageClass;
	}

	$posts = Database::fetch("SELECT * FROM posts ORDER BY id DESC", [], $conn);
?>