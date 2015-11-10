<?php
	
	class Collection {

		private $data = array();

		function __construct( $filename ){
			$file = file( $filename );
			foreach( $file as $line ){
				array_push( $this->data, new Book( explode( "\t", $line ) ) );
			}
		}
		// returns all data as an object
		public function books( ) {
			return $this->data;
		}

		// returns an instance of a book
		public function get_single_book( $id ){
			foreach( $this->data as $book ){
				if( $id == $book->id ){
					return $book;
				}
			}
			return false;
		}

		// returns the count of lines in data plus 1
		public function get_high_id( ){
			$high = count( $this->data );
			return $high + 1;
		}

		// determines how book will be formatted in the file
		public function format_data( $array ){
			$output = "";
			foreach( $array as $data ){
				$output .= "$data\t";
			}
			$output .= "\n";
			return $output;
		}
		// writes to file if file exists
		public function write_to_file( $string ){
			$file = fopen( 'data.txt', 'a' );
			if( $file ){
				fwrite( $file, $this->get_high_id() . "\t" .  $string );
				fclose( $file );
				return true;
			} else {
				return false;
			}
		}

		// checks all fields for values... it doesn't matter what they put in those fields in this particlular case
		public function validate( $array, &$errors ){
			foreach( $array as $key => $value ){
				if( empty( $value ) ){
					$errors[$key] = "error";
 				} 
			}
			if( count( $errors ) > 0 ){
					return false;
			}
			return true;
		}
		public function show_books( $query = "aeiou" ){
				$found = "";
				$result = "";
				foreach( $this->books( ) as $key => $book ) {

					foreach( Book::$labels as $name => $label ){
						$found = preg_match( "/" . $query . "/i", $book->$name , $match );
						if( $found ){
							break;
						}
					}
					if( $found ) {
						echo '<tr>';
						echo '<td>' . $book->title . '</td>';
						echo '<td>' . $book->author . '</td>';
						echo '<td>' . $book->publisher . '</td>';
						echo '<td>' . $book->isbn . '</td>';
						echo '<td><a href="edit.php?id=' . $book->id . '">Edit</a></td>';
						echo '<td><a href="view.php?id=' . $book->id . '">View</a></td>';
						echo '<td><a onclick="return make_sure(this)" href="delete.php?id=' . $book->id . '">Delete</a></td>';
						echo '</tr>';
					}
				}	
		}
		// update
		public function update_book( $string, $id ){
			$new = $id . "\t" . $string;
			$file = file( 'data.txt' );
			$x = 0;
			for( $x=0; $x < count( $file ); $x++ ){
				$book = explode("\t", $file[$x] );
				if( $book[0] == $id ){
					$file[$x] = $new;
				}
			}
			$this->rewrite_file( $file );
		}
		// delete a book ....
		public function delete_book( $id ){
			$file = file( 'data.txt' );
				for( $x=0; $x < count( $file ); $x++ ){
					$book = explode("\t", $file[$x] );
					if( $book[0] == $id ){
						unset( $file[$x] );
					}
				}
				$this->rewrite_file( $file );
			}
		// rewrite file ... 
		public function rewrite_file( $array ){
			$x = 1;
			
			$file = fopen( "data.txt", "w" );
			foreach( $array as $line ){
				$book = explode( "\t", trim($line) );
				fwrite( $file, "$x\t$book[1]\t$book[2]\t$book[3]\t$book[4]\n" );
				$x++;
			}
			fclose( $file );
			return true;
		}

	} // end class

	class Book {
		
		private $book = array( );

		function __construct( $array ){
			$this->book['id'] = 		$array[0];
			$this->book['title'] = 		$array[1];
			$this->book['author'] = 	$array[2];
			$this->book['publisher'] = 	$array[3];
			$this->book['isbn'] = 		$array[4];
		}

		public function __get( $name ) {
			return $this->book[$name];
		}

		public static $labels = array(
			'title' => 'Title',
			'author' => 'Author',
			'publisher' => 'Publisher',
			'isbn' => 'ISBN'
		);
	} // end class
	
?>