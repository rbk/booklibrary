<?php 
	require('class-collection.php');
	require('form_tools.php');
	$collection = new Collection('data.txt');

	$id = "";
	extract( $_GET, EXTR_IF_EXISTS );


	if( ! empty( $id ) ){
		// delete entry
		$delete = $collection->delete_book( $id );
		header("location:home.php?deleted=1");
	}

?>

	