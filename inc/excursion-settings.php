<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="wrap">
  <?php
  $active_tab_general = $active_tab_email = '';
  if(isset($_GET['tab']) && ($_GET['tab'] == 'general')){
    $tab_slug = 'general';
    $active_tab_general = 'nav-tab-active';
    ?><h2><span class="dashicons dashicons-admin-settings"></span> <?php echo __( 'Excursion Booking General Settings', 'excursion_booking' ); ?></h2><?php
  }elseif(isset($_GET['tab']) && ($_GET['tab'] == 'email')){
    $tab_slug = 'email';
    $active_tab_email = 'nav-tab-active';
    ?><h2><span class="dashicons dashicons-email-alt"></span> <?php echo __( 'Excursion Booking Email Settings', 'excursion_booking' ); ?></h2><?php
  }else{
    $tab_slug = 'general';
    $active_tab_general = 'nav-tab-active';
    ?><h2><span class="dashicons dashicons-admin-settings"></span> <?php echo __( 'Excursion Booking General Settings', 'excursion_booking' ); ?></h2><?php
  }
  ?>
 <h2 class="nav-tab-wrapper">
   <?php
   echo '<a class="nav-tab ' . $active_tab_general . '" href="edit.php?post_type=exrb_order&page=excursion-booking-settings&tab=general">General</a>';
   echo '<a class="nav-tab ' . $active_tab_email . '" href="edit.php?post_type=exrb_order&page=excursion-booking-settings&tab=email">Email</a>';
   ?>
 </h2>
<?php
  if($tab_slug == 'general'){
      require_once('settings/general.php');
  }
  if($tab_slug == 'email'){
      require_once('settings/email.php');
  }
?>
</div>
