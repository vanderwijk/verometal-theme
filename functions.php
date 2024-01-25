<?php

// enqueue the child theme stylesheet
function verometal_enqueue_scripts() {
wp_register_style( 'verometal', get_stylesheet_directory_uri() . '/style.css'  );
	wp_enqueue_style( 'verometal' );
}
add_action( 'wp_enqueue_scripts', 'verometal_enqueue_scripts', 11);

// load child theme translations
function verometal_child_theme_locale() {
	load_child_theme_textdomain( 'verometal', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'verometal_child_theme_locale' );

// Country versions of Google Analytics script
function verometal_analytics() {
	if ( ICL_LANGUAGE_CODE == 'en' ) { ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MV1B2QKSSH"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-MV1B2QKSSH');
</script>

	<?php } else if ( ICL_LANGUAGE_CODE == 'bg' ) { ?>

<!-- Global site tag (gtag.js) - Google Analytics - bg -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KFB1HG0185"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-KFB1HG0185');
</script>

	<?php } else if ( ICL_LANGUAGE_CODE == 'nl' ) { ?>

<!-- Global site tag (gtag.js) - Google Analytics nl -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q4FK431BHC"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-Q4FK431BHC');
</script>

	<?php } else if ( ICL_LANGUAGE_CODE == 'fr' ) { ?>

<!-- Global site tag (gtag.js) - Google Analytics - fr -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DVGYDS2M91"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-DVGYDS2M91');
</script>

	<?php } else if ( ICL_LANGUAGE_CODE == 'de' ) { ?>

<!-- Global site tag (gtag.js) - Google Analytics - de -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-THW806HS7T"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-THW806HS7T');
</script>

	<?php } else if ( ICL_LANGUAGE_CODE == 'es' ) { ?>

<!-- Global site tag (gtag.js) - Google Analytics - es -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-49WJJEJQ4C"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-49WJJEJQ4C');
</script>

	<?php };
}
add_action( 'wp_head', 'verometal_analytics' );

// unregister portfolio_page custom post type to modify it
function verometal_unregister_post_type(){
	unregister_post_type( 'portfolio_page' );
}
add_action('init','verometal_unregister_post_type');

// modified portfolio_page custom post type
function create_coating_cpt() {

	$labels = array(
		'name' => _x( 'Coatings', 'Post Type General Name', 'verometal' ),
		'singular_name' => _x( 'Coating', 'Post Type Singular Name', 'verometal' ),
		'menu_name' => _x( 'Coatings', 'Admin Menu text', 'verometal' ),
		'name_admin_bar' => _x( 'Coating', 'Add New on Toolbar', 'verometal' ),
		'archives' => __( 'Coating Archives', 'verometal' ),
		'attributes' => __( 'Coating Attributes', 'verometal' ),
		'parent_item_colon' => __( 'Parent Coating:', 'verometal' ),
		'all_items' => __( 'All Coatings', 'verometal' ),
		'add_new_item' => __( 'Add New Coating', 'verometal' ),
		'add_new' => __( 'Add New', 'verometal' ),
		'new_item' => __( 'New Coating', 'verometal' ),
		'edit_item' => __( 'Edit Coating', 'verometal' ),
		'update_item' => __( 'Update Coating', 'verometal' ),
		'view_item' => __( 'View Coating', 'verometal' ),
		'view_items' => __( 'View Coatings', 'verometal' ),
		'search_items' => __( 'Search Coating', 'verometal' ),
		'not_found' => __( 'Not found', 'verometal' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'verometal' ),
		'featured_image' => __( 'Featured Image', 'verometal' ),
		'set_featured_image' => __( 'Set featured image', 'verometal' ),
		'remove_featured_image' => __( 'Remove featured image', 'verometal' ),
		'use_featured_image' => __( 'Use as featured image', 'verometal' ),
		'insert_into_item' => __( 'Insert into Coating', 'verometal' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Coating', 'verometal' ),
		'items_list' => __( 'Coatings list', 'verometal' ),
		'items_list_navigation' => __( 'Coatings list navigation', 'verometal' ),
		'filter_items_list' => __( 'Filter Coatings list', 'verometal' ),
	);
	$args = array(
		'label' => __( 'Coating', 'verometal' ),
		'description' => __( '', 'verometal' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-customizer',
		'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 4,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		//'rewrite' => array('slug' => _x('coating', 'Custom post type slug', 'verometal') )
		//'rewrite' => true
		'rewrite' => array('slug' => 'coating')
	);
	register_post_type( 'portfolio_page', $args );

}
add_action( 'init', 'create_coating_cpt', 10 );

add_filter( 'gform_default_styles', function( $styles ) {
    return '{"buttonPrimaryBackgroundColor":"#c7b29a"}';
} );



/**
 * Gravity Wiz // Gravity Forms // Rename Uploaded Files
 * http://gravitywiz.com/rename-uploaded-files-for-gravity-form/
 *
 * Rename uploaded files for Gravity Forms. You can create a static naming template or using merge tags to base names on user input.
 *
 * Features:
 *  + supports single and multi-file upload fields
 *  + flexible naming template with support for static and dynamic values via GF merge tags
 *
 * Uses:
 *  + add a prefix or suffix to file uploads
 *  + include identifying submitted data in the file name like the user's first and last name
 *
 * @version   2.5.3
 * @author    David Smith <david@gravitywiz.com>
 * @license   GPL-2.0+
 * @link      http://gravitywiz.com/rename-uploaded-files-for-gravity-form/
 */
class GW_Rename_Uploaded_Files {

	public function __construct( $args = array() ) {

		// set our default arguments, parse against the provided arguments, and store for use throughout the class
		$this->_args = wp_parse_args( $args, array(
			'form_id'          => false,
			'field_id'         => false,
			'template'         => '',
			'ignore_extension' => false,
		) );

		// do version check in the init to make sure if GF is going to be loaded, it is already loaded
		add_action( 'init', array( $this, 'init' ) );

	}

	public function init() {

		// make sure we're running the required minimum version of Gravity Forms
		if ( ! is_callable( array( 'GFFormsModel', 'get_physical_file_path' ) ) ) {
			return;
		}

		add_filter( 'gform_entry_post_save', array( $this, 'rename_uploaded_files' ), 9, 2 );
		add_filter( 'gform_entry_post_save', array( $this, 'stash_uploaded_files' ), 99, 2 );

		add_action( 'gform_after_update_entry', array( $this, 'rename_uploaded_files_after_update' ), 9, 2 );
		add_action( 'gform_after_update_entry', array( $this, 'stash_uploaded_files_after_update' ), 99, 2 );

	}

	function rename_uploaded_files( $entry, $form ) {

		if ( ! $this->is_applicable_form( $form ) ) {
			return $entry;
		}

		foreach ( $form['fields'] as &$field ) {

			if ( ! $this->is_applicable_field( $field ) ) {
				continue;
			}

			$uploaded_files = rgar( $entry, $field->id );

			if ( empty( $uploaded_files ) ) {
				continue;
			}

			$uploaded_files = $this->parse_files( $uploaded_files, $field );
			$stashed_files  = $this->parse_files( gform_get_meta( $entry['id'], 'gprf_stashed_files' ), $field );
			$renamed_files  = array();

			foreach ( $uploaded_files as $_file ) {

				// Don't rename the same files twice.
				if ( in_array( $_file, $stashed_files ) ) {
					$renamed_files[] = $_file;
					continue;
				}

				$dir  = wp_upload_dir();
				$dir  = $this->get_upload_dir( $form['id'] );
				$file = str_replace( $dir['url'], $dir['path'], $_file );

				if ( ! file_exists( $file ) ) {
					continue;
				}

				$renamed_file = $this->rename_file( $file, $entry );

				if ( ! is_dir( dirname( $renamed_file ) ) ) {
					wp_mkdir_p( dirname( $renamed_file ) );
				}

				$result = rename( $file, $renamed_file );

				$renamed_files[] = $this->get_url_by_path( $renamed_file, $form['id'] );

			}

			// In cases where 3rd party add-ons offload the image to a remote location, no images can be renamed.
			if ( empty( $renamed_files ) ) {
				continue;
			}

			if ( $field->get_input_type() == 'post_image' ) {
				$value = str_replace( $uploaded_files[0], $renamed_files[0], rgar( $entry, $field->id ) );
			} elseif ( $field->multipleFiles ) {
				$value = json_encode( $renamed_files );
			} else {
				$value = $renamed_files[0];
			}

			GFAPI::update_entry_field( $entry['id'], $field->id, $value );

			$entry[ $field->id ] = $value;

		}

		return $entry;
	}

	function get_upload_dir( $form_id ) {
		$dir         = GFFormsModel::get_file_upload_path( $form_id, 'PLACEHOLDER' );
		$dir['path'] = dirname( $dir['path'] );
		$dir['url']  = dirname( $dir['url'] );
		return $dir;
	}

	function rename_uploaded_files_after_update( $form, $entry_id ) {
		$entry = GFAPI::get_entry( $entry_id );
		$this->rename_uploaded_files( $entry, $form );
	}

	/**
	 * Stash the "final" version of the files after other add-ons have had a chance to interact with them.
	 *
	 * @param $entry
	 * @param $form
	 */
	function stash_uploaded_files( $entry, $form ) {

		foreach ( $form['fields'] as &$field ) {

			if ( ! $this->is_applicable_field( $field ) ) {
				continue;
			}

			$uploaded_files         = rgar( $entry, $field->id );
			$existing_stashed_files = gform_get_meta( $entry['id'], 'gprf_stashed_files' );

			if ( $this->is_json( $uploaded_files ) ) {
				$uploaded_files = json_decode( $uploaded_files, ARRAY_A );
			}

			if ( $this->is_json( $existing_stashed_files ) ) {
				$existing_stashed_files = json_decode( $existing_stashed_files, ARRAY_A );
			}

			/* Convert single files to array of files. */
			if ( ! is_array( $existing_stashed_files ) ) {
				$existing_stashed_files = $existing_stashed_files ? array( $existing_stashed_files ) : array();
			}

			if ( ! is_array( $uploaded_files ) ) {
				$uploaded_files = $uploaded_files ? array( $uploaded_files ) : array();
			}

			if ( ! empty( $existing_stashed_files ) ) {
				$uploaded_files = array_merge( $existing_stashed_files, $uploaded_files );
			}

			gform_update_meta( $entry['id'], 'gprf_stashed_files', json_encode( $uploaded_files ) );

		}

		return $entry;
	}

	/**
	 * Check whether a string is JSON or not.
	 *
	 * @param $string string String to test.
	 *
	 * @return bool Whether the string is JSON.
	 */
	function is_json( $string ) {
		if ( method_exists( 'GFCommon', 'is_json' ) ) {
			return GFCommon::is_json( $string );
		}

		// Duplicate contents of GFCommon::is_json() here to supports versions of GF older than GF 2.5.
		// phpcs:ignore WordPress.PHP.StrictInArray.MissingTrueStrict
		if ( is_string( $string ) && in_array( substr( $string, 0, 1 ), array( '{', '[' ) ) && is_array( json_decode( $string, ARRAY_A ) ) ) {
			return true;
		}

		return false;
	}

	function stash_uploaded_files_after_update( $form, $entry_id ) {
		$entry = GFAPI::get_entry( $entry_id );
		$this->stash_uploaded_files( $entry, $form );
	}

	function rename_file( $file, $entry ) {

		$new_file = $this->get_renamed_filepath( $this->_args['template'], $file, $entry );
		$new_file = $this->increment_file( $new_file );

		return $new_file;
	}

	function increment_file( $file ) {

		$file_path = GFFormsModel::get_physical_file_path( $file );
		$pathinfo  = pathinfo( $file_path );
		$counter   = 1;

		if ( $this->_args['ignore_extension'] ) {
			while ( glob( str_replace( ".{$pathinfo['extension']}", '.*', $file_path ) ) ) {
				$file_path = str_replace( ".{$pathinfo['extension']}", "{$counter}.{$pathinfo['extension']}", GFFormsModel::get_physical_file_path( $file ) );
				$counter ++;
			}
		} else {
			// increment the filename if it already exists (i.e. balloons.jpg, balloons1.jpg, balloons2.jpg)
			while ( file_exists( $file_path ) ) {
				$file_path = str_replace( ".{$pathinfo['extension']}", "{$counter}.{$pathinfo['extension']}", GFFormsModel::get_physical_file_path( $file ) );
				$counter ++;
			}
		}

		$file = str_replace( basename( $file ), basename( $file_path ), $file );

		return $file;
	}

	function is_path( $filename ) {
		return strpos( $filename, '/' ) !== false;
	}

	function get_renamed_filepath( $template, $file, $entry ) {
		$info = pathinfo( $file );

		// replace our custom "{filename}" psuedo-merge-tag
		$filename = str_replace( '{filename}', $info['filename'], $template );

		// replace merge tags
		$form     = GFAPI::get_form( $entry['form_id'] );
		$filename = GFCommon::replace_variables( $filename, $form, $entry, false, true, false, 'text' );
		// make sure filename is "clean". This includes removing any user inputted items such as "../", "/usr/bin" etc
		$filename = $this->clean( $filename );

		if ( strpos( $template, '/' ) === 0 ) {
			$dir      = wp_upload_dir();
			$filepath = $dir['basedir'];
		} else {
			$filepath = $info['dirname'] . '/';
		}

		$filepath .= $filename . '.' . $info['extension'];

		return $filepath;
	}

	function is_applicable_form( $form ) {

		$form_id = isset( $form['id'] ) ? $form['id'] : $form;

		return $form_id == $this->_args['form_id'];
	}

	function is_applicable_field( $field ) {

		$is_file_upload_field   = in_array( GFFormsModel::get_input_type( $field ), array( 'fileupload', 'post_image' ) );
		$is_applicable_field_id = $this->_args['field_id'] ? $field['id'] == $this->_args['field_id'] : true;

		return $is_file_upload_field && $is_applicable_field_id;
	}

	function clean( $str ) {
		return sanitize_file_name( $str );
	}

	function get_url_by_path( $file, $form_id ) {

		$dir = $this->get_upload_dir( $form_id );
		$url = str_replace( $dir['path'], $dir['url'], $file );

		return $url;
	}

	function parse_files( $files, $field ) {

		if ( empty( $files ) ) {
			return array();
		}

		if ( $this->is_json( $files ) ) {
			$files = json_decode( $files );
		} elseif ( $field->get_input_type() === 'post_image' ) {
			$file_bits = explode( '|:|', $files );
			$files     = array( $file_bits[0] );
		} else {
			$files = array( $files );
		}

		return $files;
	}

}

# Configuration

new GW_Rename_Uploaded_Files( array(
	'form_id'          => 1,
	'field_id'         => 10,
	// most merge tags are supported, original file extension is preserved
	//'template'         => '{Name (First):1.3}-{Name (Last):1.6}-{filename}',
	'template'         => '{Project name:6}',
	// Ignore extension when renaming files and keep them in sequence (e.g. a.jpg, a1.png, a2.pdf etc.)
	'ignore_extension' => true,
) );
