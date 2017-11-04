<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<form method="post" action="edit.php?post_type=exrb_order&page=excursion-booking-settings&tab=email" novalidate="novalidate">
 <input type="hidden" name="exrb_settings_email" value="email">
 <?php wp_nonce_field( 'exrb_email_settings_action', 'exrb_email_settings_nonce' ); ?>
 <?php wp_referer_field(); ?>

 <h2><?php echo __( 'Booking Order Notification', 'excursion_booking' ); ?></h2>
 <table class="form-table">
   <tr>
     <th scope="row"><label for="exrb_order_notifi_subject"><?php echo __( 'Email Subject', 'excursion_booking' ); ?></label></th>
     <td><input name="exrb_order_notifi_subject" type="text" id="exrb_order_notifi_subject" value="<?php echo esc_html(get_option('exrb_order_notifi_subject')); ?>" class="regular-text">
     <p class="description" id="exrb_order_notifi_subject-description"><?php echo __( 'Email Subject, you can add {excursion-name}', 'excursion_booking' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="exrb_order_notifi_message"><?php echo __( 'Email Message', 'excursion_booking' ); ?></label></th>
     <td><textarea name="exrb_order_notifi_message" id="exrb_order_notifi_message" rows="5" cols="60"  placeholder="<?php echo __( '{booking-details}', 'excursion_booking' ); ?>"><?php echo esc_html(get_option('exrb_order_notifi_message')); ?></textarea>
     <p class="description" id="exrb_order_notifi_message-description"><?php echo __( 'Support Tags: {booking-details}', 'excursion_booking' ); ?></p></td>
   </tr>
 </table>

 <h2><?php echo __( 'Booking Confirmation', 'excursion_booking' ); ?></h2>
 <table class="form-table">
   <tr>
     <th scope="row"><label for="exrb_conf_notifi_subject"><?php echo __( 'Email Subject', 'excursion_booking' ); ?></label></th>
     <td><input name="exrb_conf_notifi_subject" type="text" id="exrb_conf_notifi_subject" value="<?php echo esc_html(get_option('exrb_conf_notifi_subject')); ?>" class="regular-text">
     <p class="description" id="exrb_conf_notifi_subject-description"><?php echo __( 'Email Subject, you can add {excursion-name}', 'excursion_booking' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="exrb_conf_notifi_message"><?php echo __( 'Email Message', 'excursion_booking' ); ?></label></th>
     <td><textarea name="exrb_conf_notifi_message" id="exrb_conf_notifi_message" rows="5" cols="60"  placeholder="<?php echo __( '{booking-details}', 'excursion_booking' ); ?>"><?php echo esc_html(get_option('exrb_conf_notifi_message')); ?></textarea>
     <p class="description" id="exrb_conf_notifi_message-description"><?php echo __( 'Support Tags: {booking-details}', 'excursion_booking' ); ?></p></td>
   </tr>
 </table>

 <h2><?php echo __( 'Email General Settings', 'excursion_booking' ); ?></h2>
 <table class="form-table">
   <tr>
     <th scope="row"><label for="exrb_email_from_name"><?php echo __( 'From Name', 'excursion_booking' ); ?></label></th>
     <td><input name="exrb_email_from_name" type="text" id="exrb_email_from_name" value="<?php echo esc_html(get_option('exrb_email_from_name')); ?>" class="regular-text">
     <p class="description" id="exrb_email_from_name-description"><?php echo __( 'Name: Uses when email send, support tag {site-name}', 'excursion_booking' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="exrb_email_from_email"><?php echo __( 'From Email', 'excursion_booking' ); ?></label></th>
     <td><input name="exrb_email_from_email" type="text" id="exrb_email_from_email" value="<?php echo esc_html(get_option('exrb_email_from_email')); ?>" class="regular-text">
     <p class="description" id="exrb_email_from_email-description"><?php echo __( 'Email: Uses when email send, support tag {admin-email}', 'excursion_booking' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="exrb_email_template"><?php echo __( 'Email Template', 'excursion_booking' ); ?></label></th>
     <td><textarea name="exrb_email_template" id="exrb_email_template" rows="5" cols="60"  placeholder="<?php echo __( '{message}', 'excursion_booking' ); ?>"><?php echo esc_html(get_option('exrb_email_template')); ?></textarea>
     <p class="description" id="exrb_email_template-description"><?php echo __( 'Email template, must need to add {message}', 'excursion_booking' ); ?></p></td>
   </tr>
 </table>
 <p class="submit"><input type="submit" name="exrb_email_settings_submit" id="exrb_email_settings_submit" class="button button-primary" value="Save Changes"></p>
</form>
