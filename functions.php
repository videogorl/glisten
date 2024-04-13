<?php
/**
 * Glisten functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Glisten
 * @since Glisten 1.0
 */
namespace Glisten;


/**
 * Set up theme defaults and register various WordPress features.
 */
function setup() {

	// Enqueue editor styles and fonts.
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
add_action( 'init', function() {
	foreach (glob( plugin_dir_path( __FILE__ ) . 'blocks/build/*', GLOB_ONLYDIR ) as $folder) {
	
		/**
		 * Find out if block has a helper
		 */
		$helper_url = $folder . '/helper.php';
		if (file_exists( $helper_url )) {
			include $helper_url;
		}
	
		register_block_type( $folder );
	}
} );

/**
 * Enqueue styles.
 */
function enqueue_style_sheet() {
	wp_enqueue_style( sanitize_title( __NAMESPACE__ ), get_template_directory_uri() . '/style.css', array(), filemtime( get_template_directory() . '/style.css' ) );
}
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_style_sheet' );

/**
 * Load custom block styles only when the block is used.
 */
function enqueue_custom_block_styles() {

	// Scan our styles folder to locate block styles.
	$files = glob( get_template_directory() . '/assets/styles/*.css' );

	foreach ( $files as $file ) {

		// Get the filename and core block name.
		$filename   = basename( $file, '.css' );
		$block_name = str_replace( 'core-', 'core/', $filename );

		wp_enqueue_block_style(
			$block_name,
			array(
				'handle' => "glisten-block-{$filename}",
				'src'    => get_theme_file_uri( "assets/styles/{$filename}.css" ),
				'path'   => get_theme_file_path( "assets/styles/{$filename}.css" ),
			)
		);
	}
}
add_action( 'init', __NAMESPACE__ . '\enqueue_custom_block_styles' );


/**
 * Add block style variations.
 */
function register_block_styles() {

	$block_styles = array(
		'core/post-terms'                    => array(
			'icon-only' 	=> __( 'Icon Only', 'glisten' ),
		),
		'core/query'                    => array(
			'post-grid' 	=> __( 'Post Grid', 'glisten' ),
		)
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', __NAMESPACE__ . '\register_block_styles' );

// function change_post_template_block( $content, $block, $instance ) {
// 	echo '<pre>'.$block['blockName'].'</pre>';
// 	if ($block['blockName'] !== 'core/post') return $content;

// 	echo '<pre>';
// 	print_r($content);
// 	echo '</pre>';
// }
// add_filter( 'render_block', __NAMESPACE__ . '\change_post_template_block', 10, 3);

function change_post_content_block( $content ) {
	if ( is_single() )
		return $content . '<div class="block-end"><div class="is-style-highlight-border"></div></div>';
	else return $content;
}
add_filter( 'the_content', __NAMESPACE__ . '\change_post_content_block', 10, 1);


function change_excerpt_block( $content, $block, $instance ) {
	if (
		$block['blockName'] === 'core/post-excerpt' &&
		( is_page() || is_single() ) &&
		!is_archive() &&
		!has_excerpt()
	) return '';
	else return $content;
}
add_filter( 'render_block', __NAMESPACE__ . '\change_excerpt_block', 10, 3);

function add_body_classes( $classes ) {
	if (has_post_thumbnail()) $classes[] = 'has-featured-image';
    
    return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\add_body_classes' );


/**
 * Add transparency to colors no matter if the user has changed the palette
 * 
 * @link https://developer.wordpress.org/news/2023/07/05/how-to-modify-theme-json-data-using-server-side-filters/
 */
function add_palette_colors($theme_json) {
	
	$data = $theme_json->get_data();
	
	$palette = $data['settings']['color']['palette']['theme'] ?? null;
	
	if ($palette == null) return $theme_json;

	$steps = [
		"10",
		"25",
		"50",
		"75",
		"80"
	];
	$new_palette = [];
	$new_classes = "";
	$css_class_prefix = "var(--wp--custom--color--";

	foreach ($palette as $paint) {
		$name 	= $paint["name"];
		$slug 	= $paint["slug"];
		$color 	= $paint["color"];

		// If no hex, then no go
		if  ( !str_contains($color, '#') ) continue;

		// COnvert HEX to RGB
		list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");

		foreach ($steps as $step) {
			$new_slug = $slug . "-" . $step;
			$new_palette[$new_slug] = sprintf('rgba(%1$s, %2$s, %3$s, %4$s)', $r, $g, $b, '0.'.$step);

			$new_classes .= sprintf(
				".has-%1\$s-color { color: {$css_class_prefix}%1\$s); } .has-%1\$s-background-color { background-color: {$css_class_prefix}%1\$s); }",
				$new_slug
			);
		}

	}

	add_action('wp_head', function() use ($new_classes) {
		echo sprintf('<style>%1$s</style>', $new_classes);
	});

	return $theme_json->update_with( [
		'version'  => 2,
		"settings" => [
			"custom" => [
				"color" => $new_palette
			]
		]
	] );
}

add_action( 'after_setup_theme', function() {
	// Add for theme
	add_filter( 'wp_theme_json_data_theme', __NAMESPACE__ . '\add_palette_colors' );
	// Add for user
	add_filter( 'wp_theme_json_data_user', __NAMESPACE__ . '\add_palette_colors' );
} );

/**
 * Add "has-x-y" CSS classes in the style of WordPress' auto-generated classes
 */
add_action('wp_head', function() {
	$theme_json 		= json_decode( file_get_contents( get_stylesheet_directory() . '/theme.json' ), true );

	// print_r($theme_json);
	$new_classes = "";
	$generate = [
		[
			"slug" 		=> "background-blur",
			"location" 	=> "settings.custom.blur",
			"css" 		=> "backdrop-filter: blur(%1\$s); -webkit-backdrop-filter: blur(%1\$s);"
		],
		[
			"slug" 		=> "blur",
			"location" 	=> "settings.custom.blur",
			"css" 		=> "filter: blur(%1\$s);"
		],
		[
			"slug" 		=> "background-gradient",
			"location" 	=> "settings.custom.gradient",
			"css" 		=> "background-image:%1\$s;"
		]
	];

	// Loop through each of our generators above
	foreach ($generate as $g) {
		$slug 			= $g['slug'];
		$location 		= $g['location'];
		$location_alt 	=  $g['location'];
		$css 			= $g['css'];

		// Set up CSS variable location
		$haystack 		= "settings.";
		if (str_contains($location, $haystack)) $location_alt = substr( $location, strlen($haystack) );
		$location_alt 	= str_replace('.', '--', $location_alt);

		// Get our data from theme_json
		$data 			= $theme_json;
		$has_data 		= true;
		// Convert our Location into a property array
		$prop 			= explode('.', $location);

		// Find the theme_json key/value pair by looping through our $prop array
		foreach($prop as $p) {
			$temp = $data[ $p ] ?? null;
			if (!$temp) {
				$has_data = false;
				break;
			}
			$data = $temp;
		}

		// If this store has data, create the CSS variables
		if ($has_data && !empty($data)) {

			// Loop through each key/value pair in the data
			foreach( $data as $d => $v ) {
				$new_classes .= sprintf(
					".has-{$d}-{$slug}{{$css}}",
					"var(--wp--{$location_alt}--{$d})"
				);
			}

		}
	}

	echo sprintf('<style>%1$s</style>', $new_classes);
});