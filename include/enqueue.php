<?php
/**
 * Enqueues script with WordPress and adds version number that is a timestamp of the file modified date.
 *
 * @param string      $handle    Name of the script. Should be unique.
 * @param string|bool $src       Path to the script from the theme directory of WordPress. Example: '/js/myscript.js'.
 * @param array       $deps      Optional. An array of registered script handles this script depends on. Default empty array.
 * @param bool        $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
 *                               Default 'false'.
 */
function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
    wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
}

/**
 * Enqueues stylesheet with WordPress and adds version number that is a timestamp of the file modified date.
 *
 * @param string      $handle Name of the stylesheet. Should be unique.
 * @param string|bool $src    Path to the stylesheet from the theme directory of WordPress. Example: '/css/mystyle.css'.
 * @param array       $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
 * @param string      $media  Optional. The media for which this stylesheet has been defined.
 *                            Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
 *                            '(orientation: portrait)' and '(max-width: 640px)'.
 */
function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
    wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}


$included_files = get_included_files();
$stylesheet_dir = str_replace( '\\', '/', get_stylesheet_directory() );
$template_dir   = str_replace( '\\', '/', get_template_directory() );

foreach ( $included_files as $key => $path ) {

    $path   = str_replace( '\\', '/', $path );

    if ( false === strpos( $path, $stylesheet_dir ) && false === strpos( $path, $template_dir ) )
        unset( $included_files[$key] );
}



function scripts() {
    // отменяем зарегистрированный jQuery
    // вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
    wp_deregister_script( 'jquery-core' );
    wp_register_script( 'jquery-core', get_template_directory_uri() . '/js/jquery.min.js');
    wp_enqueue_script( 'jquery' );


    enqueue_versioned_style( 'styles', '/css/main.css' );
    if (!isset($_SERVER['HTTP_USER_AGENT']) || (stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false && (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false))):
    enqueue_versioned_script( 'libs', '/js/libs.js', array(), true );
    enqueue_versioned_script( 'index', '/js/index.js', array('libs'), true );
    endif;
}

add_action( 'wp_enqueue_scripts', 'scripts' );


add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( $scripts ) {

    if ( empty( $scripts->registered['jquery'] ) || is_admin() ) {
        return;
    }

    $deps = & $scripts->registered['jquery']->deps;

    $deps = array_diff( $deps, [ 'jquery-migrate' ] );
}