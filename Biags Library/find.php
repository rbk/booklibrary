<?php
	require( "functions.php" );
	if ( isset( $_POST['query']) ){
		$query = $_POST['query'];
	} else {
		$query = "";
	}
	function get_books( $book ) {
		$filename = "books.txt";
		$file = file( $filename );
		echo "Search Results:<br/><br/>";
		foreach( $file as $item ) {
			$found = preg_match( "/" . $book . "/i", $item, $match );
			if ( $found ){
				$element = explode( "\t", $item );
				echo "<p class='found_book'>";
				echo '<span class="book_head">Title: </span>' . $element[1] . "<br/>";
				echo '<span class="book_head">Author: </span>' . $element[2] . "<br/>";
				echo '<span class="book_head">Publisher: </span>' . $element[3] . "<br/>";
				echo '<span class="book_head">ISBN: </span>' . $element[4] . "";
				echo '<a href="update.php?id=' . $element[0] . '">Update</a>';
				echo '<a href="remove.php?id=' . $element[0] . '">Delete</a>';
				echo '<a href="view.php?id=' . $element[0] . '">View</a>';
				echo "</p>";
 			}
		}	
	}
?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biag's Library - Search</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myjquery.js"></script>
</head>
	<body>
		<div class="container">
		<h1><a href="biags_library.php">Biag's Library</a></h1>
		<h2>Find a book</h2><br/>
		<p>Search by title, author, isbn, or publisher:</p>
		<form id="search-box" name="find" action="find.php" method="post">
			<p>
				<input type="text" name="query" id="query-field" value="<?php echo $query; ?>" />
				<input type="submit" id="query-button" value="Search" />
				<a href="biags_library.php"><input type="button" name="cancel" id="cancel-button" value="Cancel" /></a>
			</p>
		</form>
		<br/>
		<?php if ( ! empty( $query) ) : get_books( $query ); endif; ?>
		</div>
	</body>
</html>