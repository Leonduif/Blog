<?php	
	class Post extends Database {
		public $message;
		public $messageClass;

		public function add($title, $body) {
			if (!empty($title) && !empty($body)) {
				htmlspecialchars(trim($title));
				htmlspecialchars(trim($body));

				$this->message       = "Form succesfully submitted";
				$this->messageClass = 'valid';

				return $this->write("INSERT INTO posts(title, body) VALUES(:title, :body)",
							["title" => $title, "body" => $body],
							$this->conn);

				$_POST = [];
			}
			else {
				$this->message      = "Please fill in all forms plx";
				$this->messageClass = 'error';
			}
		}
	}
?>