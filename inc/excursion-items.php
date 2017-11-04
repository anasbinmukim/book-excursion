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
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $excursion_slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 10,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports'           => array( 'title' )
	);

	register_post_type( 'excursion', $args );

	// Add new taxonomy, make it hierarchical (like categories)
	$labels_exrb_cat = array(
		'name'              => _x( 'Categories', 'Excursion Categories', 'excursion_booking' ),
		'singular_name'     => _x( 'Category', 'Excursion Category', 'excursion_booking' ),
		'search_items'      => __( 'Search Categories', 'excursion_booking' ),
		'all_items'         => __( 'All Categories', 'excursion_booking' ),
		'parent_item'       => __( 'Parent Category', 'excursion_booking' ),
		'parent_item_colon' => __( 'Parent Category:', 'excursion_booking' ),
		'edit_item'         => __( 'Edit Category', 'excursion_booking' ),
		'update_item'       => __( 'Update Category', 'excursion_booking' ),
		'add_new_item'      => __( 'Add New Category', 'excursion_booking' ),
		'new_item_name'     => __( 'New Category Name', 'excursion_booking' ),
		'menu_name'         => __( 'Categories', 'excursion_booking' ),
	);
	$exrb_cat_slug = esc_html(get_option('exrb_cat_slug'));
	$args_exrb_cat = array(
		'hierarchical'      => true,
		'labels'            => $labels_exrb_cat,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $exrb_cat_slug ),
	);

	register_taxonomy( 'exrb_category', array( 'excursion' ), $args_exrb_cat );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels_exrb_tag = array(
		'name'                       => _x( 'Tags', 'Excursion Tags', 'excursion_booking' ),
		'singular_name'              => _x( 'Tag', 'Excursion Tag', 'excursion_booking' ),
		'search_items'               => __( 'Search Tags', 'excursion_booking' ),
		'popular_items'              => __( 'Popular Tags', 'excursion_booking' ),
		'all_items'                  => __( 'All Tags', 'excursion_booking' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Tag', 'excursion_booking' ),
		'update_item'                => __( 'Update Tag', 'excursion_booking' ),
		'add_new_item'               => __( 'Add New Tag', 'excursion_booking' ),
		'new_item_name'              => __( 'New Tag Name', 'excursion_booking' ),
		'separate_items_with_commas' => __( 'Separate Tags with commas', 'excursion_booking' ),
		'add_or_remove_items'        => __( 'Add or remove Tags', 'excursion_booking' ),
		'choose_from_most_used'      => __( 'Choose from the most used Tags', 'excursion_booking' ),
		'not_found'                  => __( 'No Tags found.', 'excursion_booking' ),
		'menu_name'                  => __( 'Tags', 'excursion_booking' ),
	);
	$exrb_tag_slug = esc_html(get_option('exrb_tag_slug'));
	$args_exrb_tag = array(
		'hierarchical'          => false,
		'labels'                => $labels_exrb_tag,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => $exrb_tag_slug ),
	);

	register_taxonomy( 'exrb_tag', 'excursion', $args_exrb_tag );
}
