<?php require('class-collection.php'); ?>
<?php $collection = new Collection('data.txt'); ?>
<!DOCtype html>
<html lang="EN">
<head>
	<title>Biags Books</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
</head>
	<body>
		<h1>Richard's Books</h1>
		<?php
			if( isset( $_GET['id'] ) ){
				$book = $collection->get_single_book( $_GET['id'] );
				echo '<h2>' . $book->title . '</h2>';
				echo '<h4>by ' . $book->author . '</h4><br/>';
				echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae pulvinar urna. Nulla iaculis tellus sit amet nunc tincidunt sollicitudin. Nullam euismod nibh eget nunc mollis laoreet suscipit elit blandit. Fusce tempus, quam et condimentum fringilla, leo sapien volutpat felis, ac tristique nulla sem eget urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id urna diam, ut aliquam massa. Pellentesque et augue velit, in varius ligula.';
			}	
		?>
		<h4><a href="home.php">Back</a></h4>
	</body>
</html>