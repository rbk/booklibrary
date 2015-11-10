<?php
	require( "functions.php" );

	$title = "";
	$author = "";
	$publisher = "";
	$isbn = "";
	$form_data = extract( $_POST, EXTR_IF_EXISTS );
	$fields = array( "title", "author", "publisher", "isbn");
	$errors = array();
	$submitted = false;
	$filename = "books.txt";

	if ( $form_data > 0 ){
		$submitted = true;
	}
	if ( $submitted ) {
		// check for completeness
		$x = 0;
		foreach ( $fields as $item ){
			if ( empty($_POST[$item]) ){
				$errors[$x] = "Required";
			}
			$x++;
		}		
		if ( empty($errors) ){
			$highest_id = get_highest_id( );
			$fh = fopen( $filename, "a" );
				fwrite( $fh, "$highest_id\t$title\t$author\t$publisher\t$isbn\n" );
			fclose( $fh );
			// $added = true;
			header("location:biags_library.php?id=$highest_id&added=true");
		}
	}
?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biags Library - Add a book</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myjquery.js"></script>
</head>
	<body>
		<div class="container">
		<h1><a href="biags_library.php">Biag's Library</a></h1>
		<h2>Add a book</h2><br/>
		<p>
			Please enter all information about the book:
		</p>
		<br/>
		<form name="add" method="post" action="add.php">
			<p>
				<label for="title">Book title</label>
				<input type="text" name="title" id="title" value="<?php echo $title; ?>"/>
				<?php if ( ! empty($errors[0]) ) : echo "<span class='error'>$errors[0]</span>"; endif; ?>
			</p>
			<p>
				<label for="author">Author</label>
				<input type="text" name="author" id="author" value="<?php echo $author; ?>"/>
				<?php if ( ! empty($errors[1]) ) : echo "<span class='error'>$errors[1]</span>"; endif; ?>
			</p>
			<p>
				<label for="publisher">Publisher</label>
				<input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>"/>
				<?php if ( ! empty($errors[2]) ) : echo "<span class='error'>$errors[2]</span>"; endif; ?>
			</p>
			<p>
				<label for="isbn">ISBN</label>
				<input type="text" name="isbn" id="isbn" value="<?php echo $isbn; ?>"/>
				<?php if ( ! empty($errors[3]) ) : echo "<span class='error'>$errors[3]</span>"; endif; ?>
			</p>
			<label style="visibility:hidden">invisible</label>
			<input type="submit" value="Add to Collection" />
			<a href="biags_library.php"><input type="button" name="cancel" id="cancel-button" value="Cancel" /></a>
		</form>	
		</div>
	</body>
</html>