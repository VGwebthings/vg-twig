<?php
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
        parent::__construct();
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

Timber::$cache = false;
