<?php
	function load_tracks( $filename ) {
		@$lines = file( $filename );
		$tracks = array( );

		if( $lines ) {
			foreach( $lines as $track ) {
				$data = array( );
				$track_data = explode( "\t", $track );
				$data['id'] = $track_data[0];
				$data['number'] = $track_data[1];
				$data['title'] = $track_data[2];
				$data['duration'] = $track_data[3];
				$data['album'] = $track_data[4];
				$data['artist'] = $track_data[5];
				$data['year'] = $track_data[6];

				array_push( $tracks, $data );
			}
		}

		return $tracks;
	}

	function write_track( $array, $file ) {
		$output = $array['id'] . "\t";
		$output .= $array['number'] . "\t";
		$output .= $array['title'] . "\t";
		$output .= $array['duration'] . "\t";
		$output .= $array['album'] . "\t";
		$output .= $array['artist'] . "\t";
		$output .= trim($array['year']) . "\n";

		fwrite( $file, $output );
	}

	function search( $tracks, $q ) {
		$matches = array( );

		foreach( $tracks as $track ) {
			foreach( $track as $key => $value ) {
				if( $key != "id" && preg_match( '/' . $q . '/i', $value ) ) {
					array_push( $matches, $track );
					break;
				}
			}
		}

		return $matches;
	}
?>