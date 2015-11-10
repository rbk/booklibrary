<?php
	require( "functions.php" ); 
	$book = search_file_for_id( $_GET['id'] );
	$item = explode( "\t", $book );
	delete_entry( $_GET['id'] );
	header("location:biags_library.php?title=$item[1]&removed=true");
?>