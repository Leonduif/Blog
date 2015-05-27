<?php
	class Post {
		public $message;
		public $messageClass;

		public function __construct($conn) {
			$this->conn = $conn;
		}

		public function add($title, $body) {
			if (!empty($title) && !empty($body)) {
				$title = htmlspecialchars(trim($title));
				$body = htmlspecialchars(trim($body));

				$this->message       = "Form succesfully submitted";
				$this->messageClass  = 'valid';

				Database::query("INSERT INTO posts(title, body) VALUES(:title, :body)",
							["title" => $title, "body" => $body],
							$this->conn);

				$_POST = []; // clears data
			}
			else {
				$this->message      = "Please fill in all forms plx";
				$this->messageClass = 'error';
			}
		}

		public function delete($id) {
			if (!empty($id)) {
				$id = htmlspecialchars(trim($id));

				Database::query("DELETE FROM posts WHERE id = :id", 
							   ['id' => $id], 
							   $this->conn);
				return true;
			}
			return false;
		}

		public function edit($id, $title, $body) {
			if (!empty($id) && !empty($body) && !empty($title)) {
				$id    = htmlspecialchars(trim($id));
				$body  = htmlspecialchars(trim($body));
				$title = htmlspecialchars(trim($title));

				Database::query("UPDATE posts SET body = :body, title = :title WHERE id = :id",
							   ['body' => $body, 'title' => $title, 'id' => $id], 
							   $this->conn);

				return true;
			}
			return false;
		}
	}
?>