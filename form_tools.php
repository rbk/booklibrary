<?php
	function text_field( $id, $label, $value, $errors ) {
		$class = "";
		if( isset( $errors[$id] ) ) {
			$class = "error_field";
		}

		echo '<div class="' . $class . '">';
		echo '<label for="' . $id . '">' . $label . '</label>';
		echo '<input type="text" name="' . $id . '" id="' . $id . '" value="' . $value . '"/>';
		echo "</div>";
	}

	function data_submitted( $fields ) {
		$all_present = true;

		foreach( $fields as $id => $label ) {
			if( ! isset( $_POST[$id] ) ) {
				$all_present = false;
			}
		}

		return $all_present;
	}

	function validate( $id, $pattern, $msg, $errors ) {
		if( ! preg_match( $pattern, $_POST[$id] ) ) {
			$errors[$id] = $msg;
		}

		return $errors;
	}
?>