Plugin with Form code functionality

<?php
/*
Plugin Name: WSH Internet Plugin Template
Plugin URI: http://wesitehost.com
Description: WSH Internet WordPress Plugin Template with Shortcode
Version: 1.0
Author: WSH Internet
Author URI: http://wesitehost.com
*/

function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Your Name (required) <br/>';
	echo '<input type="text" name="wsh-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["wsh-name"] ) ? esc_attr( $_POST["wsh-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type="email" name="wsh-email" value="' . ( isset( $_POST["wsh-email"] ) ? esc_attr( $_POST["wsh-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Subject (required) <br/>';
	echo '<input type="text" name="wsh-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["wsh-subject"] ) ? esc_attr( $_POST["wsh-subject"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br/>';
	echo '<textarea rows="10" cols="35" name="wsh-message">' . ( isset( $_POST["wsh-message"] ) ? esc_attr( $_POST["wsh-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="wsh-submitted" value="Send"></p>';
	echo '</form>';
}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['wsh-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["wsh-name"] );
		$email   = sanitize_email( $_POST["wsh-email"] );
		$subject = sanitize_text_field( $_POST["wsh-subject"] );
		$message = esc_textarea( $_POST["wsh-message"] );

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Thanks for contacting me, expect a response soon.</p>';
			echo '</div>';
		} else {
			echo 'An unexpected error occurred';
		}
	}
}

function wsh_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'wsh_plugin_template', 'wsh_shortcode' );

?>
