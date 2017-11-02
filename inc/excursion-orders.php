<?php
add_action( 'init', 'exrb_register_excursion_order_cpt' );
/**
 * Register a Excursion post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function exrb_register_excursion_order_cpt() {
	$labels = array(
		'name'               => _x( 'Excursion Orders', 'post type general name', 'excursion_booking' ),
		'singular_name'      => _x( 'Excursion Order', 'post type singular name', 'excursion_booking' ),
		'menu_name'          => _x( 'Booking', 'admin menu', 'excursion_booking' ),
		'name_admin_bar'     => _x( 'Excursion Order', 'add new on admin bar', 'excursion_booking' ),
		'add_new'            => _x( 'Add New', 'Excursion Order', 'excursion_booking' ),
		'add_new_item'       => __( 'Add New Excursion Order', 'excursion_booking' ),
		'new_item'           => __( 'New Excursion Order', 'excursion_booking' ),
		'edit_item'          => __( 'Edit Excursion Order', 'excursion_booking' ),
		'view_item'          => __( 'View Excursion Order', 'excursion_booking' ),
		'all_items'          => __( 'All Orders', 'excursion_booking' ),
		'search_items'       => __( 'Search Excursion Orders', 'excursion_booking' ),
		'parent_item_colon'  => __( 'Parent Excursion Orders:', 'excursion_booking' ),
		'not_found'          => __( 'No Excursion Orders found.', 'excursion_booking' ),
		'not_found_in_trash' => __( 'No Excursion Orders found in Trash.', 'excursion_booking' )
	);
	$excursion_order_slug = esc_html(get_option('exrb_excursion_order_slug'));
	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'excursion_booking' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $excursion_order_slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 100,
		'supports'           => array( 'title' )
	);

	register_post_type( 'exrb_order', $args );
}
