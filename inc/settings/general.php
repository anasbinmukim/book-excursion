<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<form method="post" action="edit.php?post_type=exrb_order&page=excursion-booking-settings&tab=general" novalidate="novalidate">
 <input type="hidden" name="exrb_general_settings_page" value="general">
 <?php wp_nonce_field( 'exrb_general_settings_action', 'exrb_general_settings_nonce' ); ?>
 <?php wp_referer_field(); ?>
 <table class="form-table">
   <tr>
     <th scope="row"><label for="exrb_excursion_slug"><?php echo __( 'Excursion Slug', 'excursion_booking' ); ?></label></th>
     <td><input name="exrb_excursion_slug" type="text" id="exrb_excursion_slug" value="<?php echo esc_html(get_option('exrb_excursion_slug')); ?>" class="regular-text">
       <p class="description" id="exrb_excursion_slug-description"><?php echo __( 'Re-save Settings->Permalink if goes 404 page', 'excursion_booking' ); ?></p></td>
   </tr>
 </table>

 <p class="submit"><input type="submit" name="exrb_general_settings_submit" id="exrb_general_settings_submit" class="button button-primary" value="Save Changes"></p>
</form>
