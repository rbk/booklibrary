<?php
	require( "functions.php" );
	
	$book_id = "";
	$title = "";
	$author = "";
	$publisher = "";
	$isbn = "";
	$form_data = extract( $_POST, EXTR_IF_EXISTS );
	$updated = false;
	$fields = array( "title", "author", "publisher", "isbn");
	$errors = array();

	// with id, set all book variables for the form
	if( isset($_GET['id']) ){
		$id = $_GET['id'];
		$file = file( "books.txt" );
		foreach( $file as $item ){
			$book = explode( "\t", $item );
			if ( $book[0] == $id ){
				$book_id = $book[0];
				$title = $book[1];
				$author = $book[2];
				$publisher = $book[3];
				$isbn = $book[4];
			}
		}
	} 
	if ( $_GET['submit'] == true ){
		// validate
		$x = 0;
		foreach ( $fields as $item ){
			if ( empty($_POST[$item]) ){
				$errors[$x] = "Required";
			}
			$x++;
		}		
		if ( empty($errors) ){
		save_changes( $book_id, $title, $author, $publisher, $isbn );
		header("location:biags_library.php?updated=true&id=$book_id&title=$title");
		}
	}
?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biags Library - Update</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myjquery.js"></script>
</head>
	<body>
		<div class="container">
		<h1><a href="biags_library.php">Biag's Library</a></h1>
		<br/>
		<h2>Update a book</h2><br/>
		<form name="add" method="post" action="update.php?submit=true">
			<p style="display: none">
				<label for="book_id">Book ID</label>
				<input type="text" name="book_id" id="book_id" value="<?php echo $book_id; ?>"/>
				<?php if ( ! empty($errors[0]) ) : echo "<span class='error'>$errors[0]</span>"; endif; ?>
			</p>
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
			<input type="submit" value="Save Changes" />
			<a href="biags_library.php"><input type="button" name="cancel" id="cancel-button" value="Cancel" /></a>
		</form>
			<br/>
		</div>
	</body>
</html>