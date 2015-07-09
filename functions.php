<?php
if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
    } );

    return;
}

class TheSite extends TimberSite {
    function __construct() {
        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        //add_action( 'init', array( $this, 'register_post_types' ) );
        //add_action( 'init', array( $this, 'register_taxonomies' ) );
        parent::__construct();
    }

    function register_post_types() {
        $labels  = array(
            'name'               => _x( 'Post Types', 'Post Type General Name', 'vg' ),
            'singular_name'      => _x( 'Post Type', 'Post Type Singular Name', 'vg' ),
            'menu_name'          => __( 'Post Type', 'vg' ),
            'parent_item_colon'  => __( 'Parent Item:', 'vg' ),
            'all_items'          => __( 'All Items', 'vg' ),
            'view_item'          => __( 'View Item', 'vg' ),
            'add_new_item'       => __( 'Add New Item', 'vg' ),
            'add_new'            => __( 'Add New', 'vg' ),
            'edit_item'          => __( 'Edit Item', 'vg' ),
            'update_item'        => __( 'Update Item', 'vg' ),
            'search_items'       => __( 'Search Item', 'vg' ),
            'not_found'          => __( 'Not found', 'vg' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'vg' ),
        );
        $rewrite = array(
            'slug'       => 'custom_post_type',
            'with_front' => false,
            'pages'      => true,
            'feeds'      => false,
        );
        $args    = array(
            'label'               => __( 'Custom Post Type', 'vg' ),
            'description'         => __( 'Post Type Description', 'vg' ),
            'labels'              => $labels,
            'supports'            => array( 'author', 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array( 'taxonomy' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-admin-post',
            'can_export'          => false,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => $rewrite,
            'capability_type'     => 'post',
        );
        register_post_type( 'custom_post_type', $args );
    }

    function register_taxonomies() {
        $labels  = array(
            'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'vg' ),
            'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'vg' ),
            'menu_name'                  => __( 'Taxonomy', 'vg' ),
            'all_items'                  => __( 'All Items', 'vg' ),
            'parent_item'                => __( 'Parent Item', 'vg' ),
            'parent_item_colon'          => __( 'Parent Item:', 'vg' ),
            'new_item_name'              => __( 'New Item Name', 'vg' ),
            'add_new_item'               => __( 'Add New Item', 'vg' ),
            'edit_item'                  => __( 'Edit Item', 'vg' ),
            'update_item'                => __( 'Update Item', 'vg' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'vg' ),
            'search_items'               => __( 'Search Items', 'vg' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'vg' ),
            'choose_from_most_used'      => __( 'Choose from the most used items', 'vg' ),
            'not_found'                  => __( 'Not Found', 'vg' ),
        );
        $rewrite = array(
            'slug'         => 'taxonomy',
            'with_front'   => false,
            'hierarchical' => true,
        );
        $args    = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
            'rewrite'           => $rewrite,
        );
        register_taxonomy( 'taxonomy', array( 'custom_post_type' ), $args );
    }

    function add_to_context( $context ) {
        $context['settings'] = get_fields( 'options' );
        $context['menu']     = new TimberMenu();
        if ( current_theme_supports( 'nanga-sidebar' ) ) {
            $context['sidebar'] = Timber::get_sidebar( 'sidebar.php' );
        }
        $context['site'] = $this;
        if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
            $context['opcode'] = false;
        } else {
            $context['opcode'] = false;
        }

        return $context;
    }

    function add_to_twig( $twig ) {
        $twig->addExtension( new Twig_Extension_StringLoader() );
        $twig->addFilter( 'antispam', new Twig_Filter_Function( 'vg_antispam' ) );

        return $twig;
    }
}

new TheSite();
function vg_antispam( $email ) {
    return antispambot( $email );
}

if ( class_exists( 'Timber' ) ) {
    if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
        Timber::$cache = false;
    } else {
        Timber::$cache = true;
    }
}
add_action( 'wp_enqueue_scripts', function () {
    global $wp_styles;
    global $is_IE;
    //wp_enqueue_style( 'scss', get_stylesheet_directory_uri() . '/assets/css/app.scss.css', false, null );
    //wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/assets/css/style.css', false, null );
    //wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/assets/css/app.css', false, null );
    if ( $is_IE ) {
        wp_enqueue_style( 'ie-styles', get_stylesheet_directory_uri() . '/assets/css/ie.css', false, null );
        $wp_styles->add_data( 'ie-styles', 'conditional', 'IE' );
    }
    //wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), null, true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}, 99 );
if ( current_theme_supports( 'nanga-sidebar' ) ) {
    add_action( 'widgets_init', function () {
        register_sidebar( array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar',
            'before_widget' => '<aside class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        ) );
    } );
}
add_action( 'after_setup_theme', function () {
    //add_theme_support( 'nanga-analytics' );
    //add_theme_support( 'nanga-asset-cachebusting' );
    //add_theme_support( 'nanga-cdn-assets' );
    //add_theme_support( 'nanga-debug-assets' );
    //add_theme_support( 'nanga-disable-categories' );
    //add_theme_support( 'nanga-disable-comments' );
    //add_theme_support( 'nanga-disable-posts' );
    //add_theme_support( 'nanga-disable-tags' );
    //add_theme_support( 'nanga-js-to-footer' );
    //add_theme_support( 'nanga-mobile-check' );
    //add_theme_support( 'nanga-modernizr' );
    //add_theme_support( 'nanga-sanity' );
    //add_theme_support( 'nanga-settings' );
    //add_theme_support( 'nanga-sidebar' );
    //add_theme_support( 'nanga-support-request' );
    //add_theme_support( 'woocommerce' );
    //load_theme_textdomain( 'vg', get_stylesheet_directory_uri() . '/languages' );
} );
