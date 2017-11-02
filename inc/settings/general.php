<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<form method="post" action="edit.php?post_type=exrb_order&page=excursion-booking-settings&tab=general" novalidate="novalidate">
 <input type="hidden" name="exrb_general_settings_page" value="general">
 <?php wp_nonce_field( 'exrb_general_settings_action', 'exrb_general_settings_nonce' ); ?>
 <?php wp_referer_field(); ?>
 <table class="form-table">
   <tr>
     <th scope="row"><label for="srm_review_slug"><?php echo __( 'Review Page Slug', 'starfish' ); ?></label></th>
     <td><input name="srm_review_slug" type="text" id="srm_review_slug" value="<?php echo esc_html(get_option('srm_review_slug')); ?>" class="regular-text">
       <p class="description" id="srm_review_slug-description"><?php echo __( 'Re-save Settings->Permalink if goes 404 page', 'starfish' ); ?></p></td>
   </tr>
 </table>

 <p class="submit"><input type="submit" name="srm_settings_submit" id="srm_settings_submit" class="button button-primary" value="Save Changes"></p>
</form>
