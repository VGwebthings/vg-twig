<?php
use Timber\Loader;
use Timber\Menu;
use Timber\Site;
use Timber\Timber;

class TheSite extends Site
{

    function __construct()
    {
        add_filter('timber_context', [$this, 'addToContext']);
        add_filter('get_twig', [$this, 'addToTwig']);
        add_action('init', [$this, 'registerPostTypes']);
        $this->setupCache();
        parent::__construct();
    }

    function setupCache()
    {
        if (WP_DEBUG) {
            Timber::$cache = false;
        } else {
            Timber::$cache = true;
            add_filter('timber/cache/mode', function ($cache_mode) {
                $cache_mode = Loader::CACHE_OBJECT;

                return $cache_mode;
            });
        }
    }

    function registerPostTypes()
    {
    }

    function addToContext($context)
    {
        $context['settings'] = get_fields('options');
        $context['menu']     = new Menu('primary');
        if (current_theme_supports('nanga-sidebar')) {
            $context['sidebar'] = Timber::get_sidebar('sidebar.php');
        }
        $context['site'] = $this;

        return $context;
    }

    function addToTwig($twig)
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
