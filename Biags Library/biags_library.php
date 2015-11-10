
<?php require( "functions.php" ); ?> 
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biags Library - Home</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myjquery.js"></script>
</head>
	<body>
		<div class="container">
		<h1><a href="biags_library.php">Biag's Library</a></h1>
		<?php if( isset( $_GET['removed'] ) ){
			echo "<div id='message'>";
			echo "The book titled \"" . $_GET['title'] . "\" has been removed from your library!";
			echo "</div>";
		} else if ( isset( $_GET['updated'] )){
			echo "<div id='message'>";
			echo "The book titled \"" . $_GET['title'] . "\" has been successfully updated.</p>";
			echo "</div>";
			get_single_book( $_GET['id'] );
		} else if ( isset( $_GET['added'] ) ){ ?>
			<h3 style="color:#0E0;">Book Added!</h3><br/>
		<?php get_single_book( $_GET['id'] ); } 
		display_menu();
		?>
		<p>Find a book by using the search feature or by browsing the collection organized by the alphabet
			once you find the book you are looking for, you may update, view, or delete it.</p>

		</div>
	</body>
</html>