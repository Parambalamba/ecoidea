<?php
/**
 * Add custom css styles for all Gutenberg blocks
 */
add_action( 'init', 'ecoidea_enqueue_block_styles' );
function ecoidea_enqueue_block_styles() {
	$blocks = array(
		'core/group',
		'core/columns',
		'core/image',
		'core/navigation'
	);
	foreach ( $blocks as $block) {
		$slug = str_replace('/', '-', $block);
		wp_enqueue_block_style( $block, array(
			'handle' => "ecoidea-block-{$slug}",
			'src'    => get_theme_file_uri( "assets/blocks/{$slug}.css" ),
			'path'   => get_theme_file_path( "assets/blocks/{$slug}.css" )
		) );
	}
}

/**
 * Load custom blocks
 */
function ecoidea_load_blocks() {
	$theme = wp_get_theme();
	$blocks = ecoidea_get_blocks();
	$json = file_get_contents(get_template_directory() . '/theme.json');
	$ut = utf8_encode($json);
	foreach ( $blocks as $block ) {
		if ( file_exists( get_template_directory() . '/blocks/' . $block . '/block.json' ) ) {
			register_block_type( get_template_directory() . '/blocks/' . $block );
		}
	}
}
add_action( 'init', 'ecoidea_load_blocks', 5 );

/**
 * Get all blocks
 */
function ecoidea_get_blocks() {
	$theme   = wp_get_theme();
	$blocks  = get_option( 'ecoidea_blocks' );
	$version = get_option( 'ecoidea_blocks_version' );
	if ( empty( $blocks ) || version_compare( $theme->get( 'Version' ), $version ) ) {
		$blocks = scandir( get_template_directory() . '/blocks' );
		$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );

		update_option( 'ecoidea_blocks', $blocks );
		update_option( 'ecoidea_blocks_version', $theme->get( 'Version' ) );
	}

	return $blocks;
}

/**
 * Include Jquery to theme
*/
function ecoidea_enuqueue_scripts() {
	wp_enqueue_script( "jquery" );
}
add_action( 'wp_enqueue_scripts', 'ecoidea_enuqueue_scripts' );
