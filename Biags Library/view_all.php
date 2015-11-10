<?php require( "functions.php" );?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biag's Library</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myjquery.js"></script>
</head>
	<body>
		<div class="container" id="top">
		<h1><a href="biags_library.php">Biag's Library</a></h1>
		<div id="to_top"><a href='#top'>Top</a></div>
			<div id="view_all">
			<p>Select the letter corrensponding to the first letter of the book title.</p><br/>
			<?php
				$alpha = array('A','B','C','D','E','F','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
				foreach( $alpha as $letter ){
					echo "<a class='letter' href='#$letter'>" . strtoupper($letter) . "</a>&nbsp;";
				}
				$file = open_book_file();
				foreach( $alpha as $letter ){
					echo "<h2 class='alpha' id='$letter'>" . strtoupper($letter) . "</h2>";
					foreach( $file as $element ){
						$book = explode( "\t", $element );
						if ( preg_match( "/^" . $letter . "/i", $book[1] ) ){
							echo "<div class='found_book'>";
							echo "<span class='book_head'>Title: </span>" . $book[1] . "<br/>"; 
							echo "<span class='book_head'>Author: </span>" . $book[2];
							echo "<span class='options'>";
							echo '<a href="update.php?id=' . $book[0] . '">Update</a>';
							echo '<a href="remove.php?id=' . $book[0] . '">Delete</a>';
							echo '<a href="view.php?id=' . $book[0] . '">View</a>';
							echo "</span>";
							echo "</div>";
						} 
					}
				}
			
			?>
			</div>
		</div>
	</body>
</html>