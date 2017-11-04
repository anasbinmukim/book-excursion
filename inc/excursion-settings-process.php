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
           update_option('exrb_cat_slug', sanitize_title_with_dashes($_POST['exrb_cat_slug']));
           update_option('exrb_tag_slug', sanitize_title_with_dashes($_POST['exrb_tag_slug']));
           update_option('exrb_order_slug', sanitize_title_with_dashes($_POST['exrb_order_slug']));
           add_action( 'admin_notices', 'notice_data_successfully_saved');
        }
    }

    if ( isset($_POST['exrb_email_settings_submit']) && (! isset( $_POST['exrb_email_settings_nonce'] ) || ! wp_verify_nonce( $_POST['exrb_email_settings_nonce'], 'exrb_email_settings_action' ) ) ) {
      //Verifiy not match..
      add_action( 'admin_notices', 'notice_data_nonce_verify_required');
    } else {
        if(isset($_POST['exrb_email_settings_submit'])){

           //Order receive notification
           update_option('exrb_order_notifi_subject', sanitize_text_field($_POST['exrb_order_notifi_subject']));
           update_option('exrb_order_notifi_message', wp_kses_post($_POST['exrb_order_notifi_message']));

           //Booking Confirmation notification
           update_option('exrb_conf_notifi_subject', sanitize_text_field($_POST['exrb_conf_notifi_subject']));
           update_option('exrb_conf_notifi_message', wp_kses_post($_POST['exrb_conf_notifi_message']));

           //Email template settings
           update_option('exrb_email_from_name', sanitize_text_field($_POST['exrb_email_from_name']));
           update_option('exrb_email_from_email', sanitize_text_field($_POST['exrb_email_from_email']));
           update_option('exrb_email_template', wp_kses_post($_POST['exrb_email_template']));
           add_action( 'admin_notices', 'notice_data_successfully_saved');
        }
    }
}
