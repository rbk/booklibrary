<?php 
	require('class-collection.php');
	require('form_tools.php');
	$collection = new Collection('data.txt');

	$errors = array();
	$valid = "";
	$file_error = "";
	

	if( isset( $_POST['title'] ) ){
		// make sure all data exists
		$valid = $collection->validate( $_POST, $errors );
		
		if( $valid ){ 
			
			$book = $collection->format_data( $_POST );
			$book = $collection->write_to_file( $book );

			if( $book ){
				header( "location:home.php?new=1" );
			} else {
				$file_error = "File could not be opened.";
			}
		}
	} 
		
?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>New Book</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
	<body>
		<h1>New Book</h1>
		<?php echo $file_error; ?>
		<form method="post" action="new.php">
			<?php
				foreach( Book::$labels as $name => $label ) {
					text_field( $name, $label, @$_POST[$name], $errors );
				}
			?>
			<br/>
			<input type="submit" id="submit" value="Save Book" />

		</form>
		<h4><a href="home.php">Cancel</a></h4>
		
	</body>
</html>
