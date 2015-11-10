<?php
	
	class Page_variables {

		public function __construct(){}
		// // echo $_SERVER['PHP_SELF'];
		// public $title = "";
		// public $author = "";
		// public $publisher = "";
		// public $isbn = "";
		// public $form_data = extract( $_POST, EXTR_IF_EXISTS );
		// public $fields = array( "title", "author", "publisher", "isbn");
		// public $errors = array();
		// public $submitted = false;
		// public $filename = "books.txt";
		
	}
	$page = new Page_variables();
	
	class Book {
		// private $attributes = array();
		public $title;

		public function __construct( $title ){
			$this->title;
		}

		public function __set( $name, $value ){
			$this->name = $value;
		}

		public function __get( $value ){
			echo $this->value;
		}
		public function toString(){
			return $this;
		}
	}

	$book = new Book('Huckleberry Fin');
	$book->title = "Huckleberry Fin";
	$book->__get('title');
?>