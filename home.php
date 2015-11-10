<?php 
	require('class-collection.php');
	$collection = new Collection('data.txt');

	$query = "";
	extract( $_GET, EXTR_IF_EXISTS );

?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biags Books</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<script type="text/javascript">
		var $ = function( id ){
			return document.getElementById(id);
		}
		function make_sure( ){
			var yesno = confirm('Are you sure you want to delete this book?')
			if( yesno == false ){
				return false;
			}
		}
	</script>
</head>
	<body>
		<h1>Richard's Books</h1>
		<?php
		$query = "";
			if( isset( $_GET['updated'] ) ){
			echo "<h3>The book was successfully updated!</h3>";
			}
			if( isset( $_GET['new'] ) ){
			echo "<h3>New Book Added!</h3>";
			}
			if( isset( $_GET['deleted'] ) ){
			echo "<h3>Book Deleted :(</h3>";
			}
		?>
		<form method="get" action="home.php?query=<?php echo $query ?>"?>
			<label for="query"> Search</label>
			<input type="text" name="query" id="query" value="<?php if( isset( $_GET['query'] ) ): echo $_GET['query']; endif; ?>" />
			<input type="submit" id="submit" />
		</form>
		<h4><a href="new.php">New Book</a></h4>

 		<table>
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th>ISBN #</th>
				<th colspan="3"></th>

			</tr>
				<?php
					if( isset($_GET['query']) ){
					 $collection->show_books( $_GET['query'] );
					} else {
					 $collection->show_books( $query );
					}
				?>
		</table>
	</body>
</html>