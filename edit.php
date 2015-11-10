<?php 
	require('class-collection.php');
	require('form_tools.php');
	$collection = new Collection('data.txt');

	$id = "";
	extract( $_GET, EXTR_IF_EXISTS );
	$success = false;
	$errors = array();
	$valid = "";

	// Get the book with the id or go home
	if( ! empty( $id ) ) {
		$book = $collection->get_single_book( $id );

		// When post is set, do save changes to file
		if( isset( $_POST['title'] ) ){
			$valid = $collection->validate( $_POST, $errors );
			if( $valid ){
				$updated_book = $collection->format_data( $_POST );
				$collection->update_book( $updated_book, $id );
				$success = true;
				header("location:home.php?updated=true");
			}
		}

	} else {
		header("location:home.php");
	}
?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Edit Book</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
	<body>
		<h1>Edit Book</h1>
		<form method="post" action="edit.php?id=<?php echo $_GET['id'] ?>">
			<?php
				foreach( Book::$labels as $name => $label ) {
					text_field( $name, $label, $book->$name, $errors );
				}
			?>
			<br/>
			<input type="submit" id="submit" value="Update Book" />
		</form>
		<h4><a href="home.php">Cancel</a></h4>
	</body>
</html>