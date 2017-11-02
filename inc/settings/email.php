<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<form method="post" action="edit.php?post_type=exrb_order&page=excursion-booking-settings&tab=email" novalidate="novalidate">
 <input type="hidden" name="exrb_settings_email" value="email">
 <?php wp_nonce_field( 'exrb_email_settings_action', 'exrb_email_settings_nonce' ); ?>
 <?php wp_referer_field(); ?>
 <table class="form-table">
   <tr>
     <th scope="row"><label for="srm_email_from_name"><?php echo __( 'From Name', 'starfish' ); ?></label></th>
     <td><input name="srm_email_from_name" type="text" id="srm_email_from_name" value="<?php echo esc_html(get_option('srm_email_from_name')); ?>" class="regular-text">
     <p class="description" id="srm_email_from_name-description"><?php echo __( 'Name: Uses when email send, support tag {site-name}', 'starfish' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="srm_email_from_email"><?php echo __( 'From Email', 'starfish' ); ?></label></th>
     <td><input name="srm_email_from_email" type="text" id="srm_email_from_email" value="<?php echo esc_html(get_option('srm_email_from_email')); ?>" class="regular-text">
     <p class="description" id="srm_email_from_email-description"><?php echo __( 'Email: Uses when email send, support tag {admin-email}', 'starfish' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="srm_email_subject"><?php echo __( 'Email Subject', 'starfish' ); ?></label></th>
     <td><input name="srm_email_subject" type="text" id="srm_email_subject" value="<?php echo esc_html(get_option('srm_email_subject')); ?>" class="regular-text">
     <p class="description" id="srm_email_subject-description"><?php echo __( 'Email Subject, you can add {funnel-name}', 'starfish' ); ?></p></td>
   </tr>
   <tr>
     <th scope="row"><label for="srm_email_template"><?php echo __( 'Message Template', 'starfish' ); ?></label></th>
     <td><textarea name="srm_email_template" id="srm_email_template" rows="5" cols="60"  placeholder="<?php echo __( '{reveiw-message}', 'starfish' ); ?>"><?php echo esc_html(get_option('srm_email_template')); ?></textarea>
     <p class="description" id="srm_email_template-description"><?php echo __( 'Email template, must need to add {review-message}', 'starfish' ); ?></p></td>
   </tr>
 </table>
 <p class="submit"><input type="submit" name="srm_settings_submit" id="srm_settings_submit" class="button button-primary" value="Save Changes"></p>
</form>
