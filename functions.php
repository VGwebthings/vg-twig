<?php
if ( !class_exists( 'Timber' ) ) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
    return;
}
class StarterSite extends TimberSite {
    function __construct() {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_filter( 'timber_context', array( $this,
                                             'add_to_context' ) );
        add_filter( 'get_twig', array( $this,
                                       'add_to_twig' ) );
        add_action( 'init', array( $this,
                                   'register_post_types' ) );
        add_action( 'init', array( $this,
                                   'register_taxonomies' ) );
        parent::__construct();
    }
    function register_post_types() {
    }
    function register_taxonomies() {
    }
    function add_to_context( $context ) {
        $context[ 'settings' ] = get_fields( 'options' );
        $context[ 'menu' ]     = new TimberMenu();
        $context[ 'site' ]     = $this;
        return $context;
    }
    function add_to_twig( $twig ) {
        $twig->addExtension( new Twig_Extension_StringLoader() );
        $twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
        return $twig;
    }
}
new StarterSite();
function myfoo( $text ) {
    $text .= ' bar!';
    return $text;
}

add_action( 'tgmpa_register', 'vg_twig_register_required_plugins' );
function vg_twig_register_required_plugins() {
    $plugins = array( array( 'name'               => 'Timber',
                             'slug'               => 'timber-library',
                             'required'           => true,
                             'force_activation'   => true,
                             'force_deactivation' => true ) );
    tgmpa( $plugins );
}

add_action( 'wp_enqueue_scripts', 'vg_twig_scripts', 99 );
function vg_twig_scripts() {
    //wp_enqueue_style( 'style_dev', get_stylesheet_directory_uri() . '/assets/css/style.css', false, filemtime( get_template_directory_uri() . '/assets/css/style.css' ) );
    //wp_enqueue_style( 'app_dev', get_stylesheet_directory_uri() . '/assets/css/app.css', false, filemtime( get_template_directory_uri() . '/assets/css/app.css' ) );
    //wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/assets/css/app.scss.min.css', false, null );
    wp_enqueue_style( 'style_dev', get_stylesheet_directory_uri() . '/assets/css/style.css', false, null );
    wp_enqueue_style( 'app_dev', get_stylesheet_directory_uri() . '/assets/css/app.css', false, null );
    wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), null, true );
    wp_localize_script( 'app', 'app_settings', array( 'test' => 'test' ) );
}
