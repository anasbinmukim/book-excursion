<?php
add_action( 'init', 'exrb_register_excursion_items_cpt' );
/**
 * Register a Excursion post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function exrb_register_excursion_items_cpt() {
	$labels = array(
		'name'               => _x( 'Excursions', 'post type general name', 'excursion_booking' ),
		'singular_name'      => _x( 'Excursion', 'post type singular name', 'excursion_booking' ),
		'menu_name'          => _x( 'Excursions', 'admin menu', 'excursion_booking' ),
		'name_admin_bar'     => _x( 'Excursion', 'add new on admin bar', 'excursion_booking' ),
		'add_new'            => _x( 'Add New', 'Excursion', 'excursion_booking' ),
		'add_new_item'       => __( 'Add New Excursion', 'excursion_booking' ),
		'new_item'           => __( 'New Excursion', 'excursion_booking' ),
		'edit_item'          => __( 'Edit Excursion', 'excursion_booking' ),
		'view_item'          => __( 'View Excursion', 'excursion_booking' ),
		'all_items'          => __( 'All Excursions', 'excursion_booking' ),
		'search_items'       => __( 'Search Excursions', 'excursion_booking' ),
		'parent_item_colon'  => __( 'Parent Excursions:', 'excursion_booking' ),
		'not_found'          => __( 'No Excursions found.', 'excursion_booking' ),
		'not_found_in_trash' => __( 'No Excursions found in Trash.', 'excursion_booking' )
	);
	$excursion_slug = esc_html(get_option('exrb_excursion_slug'));
	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'excursion_booking' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => 'edit.php?post_type=exrb_order',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $excursion_slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 100,
		'supports'           => array( 'title' )
	);

	register_post_type( 'excursion', $args );
}
