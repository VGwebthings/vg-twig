<?php
use Timber\Menu;
use Timber\Site;
use Timber\Timber;

class TheSite extends Site
{

    function __construct()
    {
        add_filter('timber_context', [$this, 'add_to_context']);
        add_filter('get_twig', [$this, 'add_to_twig']);
        //add_action( 'init', array( $this, 'register_post_types' ) );
        parent::__construct();
    }

    function register_post_types()
    {
    }

    function add_to_context($context)
    {
        $context['settings'] = get_fields('options');
        $context['menu']     = new Menu('primary');
        if (current_theme_supports('nanga-sidebar')) {
            $context['sidebar'] = Timber::get_sidebar('sidebar.php');
        }
        $context['site'] = $this;

        return $context;
    }

    function add_to_twig($twig)
    {
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter('antispam', new Twig_Filter_Function([$this, 'antispam']));

        return $twig;
    }

    function antispam($email)
    {
        return antispambot($email);
    }
}

new TheSite();

Timber::$cache = false;
