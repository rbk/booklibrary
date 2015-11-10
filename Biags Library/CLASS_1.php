<?php
	$id = "";
	$title = "";
	$author = "";
	$title = "";
	$publisher = "";
	$isbn = "";
	extract( $_GET, EXTR_IF_EXISTS );

	$submit = false;
	if( count($_GET) > 0 ) {
		$submit = true;
	}
	if( $submit ){
		$book = new Book( $id, $title, $author, $publisher, $isbn );
		echo "Information Submitted";
	}
?>
<!DOCtype html>
<html lang="EN">
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css" media="all" /> -->
</head>
	<body>
		<div class="container">

		<h1>You down with OOP?</h1>

		<form action="" method="get">
			<label for="title">Title: </label>
			<input type="text" id="title" name="title" value="<?php if( isset( $_GET['title'] ) ) : echo $_GET['title']; endif; ?>"/>
			<input type="submit" />
		</form>
		</div>
	</body>
</html>
<?php
	class Book {
		public $attribute = array(
				'id' 		=> '',
				'Title' 	=> '',
				'Author' 	=> '',
				'Publisher' => '',
				'ISBN' 		=> '',
				);
		// public $title;
		public function __construct( $id, $title, $author, $publisher, $isbn ){
			// foreach( $attribute as $label => $value ){
				$this->attribute['id'] = 		$id;
				$this->attribute['Title'] = 	$title;
				$this->attribute['Author'] = 	$author;
				$this->attribute['Publisher'] = $publisher;
				$this->attribute['ISBN'] = 		$isbn;
			// }
		}
		public function display_book(){
			foreach( $this->attribute as $label => $value ){
				echo $label . ": " . $value . "<br/>";
			}
		}
		public function create_form( ){
			foreach( $this->attribute as $label => $value ){
				if( $label != 'id' ) {
					echo '<label for="' . $label . '">' . $label . '</label>';
					echo '<input type="text" name="' . $label . '" id="' . $label . '" value="' . $value . '" /><br/>';
				}
			}
		}
		// public function __set( $name, $value ){
		// 	$this->name = $value;
		// }

		// public function __get( $value ){
		// 	echo $this->value;
		// }
	}
	// contruct this new book...
	$book = new Book( '1', 'Title', 'author', 'pub', '12312899' );
	$book->display_book();
	echo "<br/>";
	$book->create_form();
	?>


<br/>

<?php

	$id = $book->attribute['id'] . "<br/>";
	echo "The book id is: " . $id;

	// $book->create_form();

	print_r( $book->attribute );
	// echo $book->attribute['title'] . "<br/>";	
?>

