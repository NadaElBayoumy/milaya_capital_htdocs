<?php
function enqueue_parent_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

//remove default post from menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );//posts
    remove_menu_page( 'index.php' );//dashboard
    remove_menu_page( 'edit.php?post_type=page' );//pages
    remove_menu_page( 'tools.php' );//tools
    remove_menu_page( 'themes.php' );//appearance
    remove_menu_page( 'edit-comments.php' );//comments
}

//remove metabox for category and tags
if (is_admin()) :
function my_remove_meta_boxes() {
    if( current_user_can('manage_options') ) {
    $custom_post_types = get_post_types( array( 'public' => true ), 'objects');

        foreach ( $custom_post_types as $custom_post_type ) {

            $exclude = array( 'information' ); //<---Replace information with your own post type

            if( TRUE === in_array( $custom_post_type->name, $exclude ) )
            continue;

            $posttypes = $custom_post_type->name;

            remove_meta_box('tagsdiv-post_tag', $posttypes, 'normal');
            remove_meta_box('categorydiv', $posttypes, 'normal');
        }
    }
}
endif;

add_action( 'admin_menu', 'my_remove_meta_boxes' );



// Register Custom Post Type
function custom_page_section_post_type() {

    $labels = array(
        'name'                  => _x( 'Home Page Sections', 'Post Type General Name', 'page_section' ),
        'singular_name'         => _x( 'Home Page Section', 'Post Type Singular Name', 'page_section' ),
        'menu_name'             => __( 'Home Page Sections', 'page_section' ),
        'name_admin_bar'        => __( 'Home Page Section', 'page_section' ),
        'archives'              => __( 'Home Page Section Archives', 'page_section' ),
        'attributes'            => __( 'Home Page Section Attributes', 'page_section' ),
        'parent_item_colon'     => __( 'Parent Page Section:', 'page_section' ),
        'all_items'             => __( 'All Page Sections', 'page_section' ),
        'add_new_item'          => __( 'Add New Page Section', 'page_section' ),
        'add_new'               => __( 'Add New', 'page_section' ),
        'new_item'              => __( 'New Page Section', 'page_section' ),
        'edit_item'             => __( 'Edit Page Section', 'page_section' ),
        'update_item'           => __( 'Update Page Section', 'page_section' ),
        'view_item'             => __( 'View Page Section', 'page_section' ),
        'view_items'            => __( 'View Page Sections', 'page_section' ),
        'search_items'          => __( 'Search Page Sections', 'page_section' ),
        'not_found'             => __( 'Not found', 'page_section' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'page_section' ),
        'featured_image'        => __( 'Featured Image', 'page_section' ),
        'set_featured_image'    => __( 'Set featured image', 'page_section' ),
        'remove_featured_image' => __( 'Remove featured image', 'page_section' ),
        'use_featured_image'    => __( 'Use as featured image', 'page_section' ),
        'insert_into_item'      => __( 'Insert into item', 'page_section' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'page_section' ),
        'items_list'            => __( 'Page Sections list', 'page_section' ),
        'items_list_navigation' => __( 'Page Sections list navigation', 'page_section' ),
        'filter_items_list'     => __( 'Filter Page Sections list', 'page_section' ),
    );
    $args = array(
        'label'                 => __( 'Page Section', 'page_section' ),
        'description'           => __( 'Custom Page Sections for your website', 'page_section' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor',  'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-admin-home', 

    );
    register_post_type( 'page_section', $args );

}
add_action( 'init', 'custom_page_section_post_type', 0 );



// Register Custom Post Type
function custom_what_we_do_post_type() {

    $labels = array(
        'name'                  => _x( 'What We Do', 'Post Type General Name', 'what_we_do' ),
        'singular_name'         => _x( 'What We Do', 'Post Type Singular Name', 'what_we_do' ),
        'menu_name'             => __( 'What We Do', 'what_we_do' ),
        'name_admin_bar'        => __( 'What We Do', 'what_we_do' ),
        'archives'              => __( 'What We Do Archives', 'what_we_do' ),
        'attributes'            => __( 'What We Do Attributes', 'what_we_do' ),
        'parent_item_colon'     => __( 'Parent What We Do:', 'what_we_do' ),
        'all_items'             => __( 'All What We Do', 'what_we_do' ),
        'add_new_item'          => __( 'Add New What We Do', 'what_we_do' ),
        'add_new'               => __( 'Add New', 'what_we_do' ),
        'new_item'              => __( 'New What We Do', 'what_we_do' ),
        'edit_item'             => __( 'Edit What We Do', 'what_we_do' ),
        'update_item'           => __( 'Update What We Do', 'what_we_do' ),
        'view_item'             => __( 'View What We Do', 'what_we_do' ),
        'view_items'            => __( 'View What We Do', 'what_we_do' ),
        'search_items'          => __( 'Search What We Do', 'what_we_do' ),
        'not_found'             => __( 'Not found', 'what_we_do' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'what_we_do' ),
        'featured_image'        => __( 'Featured Image', 'what_we_do' ),
        'set_featured_image'    => __( 'Set featured image', 'what_we_do' ),
        'remove_featured_image' => __( 'Remove featured image', 'what_we_do' ),
        'use_featured_image'    => __( 'Use as featured image', 'what_we_do' ),
        'insert_into_item'      => __( 'Insert into item', 'what_we_do' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'what_we_do' ),
        'items_list'            => __( 'What We Do list', 'what_we_do' ),
        'items_list_navigation' => __( 'What We Do list navigation', 'what_we_do' ),
        'filter_items_list'     => __( 'Filter What We Do list', 'what_we_do' ),
    );
    $args = array(
        'label'                 => __( 'What We Do', 'what_we_do' ),
        'description'           => __( 'Custom content for "What We Do" on your website', 'what_we_do' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-admin-customizer', 
    );
    register_post_type( 'what_we_do', $args );

}
add_action( 'init', 'custom_what_we_do_post_type', 0 );


// Register Custom Post Type
function custom_business_heights_post_type() {

    $labels = array(
        'name'                  => _x( 'Business Heights', 'Post Type General Name', 'business_heights' ),
        'singular_name'         => _x( 'Business Height', 'Post Type Singular Name', 'business_heights' ),
        'menu_name'             => __( 'Business Heights', 'business_heights' ),
        'name_admin_bar'        => __( 'Business Height', 'business_heights' ),
        'archives'              => __( 'Business Heights Archives', 'business_heights' ),
        'attributes'            => __( 'Business Heights Attributes', 'business_heights' ),
        'parent_item_colon'     => __( 'Parent Business Height:', 'business_heights' ),
        'all_items'             => __( 'All Business Heights', 'business_heights' ),
        'add_new_item'          => __( 'Add New Business Height', 'business_heights' ),
        'add_new'               => __( 'Add New', 'business_heights' ),
        'new_item'              => __( 'New Business Height', 'business_heights' ),
        'edit_item'             => __( 'Edit Business Height', 'business_heights' ),
        'update_item'           => __( 'Update Business Height', 'business_heights' ),
        'view_item'             => __( 'View Business Height', 'business_heights' ),
        'view_items'            => __( 'View Business Heights', 'business_heights' ),
        'search_items'          => __( 'Search Business Heights', 'business_heights' ),
        'not_found'             => __( 'Not found', 'business_heights' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'business_heights' ),
        'featured_image'        => __( 'Featured Image', 'business_heights' ),
        'set_featured_image'    => __( 'Set featured image', 'business_heights' ),
        'remove_featured_image' => __( 'Remove featured image', 'business_heights' ),
        'use_featured_image'    => __( 'Use as featured image', 'business_heights' ),
        'insert_into_item'      => __( 'Insert into item', 'business_heights' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'business_heights' ),
        'items_list'            => __( 'Business Heights list', 'business_heights' ),
        'items_list_navigation' => __( 'Business Heights list navigation', 'business_heights' ),
        'filter_items_list'     => __( 'Filter Business Heights list', 'business_heights' ),
    );
    $args = array(
        'label'                 => __( 'Business Height', 'business_heights' ),
        'description'           => __( 'Custom content for "Business Heights" on your website', 'business_heights' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-welcome-learn-more', 
    );
    register_post_type( 'business_heights', $args );

}
add_action( 'init', 'custom_business_heights_post_type', 0 );



// Register Custom Post Type
function custom_why_choose_post_type() {

    $labels = array(
        'name'                  => _x( 'Why Choose', 'Post Type General Name', 'why_choose' ),
        'singular_name'         => _x( 'Why Choose', 'Post Type Singular Name', 'why_choose' ),
        'menu_name'             => __( 'Why Choose', 'why_choose' ),
        'name_admin_bar'        => __( 'Why Choose', 'why_choose' ),
        'archives'              => __( 'Why Choose Archives', 'why_choose' ),
        'attributes'            => __( 'Why Choose Attributes', 'why_choose' ),
        'parent_item_colon'     => __( 'Parent Why Choose:', 'why_choose' ),
        'all_items'             => __( 'All Why Choose', 'why_choose' ),
        'add_new_item'          => __( 'Add New Why Choose', 'why_choose' ),
        'add_new'               => __( 'Add New', 'why_choose' ),
        'new_item'              => __( 'New Why Choose', 'why_choose' ),
        'edit_item'             => __( 'Edit Why Choose', 'why_choose' ),
        'update_item'           => __( 'Update Why Choose', 'why_choose' ),
        'view_item'             => __( 'View Why Choose', 'why_choose' ),
        'view_items'            => __( 'View Why Choose', 'why_choose' ),
        'search_items'          => __( 'Search Why Choose', 'why_choose' ),
        'not_found'             => __( 'Not found', 'why_choose' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'why_choose' ),
        'featured_image'        => __( 'Featured Image', 'why_choose' ),
        'set_featured_image'    => __( 'Set featured image', 'why_choose' ),
        'remove_featured_image' => __( 'Remove featured image', 'why_choose' ),
        'use_featured_image'    => __( 'Use as featured image', 'why_choose' ),
        'insert_into_item'      => __( 'Insert into item', 'why_choose' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'why_choose' ),
        'items_list'            => __( 'Why Choose list', 'why_choose' ),
        'items_list_navigation' => __( 'Why Choose list navigation', 'why_choose' ),
        'filter_items_list'     => __( 'Filter Why Choose list', 'why_choose' ),
    );
    $args = array(
        'label'                 => __( 'Why Choose', 'why_choose' ),
        'description'           => __( 'Custom content for "Why Choose" on your website', 'why_choose' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-info-outline', 
    );
    register_post_type( 'why_choose', $args );

}
add_action( 'init', 'custom_why_choose_post_type', 0 );

// Register Custom Post Type
function custom_clients_post_type() {

    $labels = array(
        'name'                  => _x( 'Clients', 'Post Type General Name', 'clients' ),
        'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'clients' ),
        'menu_name'             => __( 'Clients', 'clients' ),
        'name_admin_bar'        => __( 'Client', 'clients' ),
        'archives'              => __( 'Clients Archives', 'clients' ),
        'attributes'            => __( 'Client Attributes', 'clients' ),
        'parent_item_colon'     => __( 'Parent Client:', 'clients' ),
        'all_items'             => __( 'All Clients', 'clients' ),
        'add_new_item'          => __( 'Add New Client', 'clients' ),
        'add_new'               => __( 'Add New', 'clients' ),
        'new_item'              => __( 'New Client', 'clients' ),
        'edit_item'             => __( 'Edit Client', 'clients' ),
        'update_item'           => __( 'Update Client', 'clients' ),
        'view_item'             => __( 'View Client', 'clients' ),
        'view_items'            => __( 'View Clients', 'clients' ),
        'search_items'          => __( 'Search Clients', 'clients' ),
        'not_found'             => __( 'Not found', 'clients' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'clients' ),
        'featured_image'        => __( 'Featured Image', 'clients' ),
        'set_featured_image'    => __( 'Set featured image', 'clients' ),
        'remove_featured_image' => __( 'Remove featured image', 'clients' ),
        'use_featured_image'    => __( 'Use as featured image', 'clients' ),
        'insert_into_item'      => __( 'Insert into item', 'clients' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'clients' ),
        'items_list'            => __( 'Clients list', 'clients' ),
        'items_list_navigation' => __( 'Clients list navigation', 'clients' ),
        'filter_items_list'     => __( 'Filter Clients list', 'clients' ),
    );
    $args = array(
        'label'                 => __( 'Client', 'clients' ),
        'description'           => __( 'Custom content for "Clients" on your website', 'clients' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-businessperson', 
    );
    register_post_type( 'clients', $args );

}
add_action( 'init', 'custom_clients_post_type', 0 );


function custom_page_overview_post_type() {

    $labels = array(
        'name'                  => _x( 'Page Overview', 'Post Type General Name', 'page_overview' ),
        'singular_name'         => _x( 'Page Overview', 'Post Type Singular Name', 'page_overview' ),
        'menu_name'             => __( 'Page Overview', 'page_overview' ),
        'name_admin_bar'        => __( 'Page Overview', 'page_overview' ),
        'archives'              => __( 'Page Overview Archives', 'page_overview' ),
        'attributes'            => __( 'Page Overview Attributes', 'page_overview' ),
        'parent_item_colon'     => __( 'Parent Page Overview:', 'page_overview' ),
        'all_items'             => __( 'All Page Overviews', 'page_overview' ),
        'add_new_item'          => __( 'Add New Page Overview', 'page_overview' ),
        'add_new'               => __( 'Add New', 'page_overview' ),
        'new_item'              => __( 'New Page Overview', 'page_overview' ),
        'edit_item'             => __( 'Edit Page Overview', 'page_overview' ),
        'update_item'           => __( 'Update Page Overview', 'page_overview' ),
        'view_item'             => __( 'View Page Overview', 'page_overview' ),
        'view_items'            => __( 'View Page Overviews', 'page_overview' ),
        'search_items'          => __( 'Search Page Overviews', 'page_overview' ),
        'not_found'             => __( 'Not found', 'page_overview' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'page_overview' ),
        'featured_image'        => __( 'Featured Image', 'page_overview' ),
        'set_featured_image'    => __( 'Set featured image', 'page_overview' ),
        'remove_featured_image' => __( 'Remove featured image', 'page_overview' ),
        'use_featured_image'    => __( 'Use as featured image', 'page_overview' ),
        'insert_into_item'      => __( 'Insert into item', 'page_overview' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'page_overview' ),
        'items_list'            => __( 'Page Overview list', 'page_overview' ),
        'items_list_navigation' => __( 'Page Overview list navigation', 'page_overview' ),
        'filter_items_list'     => __( 'Filter Page Overview list', 'page_overview' ),
    );
    $args = array(
        'label'                 => __( 'Page Overview', 'page_overview' ),
        'description'           => __( 'Custom content for "Page Overview" on your website', 'page_overview' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-media-document', 
    );
    register_post_type( 'page_overview', $args );

}
add_action( 'init', 'custom_page_overview_post_type', 0 );

function custom_about_page_sections_post_type() {

    $labels = array(
        'name'                  => _x( 'About Page Sections', 'Post Type General Name', 'about_page_sections' ),
        'singular_name'         => _x( 'About Page Section', 'Post Type Singular Name', 'about_page_sections' ),
        'menu_name'             => __( 'About Page Sections', 'about_page_sections' ),
        'name_admin_bar'        => __( 'About Page Section', 'about_page_sections' ),
        'archives'              => __( 'About Page Sections Archives', 'about_page_sections' ),
        'attributes'            => __( 'About Page Section Attributes', 'about_page_sections' ),
        'parent_item_colon'     => __( 'Parent About Page Section:', 'about_page_sections' ),
        'all_items'             => __( 'All About Page Sections', 'about_page_sections' ),
        'add_new_item'          => __( 'Add New About Page Section', 'about_page_sections' ),
        'add_new'               => __( 'Add New', 'about_page_sections' ),
        'new_item'              => __( 'New About Page Section', 'about_page_sections' ),
        'edit_item'             => __( 'Edit About Page Section', 'about_page_sections' ),
        'update_item'           => __( 'Update About Page Section', 'about_page_sections' ),
        'view_item'             => __( 'View About Page Section', 'about_page_sections' ),
        'view_items'            => __( 'View About Page Sections', 'about_page_sections' ),
        'search_items'          => __( 'Search About Page Sections', 'about_page_sections' ),
        'not_found'             => __( 'Not found', 'about_page_sections' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'about_page_sections' ),
        'featured_image'        => __( 'Featured Image', 'about_page_sections' ),
        'set_featured_image'    => __( 'Set featured image', 'about_page_sections' ),
        'remove_featured_image' => __( 'Remove featured image', 'about_page_sections' ),
        'use_featured_image'    => __( 'Use as featured image', 'about_page_sections' ),
        'insert_into_item'      => __( 'Insert into item', 'about_page_sections' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'about_page_sections' ),
        'items_list'            => __( 'About Page Sections list', 'about_page_sections' ),
        'items_list_navigation' => __( 'About Page Sections list navigation', 'about_page_sections' ),
        'filter_items_list'     => __( 'Filter About Page Sections list', 'about_page_sections' ),
    );
    $args = array(
        'label'                 => __( 'About Page Section', 'about_page_sections' ),
        'description'           => __( 'Custom content for "About Page Sections" on your website', 'about_page_sections' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-editor-spellcheck', 
    );
    register_post_type( 'about_page_sections', $args );

}
add_action( 'init', 'custom_about_page_sections_post_type', 0 );

// Register Custom Post Type
function custom_counters_post_type() {

    $labels = array(
        'name'                  => _x( 'Counters', 'Post Type General Name', 'counters' ),
        'singular_name'         => _x( 'Counter', 'Post Type Singular Name', 'counters' ),
        'menu_name'             => __( 'Counters', 'counters' ),
        'name_admin_bar'        => __( 'Counter', 'counters' ),
        'archives'              => __( 'Counters Archives', 'counters' ),
        'attributes'            => __( 'Counter Attributes', 'counters' ),
        'parent_item_colon'     => __( 'Parent Counter:', 'counters' ),
        'all_items'             => __( 'All Counters', 'counters' ),
        'add_new_item'          => __( 'Add New Counter', 'counters' ),
        'add_new'               => __( 'Add New', 'counters' ),
        'new_item'              => __( 'New Counter', 'counters' ),
        'edit_item'             => __( 'Edit Counter', 'counters' ),
        'update_item'           => __( 'Update Counter', 'counters' ),
        'view_item'             => __( 'View Counter', 'counters' ),
        'view_items'            => __( 'View Counters', 'counters' ),
        'search_items'          => __( 'Search Counters', 'counters' ),
        'not_found'             => __( 'Not found', 'counters' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'counters' ),
        'featured_image'        => __( 'Featured Image', 'counters' ),
        'set_featured_image'    => __( 'Set featured image', 'counters' ),
        'remove_featured_image' => __( 'Remove featured image', 'counters' ),
        'use_featured_image'    => __( 'Use as featured image', 'counters' ),
        'insert_into_item'      => __( 'Insert into item', 'counters' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'counters' ),
        'items_list'            => __( 'Counters list', 'counters' ),
        'items_list_navigation' => __( 'Counters list navigation', 'counters' ),
        'filter_items_list'     => __( 'Filter Counters list', 'counters' ),
    );
    $args = array(
        'label'                 => __( 'Counter', 'counters' ),
        'description'           => __( 'Custom content for "Counters" on your website', 'counters' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-plus-alt2', 
    );
    register_post_type( 'counters', $args );

}
add_action( 'init', 'custom_counters_post_type', 0 );



// Register Custom Post Type
function custom_missions_post_type() {

    $labels = array(
        'name'                  => _x( 'Missions', 'Post Type General Name', 'missions' ),
        'singular_name'         => _x( 'Mission', 'Post Type Singular Name', 'missions' ),
        'menu_name'             => __( 'Missions', 'missions' ),
        'name_admin_bar'        => __( 'Mission', 'missions' ),
        'archives'              => __( 'Missions Archives', 'missions' ),
        'attributes'            => __( 'Mission Attributes', 'missions' ),
        'parent_item_colon'     => __( 'Parent Mission:', 'missions' ),
        'all_items'             => __( 'All Missions', 'missions' ),
        'add_new_item'          => __( 'Add New Mission', 'missions' ),
        'add_new'               => __( 'Add New', 'missions' ),
        'new_item'              => __( 'New Mission', 'missions' ),
        'edit_item'             => __( 'Edit Mission', 'missions' ),
        'update_item'           => __( 'Update Mission', 'missions' ),
        'view_item'             => __( 'View Mission', 'missions' ),
        'view_items'            => __( 'View Missions', 'missions' ),
        'search_items'          => __( 'Search Missions', 'missions' ),
        'not_found'             => __( 'Not found', 'missions' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'missions' ),
        'featured_image'        => __( 'Featured Image', 'missions' ),
        'set_featured_image'    => __( 'Set featured image', 'missions' ),
        'remove_featured_image' => __( 'Remove featured image', 'missions' ),
        'use_featured_image'    => __( 'Use as featured image', 'missions' ),
        'insert_into_item'      => __( 'Insert into item', 'missions' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'missions' ),
        'items_list'            => __( 'Missions list', 'missions' ),
        'items_list_navigation' => __( 'Missions list navigation', 'missions' ),
        'filter_items_list'     => __( 'Filter Missions list', 'missions' ),
    );
    $args = array(
        'label'                 => __( 'Mission', 'missions' ),
        'description'           => __( 'Custom content for "Missions" on your website', 'missions' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-editor-ul', 
    );
    register_post_type( 'missions', $args );

}
add_action( 'init', 'custom_missions_post_type', 0 );


function custom_portfolios_post_type() {

    $labels = array(
        'name'                  => _x( 'Portfolios', 'Post Type General Name', 'portfolios' ),
        'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'portfolios' ),
        'menu_name'             => __( 'Portfolios', 'portfolios' ),
        'name_admin_bar'        => __( 'Portfolio', 'portfolios' ),
        'archives'              => __( 'Portfolios Archives', 'portfolios' ),
        'attributes'            => __( 'Portfolio Attributes', 'portfolios' ),
        'parent_item_colon'     => __( 'Parent Portfolio:', 'portfolios' ),
        'all_items'             => __( 'All Portfolios', 'portfolios' ),
        'add_new_item'          => __( 'Add New Portfolio', 'portfolios' ),
        'add_new'               => __( 'Add New', 'portfolios' ),
        'new_item'              => __( 'New Portfolio', 'portfolios' ),
        'edit_item'             => __( 'Edit Portfolio', 'portfolios' ),
        'update_item'           => __( 'Update Portfolio', 'portfolios' ),
        'view_item'             => __( 'View Portfolio', 'portfolios' ),
        'view_items'            => __( 'View Portfolios', 'portfolios' ),
        'search_items'          => __( 'Search Portfolios', 'portfolios' ),
        'not_found'             => __( 'Not found', 'portfolios' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'portfolios' ),
        'featured_image'        => __( 'Featured Image', 'portfolios' ),
        'set_featured_image'    => __( 'Set featured image', 'portfolios' ),
        'remove_featured_image' => __( 'Remove featured image', 'portfolios' ),
        'use_featured_image'    => __( 'Use as featured image', 'portfolios' ),
        'insert_into_item'      => __( 'Insert into item', 'portfolios' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'portfolios' ),
        'items_list'            => __( 'Portfolios list', 'portfolios' ),
        'items_list_navigation' => __( 'Portfolios list navigation', 'portfolios' ),
        'filter_items_list'     => __( 'Filter Portfolios list', 'portfolios' ),
    );
    $args = array(
        'label'                 => __( 'Portfolio', 'portfolios' ),
        'description'           => __( 'Custom content for "Portfolios" on your website', 'portfolios' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true, 
        'menu_icon'             => 'dashicons-heart', 
    );
    register_post_type( 'portfolios', $args );

}
add_action( 'init', 'custom_portfolios_post_type', 0 );


// Register Custom Post Type
function create_company_info_post_type() {
    $labels = array(
        'name'                  => _x( 'Milaya Info.', 'Post Type General Name', 'milaya_info' ),
        'singular_name'         => _x( 'Milaya Info.', 'Post Type Singular Name', 'milaya_info' ),
        'menu_name'             => __( 'Milaya Info.', 'milaya_info' ),
        'name_admin_bar'        => __( 'Milaya Info.', 'milaya_info' ),
        'archives'              => __( 'Milaya Info. Archives', 'milaya_info' ),
        'attributes'            => __( 'Milaya Info. Attributes', 'milaya_info' ),
        'parent_item_colon'     => __( 'Parent Milaya Info.:', 'milaya_info' ),
        'all_items'             => __( 'All Milaya Info.', 'milaya_info' ),
        'add_new_item'          => __( 'Add New Milaya Info.', 'milaya_info' ),
        'add_new'               => __( 'Add New', 'milaya_info' ),
        'new_item'              => __( 'New Milaya Info.', 'milaya_info' ),
        'edit_item'             => __( 'Edit Milaya Info.', 'milaya_info' ),
        'update_item'           => __( 'Update Milaya Info.', 'milaya_info' ),
        'view_item'             => __( 'View Milaya Info.', 'milaya_info' ),
        'view_items'            => __( 'View Milaya Info.', 'milaya_info' ),
        'search_items'          => __( 'Search Milaya Info.', 'milaya_info' ),
        'not_found'             => __( 'Not found', 'milaya_info' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'milaya_info' ),
        'featured_image'        => __( 'Featured Image', 'milaya_info' ),
        'set_featured_image'    => __( 'Set featured image', 'milaya_info' ),
        'remove_featured_image' => __( 'Remove featured image', 'milaya_info' ),
        'use_featured_image'    => __( 'Use as featured image', 'milaya_info' ),
        'insert_into_item'      => __( 'Insert into Milaya Info.', 'milaya_info' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Milaya Info.', 'milaya_info' ),
        'items_list'            => __( 'Milaya Info. list', 'milaya_info' ),
        'items_list_navigation' => __( 'Milaya Info. list navigation', 'milaya_info' ),
        'filter_items_list'     => __( 'Filter Milaya Info. list', 'milaya_info' ),
    );
    $args = array(
        'label'                 => __( 'Milaya Info.', 'milaya_info' ),
        'description'           => __( 'Milaya Info. Custom Post Type', 'milaya_info' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
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
        'capability_type'       => 'page',
        'show_in_rest'          => true,  
        'menu_icon'             => 'dashicons-admin-site', 
    );
    register_post_type( 'company_info', $args );
}
add_action( 'init', 'create_company_info_post_type', 0 );



function send_email_function($to, $subject, $message) {
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Milaya Capital Admin Website <wordpress@milayacapital.ae>';
    // error_log('Attempting to send email to: ' . $to);
    return wp_mail($to, $subject, $message, $headers);
}

add_action('rest_api_init', function () {
    register_rest_route('milaya-email/v1', '/send-email/', array(
        'methods' => 'POST',
        'callback' => 'send_email_handler',
    ));
});

function send_email_handler($data) {
    $to = $data['to'];
    $subject = $data['subject'];
    $message = $data['message'];
    $success = send_email_function($to, $subject, $message);
    return rest_ensure_response(array('success' => $success));
}


?>