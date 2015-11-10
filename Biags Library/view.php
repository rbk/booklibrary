<?php require( "functions.php" ); ?>
<!DOCtype html>
 <html lang="EN">
 <head>
 	<title>Biags Library</title>
 	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
 	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="myjquery.js"></script>
 </head>
 	<body>
 		<div class="container">
 			<h1><a href="biags_library.php">Biag's Library</a></h1>
 			<?php if( isset( $_GET['id'] ) ){
 				get_single_book( $_GET['id'] );
 			}
 			display_menu();
 			?>

 
 		</div>
 	</body>
 </html> 