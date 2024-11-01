<?php 
	//Portfolio Post Type Starts
    function tnit_portolfio_post_type() {

        $labels = array(
            'name'                  => __( 'Portfolio Post Type', 'Post Type General Name', 'fl-builder' ),
            'singular_name'         => __( 'Portfolio Post Type', 'Post Type Singular Name', 'fl-builder' ),
            'menu_name'             => __( 'Portfolio', 'fl-builder'),
            'name_admin_bar'        => __( 'Post Type', 'fl-builder'),
            'archives'              => __( 'Portfolio Archives', 'fl-builder' ),
            'parent_item_colon'     => __( 'Parent Item:', 'fl-builder' ),
            'all_items'             => __( 'All Portfolios', 'fl-builder'),
            'add_new_item'          => __( 'Add New Portfolio', 'fl-builder'),
            'add_new'               => __( 'Add New', 'fl-builder'),
            'new_item'              => __( 'New Portfolio', 'fl-builder' ),
            'edit_item'             => __( 'Edit Portfolio', 'fl-builder' ),
            'update_item'           => __( 'Update Portfolio', 'fl-builder' ),
            'view_item'             => __( 'View Portfolio', 'fl-builder' ),
            'search_items'          => __( 'Search Portfolio', 'fl-builder' ),
            'not_found'             => __( 'Not found', 'fl-builder'),
            'not_found_in_trash'    => __( 'Not found in Trash', 'fl-builder' ),
            'featured_image'        => __( 'Featured Image', 'fl-builder'),
            'set_featured_image'    => __( 'Set featured image', 'fl-builder' ),
            'remove_featured_image' => __( 'Remove featured image', 'fl-builder' ),
            'use_featured_image'    => __( 'Use as featured image'),
            'insert_into_item'      => __( 'Insert into Portfolio', 'fl-builder'),
            'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'fl-builder'),
            'items_list'            => __( 'Portfolios list', 'fl-builder' ),
            'items_list_navigation' => __( 'Portfolios list navigation', 'fl-builder'),
            'filter_items_list'     => __( 'Filter Portfolios list', 'fl-builder'),
        );
		
        $args = array(
            'label'                 => __( 'Portfolio', 'fl-builder' ),
            'description'           => __( 'Portfolio Post type to add portfolio of your work', 'fl-builder' ),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail' ),
            'taxonomies'            => array( 'portfolio_category'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
        );
		
        register_post_type( 'portfolio', $args );
		
    }
    add_action( 'init', 'tnit_portolfio_post_type', 0 );

	//adding taxonomy to portfolio post type
    function tnit_portolfio_post_type_taxonomy() {

        $labels = array(
            'name'                       => __( 'Portfolio Categories', 'Taxonomy General Name', 'fl-builder' ),
            'singular_name'              => __( 'Portfolio', 'Taxonomy Singular Name', 'fl-builder' ),
            'menu_name'                  => __( 'Portfolio Categories', 'fl-builder' ),
            'all_items'                  => __( 'All Portfolio Category', 'fl-builder'),
            'parent_item'                => __( 'Parent Item', 'fl-builder' ),
            'parent_item_colon'          => __( 'Parent Item:', 'fl-builder'),
            'new_item_name'              => __( 'New Category Name', 'fl-builder'),
            'add_new_item'               => __( 'Add New Portfolio Category', 'fl-builder'),
            'edit_item'                  => __( 'Edit Portfolio Category', 'fl-builder'),
            'update_item'                => __( 'Update Portfolio Category', 'fl-builder' ),
            'view_item'                  => __( 'View Portfolio Category', 'fl-builder'),
            'separate_items_with_commas' => __( 'Separate Portfolio Category with commas', 'fl-builder' ),
            'add_or_remove_items'        => __( 'Add or remove Portfolio Category', 'fl-builder' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'fl-builder'),
            'popular_items'              => __( 'Popular Portfolio Categories', 'fl-builder' ),
            'search_items'               => __( 'Search Portfolio Categories', 'fl-builder'),
            'not_found'                  => __( 'Not Found', 'fl-builder'),
            'no_terms'                   => __( 'No Portfolio Category', 'fl-builder' ),
            'items_list'                 => __( 'Portfolio Categories list', 'fl-builder' ),
            'items_list_navigation'      => __( 'Portfolio Categories list navigation', 'fl-builder' ),        
		);
		
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
		
        register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

    }
    add_action( 'init', 'tnit_portolfio_post_type_taxonomy', 0 );
	//Portfolio Post Type Ends
?>