<?php
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
/**
 * Infotech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Infotech
 * @since Infotech 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Infotech 1.0
 */
function infotech_theme_support()
{

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// Set post thumbnail size.
	set_post_thumbnail_size(1200, 9999);

	// Add custom image size used in Cover Template.
	add_image_size('infotech-fullscreen', 1980, 9999);

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if (get_theme_mod('retina_logo', false)) {
		$logo_width  = floor($logo_width * 2);
		$logo_height = floor($logo_height * 2);
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);
}

add_action('after_setup_theme', 'infotech_theme_support');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

if (!function_exists('infotech_register_nav_menu')) {

	function infotech_register_nav_menu()
	{
		register_nav_menus(array(
			'primary_menu' => __('Primary Menu', 'infotech_theme_support'),
			'footer_menu'  => __('Footer Menu', 'infotech_theme_support'),
		));
	}
	add_action('after_setup_theme', 'infotech_register_nav_menu', 0);
}

// Our custom post type function
function create_slider()
{

	register_post_type(
		'sliders',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Sliders'),
				'singular_name' => __('Slider'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Slider', 'textdomain'),
				'edit_item'             => __('Edit Slider', 'textdomain'), //used in post.php
				'new_item'              => __('New Slider', 'textdomain'),
				'all_items'             => __('All Slider', 'textdomain'),
				'view_item'             => __('View Slider', 'textdomain'),
				'search_items'          => __('Search Slider', 'textdomain'),
				'menu_name'             => __('Slider', 'textdomain'),
				'featured_image'        => __('Slider image', 'textdomain'),
				'set_featured_image'    => __('Set slider image', 'textdomain'),
				'remove_featured_image' => __('Remove slider image', 'textdomain'),
				'excerpt'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sliders'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-feedback',
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_slider');

// Our custom post type function
function create_service()
{
	register_post_type(
		'services',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Services'),
				'singular_name' => __('Service'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Service', 'textdomain'),
				'edit_item'             => __('Edit Service', 'textdomain'), //used in post.php
				'new_item'              => __('New Service', 'textdomain'),
				'all_items'             => __('All Services', 'textdomain'),
				'view_item'             => __('View Service', 'textdomain'),
				'search_items'          => __('Search Service', 'textdomain'),
				'menu_name'             => __('Service', 'textdomain'),
				'featured_image'        => __('Service banner image', 'textdomain'),
				'set_featured_image'    => __('Set service banner image', 'textdomain'),
				'remove_featured_image' => __('Remove service banner image', 'textdomain'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-admin-customizer',
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_service');




// Our custom post type function
function create_product()
{
	register_post_type(
		'products',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Products'),
				'singular_name' => __('Product'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Product', 'textdomain'),
				'edit_item'             => __('Edit Product', 'textdomain'), //used in post.php
				'new_item'              => __('New Product', 'textdomain'),
				'all_items'             => __('All Products', 'textdomain'),
				'view_item'             => __('View Product', 'textdomain'),
				'search_items'          => __('Search Product', 'textdomain'),
				'menu_name'             => __('Product', 'textdomain'),
				'featured_image'        => __('Product banner image', 'textdomain'),
				'set_featured_image'    => __('Set product banner image', 'textdomain'),
				'remove_featured_image' => __('Remove product banner image', 'textdomain'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'products'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-image-rotate-right',
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_product');


// Our custom post type function
function create_video()
{
	register_post_type(
		'videos',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Videos'),
				'singular_name' => __('Video'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Video', 'textdomain'),
				'edit_item'             => __('Edit Videos', 'textdomain'), //used in post.php
				'new_item'              => __('New Videos', 'textdomain'),
				'all_items'             => __('All Videos', 'textdomain'),
				'view_item'             => __('View Videos', 'textdomain'),
				'search_items'          => __('Search Videos', 'textdomain'),
				'menu_name'             => __('Videos', 'textdomain'),
				'featured_image'        => __('Videos banner image', 'textdomain'),
				'set_featured_image'    => __('Set videos banner image', 'textdomain'),
				'remove_featured_image' => __('Remove videos banner image', 'textdomain'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'videos'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-admin-collapse',
			'supports' => array('title', 'editor'),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_video');



// Our custom post type function
function create_gallery()
{
	register_post_type(
		'gallery',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Gallery'),
				'singular_name' => __('Gallery'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Gallery', 'textdomain'),
				'edit_item'             => __('Edit Gallery', 'textdomain'), //used in post.php
				'new_item'              => __('New Gallery', 'textdomain'),
				'all_items'             => __('All Gallery', 'textdomain'),
				'view_item'             => __('View Gallery', 'textdomain'),
				'search_items'          => __('Search Gallery', 'textdomain'),
				'menu_name'             => __('Gallery', 'textdomain'),
				'featured_image'        => __('Gallery image', 'textdomain'),
				'set_featured_image'    => __('Set Gallery image', 'textdomain'),
				'remove_featured_image' => __('Remove Gallery image', 'textdomain'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'gallery'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-format-gallery',
			'supports' => array('title', 'editor', "thumbnail"),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_gallery');


// Replace Posts label as Articles in Admin Panel 

function change_post_menu_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'News & Events';
	$submenu['edit.php'][5][0] = 'News & Events';
	$submenu['edit.php'][10][0] = 'Add News & Events';
	echo '';
}
function change_post_object_label()
{
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News & Events';
	$labels->singular_name = 'News & Events';
	$labels->add_new = 'Add News & Events';
	$labels->add_new_item = 'Add News & Events';
	$labels->edit_item = 'Edit News & Events';
	$labels->new_item = 'News & Events';
	$labels->view_item = 'View News & Events';
	$labels->search_items = 'Search News & Events';
	$labels->not_found = 'No News & Events found';
	$labels->not_found_in_trash = 'No News & Events found in Trash';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');




// Our custom post type function
function create_clients()
{
	register_post_type(
		'clients',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Clients'),
				'singular_name' => __('Clients'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Clients', 'textdomain'),
				'edit_item'             => __('Edit Clients', 'textdomain'), //used in post.php
				'new_item'              => __('New Clients', 'textdomain'),
				'all_items'             => __('All Clients', 'textdomain'),
				'view_item'             => __('View Clients', 'textdomain'),
				'search_items'          => __('Search Clients', 'textdomain'),
				'menu_name'             => __('Clients', 'textdomain'),
				'featured_image'        => __('Clients image', 'textdomain'),
				'set_featured_image'    => __('Set Clients image', 'textdomain'),
				'remove_featured_image' => __('Remove Clients image', 'textdomain'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'clients'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-businessman',
			'supports' => array('title', 'editor', "thumbnail"),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_clients');


// Our custom post type function
function create_announcement()
{
	register_post_type(
		'announcements',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Announcements'),
				'singular_name' => __('Announcement'),
				'add_new'               => __('Add New', 'textdomain'),
				'add_new_item'          => __('Add New Announcement', 'textdomain'),
				'edit_item'             => __('Edit Announcement', 'textdomain'), //used in post.php
				'new_item'              => __('New Announcement', 'textdomain'),
				'all_items'             => __('All Announcements', 'textdomain'),
				'view_item'             => __('View Announcement', 'textdomain'),
				'search_items'          => __('Search Announcement', 'textdomain'),
				'menu_name'             => __('Announcement', 'textdomain'),
				'featured_image'        => __('Announcement banner image', 'textdomain'),
				'set_featured_image'    => __('Set announcement banner image', 'textdomain'),
				'remove_featured_image' => __('Remove announcement banner image', 'textdomain'),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'announcements'),
			'show_in_rest' => true,
			'menu_icon' => 'dashicons-format-quote',
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_announcement');





// Control core classes for avoid errors
if (class_exists('CSF')) {

	//
	// Set a unique slug-like ID
	$prefix = 'infotech_theme_option';

	//
	// Create options
	CSF::createOptions($prefix, array(
		'menu_title' => 'Theme Option',
		'menu_slug'  => 'theme-option',
	));

	//
	// Create a section
	CSF::createSection($prefix, array(
		'title'  => 'Section Title and Subtitle',
		'fields' => array(

			array(
				'id'            => 'all-section-tab',
				'type'          => 'tabbed',
				'title'         => 'All Section',
				'tabs'          => array(
					array(
						'title'     => 'Service',
						'fields'    => array(
							array(
								'id'    => 'service-section-title',
								'type'  => 'text',
								'title' => 'Service Title',
							),
							array(
								'id'    => 'service-section-subtitle',
								'type'  => 'textarea',
								'title' => 'Service Sub Title',
							),

						)
					),
					array(
						'title'     => 'Product',
						'fields'    => array(
							array(
								'id'    => 'product-section-title',
								'type'  => 'text',
								'title' => 'Product Title',
							),
							array(
								'id'    => 'product-section-subtitle',
								'type'  => 'textarea',
								'title' => 'Product Sub Title',
							),
						)
					),
					array(
						'title'     => 'Video',
						'fields'    => array(
							array(
								'id'    => 'video-title',
								'type'  => 'textarea',
								'title' => 'Video Title',
							),
						)
					),
					array(
						'title'     => 'Gallery',
						'fields'    => array(
							array(
								'id'    => 'gallery-title',
								'type'  => 'text',
								'title' => 'Gallery Title',
							),
							array(
								'id'    => 'gallery-subtitle',
								'type'  => 'textarea',
								'title' => 'Gallery Sub Title',
							),
						)
					),
					array(
						'title'     => 'News & Events',
						'fields'    => array(
							array(
								'id'    => 'news-events-title',
								'type'  => 'text',
								'title' => 'News & Events Title',
							),
							array(
								'id'    => 'news-events-subtitle',
								'type'  => 'textarea',
								'title' => 'News & Events Sub Title',
							),
						)
					),
					array(
						'title'     => 'Trusted By',
						'fields'    => array(
							array(
								'id'    => 'trusted-by-title',
								'type'  => 'text',
								'title' => 'Trusted By Title',
							)
						)
					),
				)
			),

		)
	));

	//
	// Create a section

	//
	// Create a section
	CSF::createSection($prefix, array(
		'title'  => 'Footer Options',
		'fields' => array(
			array(
				'id'    => 'footer-logo',
				'type'  => 'upload',
				'title' => 'Footer Logo',
			),
			array(
				'id'    => 'footer-text',
				'type'  => 'textarea',
				'title' => 'Footer Sort Text',
			),
			array(
				'id'    => 'footer-email-us',
				'type'  => 'text',
				'title' => 'Footer Email Us',
			),
			array(
				'id'            => 'fellow-us-tab',
				'type'          => 'tabbed',
				'title'         => 'Fellow Us',
				'tabs'          => array(
					array(
						'title'     => 'Facebook',
						'fields'    => array(
							array(
								'id'    => 'facebook-social',
								'type'  => 'upload',
								'title' => 'Facebook Icon Image',
							),
							array(
								'id'    => 'facebook-social-url',
								'type'  => 'text',
								'title' => 'Facebook Social Url',
							),
						)
					),
					array(
						'title'     => 'Twitter',
						'fields'    => array(
							array(
								'id'    => 'twitter-social',
								'type'  => 'upload',
								'title' => 'Twitter Icon Image',
							),
							array(
								'id'    => 'twitter-social-url',
								'type'  => 'text',
								'title' => 'Twitter Social Url',
							),
						)
					),
					array(
						'title'     => 'Linkedin',
						'fields'    => array(
							array(
								'id'    => 'linkedin-social',
								'type'  => 'upload',
								'title' => 'Linkedin Icon Image',
							),
							array(
								'id'    => 'linkedin-social-url',
								'type'  => 'text',
								'title' => 'Linkedin Social Url',
							),
						)
					),
					array(
						'title'     => 'Youtube',
						'fields'    => array(
							array(
								'id'    => 'youtube-social',
								'type'  => 'upload',
								'title' => 'Youtube Icon Image',
							),
							array(
								'id'    => 'youtube-social-url',
								'type'  => 'text',
								'title' => 'Youtube Social Url',
							),
						)
					),
				)
			),
			array(
				'id'            => 'our-offices-tab',
				'type'          => 'tabbed',
				'title'         => 'Our Offices',
				'tabs'          => array(
					array(
						'title'     => 'Office 1',
						'fields'    => array(
							array(
								'id'    => 'office-1-name',
								'type'  => 'text',
								'title' => 'Office Name',
							),
							array(
								'id'    => 'office-1-address',
								'type'  => 'textarea',
								'title' => 'Office Address',
							),
							array(
								'id'    => 'office-1-phone',
								'type'  => 'text',
								'title' => 'Office Phone',
							),
							array(
								'id'    => 'office-1-fax',
								'type'  => 'text',
								'title' => 'Office Fax',
							),

						)
					),
					array(
						'title'     => 'Office 2',
						'fields'    => array(
							array(
								'id'    => 'office-2-name',
								'type'  => 'text',
								'title' => 'Office Name',
							),
							array(
								'id'    => 'office-2-address',
								'type'  => 'textarea',
								'title' => 'Office Address',
							),
							array(
								'id'    => 'office-2-phone',
								'type'  => 'text',
								'title' => 'Office Phone',
							),
							array(
								'id'    => 'office-2-fax',
								'type'  => 'text',
								'title' => 'Office Fax',
							),

						)
					),
					array(
						'title'     => 'Office 3',
						'fields'    => array(
							array(
								'id'    => 'office-3-name',
								'type'  => 'text',
								'title' => 'Office Name',
							),
							array(
								'id'    => 'office-3-address',
								'type'  => 'textarea',
								'title' => 'Office Address',
							),
							array(
								'id'    => 'office-3-phone',
								'type'  => 'text',
								'title' => 'Office Phone',
							),
							array(
								'id'    => 'office-3-fax',
								'type'  => 'text',
								'title' => 'Office Fax',
							),

						)
					),
				)
			),
			array(
				'id'    => 'opt-copyright',
				'type'  => 'text',
				'title' => 'Copyright Text',
			),

		)
	));


	//
	// Create a section
	CSF::createSection($prefix, array(
		'title'  => 'Slider Options',
		'fields' => array(
			array(
				'id'         => 'slider-radio',
				'type'       => 'radio',
				'title'      => 'Are you want to change slider with image',
				'inline' => true,
				'options'    => array(
					'1' => 'Yes',
					'0' => 'No',
				),
				'default'    => '0'

			)
		)
	));
}
