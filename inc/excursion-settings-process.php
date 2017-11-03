<?php
//notice-error, notice-warning, notice-success, or notice-info  updated is-dismissible
function notice_data_successfully_saved(){
  $class = 'notice updated is-dismissible';
	$message = __( 'Settings saved.', 'excursion_booking' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

function notice_data_nonce_verify_required(){
  $class = 'notice notice-error is-dismissible';
	$message = __( 'Nonce unverified! Try again.', 'excursion_booking' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

add_action( 'admin_init', 'exrb_process_backend_data_saving');
function exrb_process_backend_data_saving(){
    if ( isset($_POST['exrb_general_settings_submit']) && (! isset( $_POST['exrb_general_settings_nonce'] ) || ! wp_verify_nonce( $_POST['exrb_general_settings_nonce'], 'exrb_general_settings_action' ) ) ) {
      //Verifiy not match..
      add_action( 'admin_notices', 'notice_data_nonce_verify_required');
    } else {
        if(isset($_POST['exrb_general_settings_submit'])){
           update_option('exrb_excursion_slug', sanitize_title_with_dashes($_POST['exrb_excursion_slug']));
           add_action( 'admin_notices', 'notice_data_successfully_saved');
        }
    }
}
