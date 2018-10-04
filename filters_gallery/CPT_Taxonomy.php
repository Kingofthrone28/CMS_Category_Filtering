function register_my_taxes() {

	/**
	 * Taxonomy: Portfolio Categories.
	 */

	$labels = array(
		"name" => __( "Portfolio Categories", "" ),
		"singular_name" => __( "Portfolio Categories", "" ),
		"all_items" => __( "Portfolio Categories", "" ),
		"edit_item" => __( "Portfolio Categories", "" ),
		"view_item" => __( "Portfolio Categories", "" ),
		"add_or_remove_items" => __( "Portfolio Categories", "" ),
	);

	$args = array(
		"label" => __( "Portfolio Categories", "" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Portfolio Categories",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'portfolio_categories', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "portfolio_categories",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "portfolio_categories", array( "portfolio_new" ), $args );
}

add_action( 'init', 'register_my_taxes' );

function register_my_cpts() {

	/**
	 * Post Type: Portfolio.
	 */

	$labels = array(
		"name" => __( "Portfolio", "" ),
		"singular_name" => __( "Portfolio", "" ),
		"edit_item" => __( "Portolio", "" ),
		"view_item" => __( "Portolio", "" ),
		"view_items" => __( "Portolio", "" ),
	);

	$args = array(
		"label" => __( "Portfolio", "" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "portfolio_new", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "portfolio_new", $args );
}

add_action( 'init', 'register_my_cpts' );
