<?php
	function open_book_file( ){
		$filename = "books.txt";
		$file = file( $filename );
		return $file;
	}
	function search_file_for_id( $id ){
		$file = open_book_file();
		foreach( $file as $item ){
			$book = explode( "\t", $item );
			if ( $book[0] == $id ){
				return $item;
			}
		}
	}
	function save_changes( $book_id, $title, $author, $publisher, $isbn ){
		$file = open_book_file();
		$item_to_update = "/" . search_file_for_id( $book_id ) . "/";
		$new = trim("$book_id\t$title\t$author\t$publisher\t$isbn") . "\n";
		// Update array
		for( $x = 0 ; $x < count( $file ); $x++ ){
			if ( preg_match( $item_to_update, $file[$x] ) ){
				$file[$x] = $new;
			}
		}
		rewrite_file( $file, "books.txt" );	
	}	
	function rewrite_file( $array, $filename ){
		// Rewrite file with new ids
		if ( ! empty( $array ) ){
			$id = 0;
			$fh = fopen( $filename, "w" );
				foreach( $array as $element ){
					if ( ! empty( $element ) ){
						$item = explode( "\t", $element );
						$id++;
						fwrite( $fh, trim("$id\t$item[1]\t$item[2]\t$item[3]\t$item[4]") . "\n" );
					}
				}
			fclose($fh );
		}
	}
	function get_highest_id(  ){
		$file = open_book_file( );
			return count( $file ) + 1;
	}
	function delete_entry( $id ){
		$file = open_book_file( );
		$item_to_remove = "/" . search_file_for_id( $id ) . "/";
		for( $x = 0; $x < count( $file ); $x++ ){
			if ( preg_match( $item_to_remove, $file[$x] ) ){
				$file[$x] = "";
			}
		}
		rewrite_file( $file, "books.txt" );	
	}
	function get_this_date(){
		session_start();
		date_default_timezone_set("America/Chicago");
		$_SESSION['time'] = date( "m\/d\/Y" );
		echo $_SESSION['time'];
	}
	// get a random md5 hash code
 	function get_random() {
 		echo $_SESSION["formid"] = md5(rand(0,10000000));
 	}
 	// echo the menu...?
 	function display_menu(){
 		echo '
 			<nav>
			<ul id="menu">
				<li><a href="find.php?search=true">Search for a book</a></li>
				<li><a href="add.php">Add a book</a></li>
				<li><a href="view_all.php">Browse Books Alphabetically</a></li>
			</ul>
		<nav>
		';
		// <li><a href="find.php?delete=true">Delete a book</a></li>
		// <li><a href="find.php?update=true">Update a book</a></li>
	}

	function get_single_book( $id ){
		$filename = "books.txt";
		$file = file( $filename );
		foreach( $file as $item ) {
			// $found = preg_match( "/" . $book . "/i", $item, $match );
			$element = explode( "\t", $item );
			if ( $element[0] == $id ){
				// $element = explode( "\t", $item );
				echo "<p class='single_view'>";
				echo '<span id="s-title">' . $element[1] . "</span><br/>";
				echo '<span>by </span>' . $element[2] . "<br/>";
				echo '<img src="#" id="book-img" alt="cover"/><br/>';
				echo '<span>Published by </span>' . $element[3] . "<br/>";
				echo 'ISBN: ' . $element[4] . "<br/>";
				echo '<a href="update.php?id=' . $element[0] . '">Update</a>';
				echo '<a href="remove.php?id=' . $element[0] . '">Delete</a>';
				echo "</p>";
 			}
		}
	}
	// return book items as an associative arrays rather than numerically indexed
	function dev_friendly_books( ){
			$fh = file( "books.txt", "r" );
			// foreach item, set 2 dimensional asscoiative array.
			if ( $book[0] == $id ){
				$book_id = $book[0];
				$title = $book[1];
				$author = $book[2];
				$publisher = $book[3];
				$isbn = $book[4];
			}
	}

	

?>