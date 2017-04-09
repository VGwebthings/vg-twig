<?php
use Timber\Loader;
use Timber\Menu;
use Timber\Site;
use Timber\Timber;

class TheSite extends Site
{

    function __construct()
    {
        add_filter('get_twig', [$this, 'addToTwig']);
        // add_filter('post_type_labels_post', [$this, 'defaultPostLabels']);
        add_filter('timber_context', [$this, 'addToContext']);
        add_action('init', [$this, 'registerPostTypes']);
        $this->setupCache();
        parent::__construct();
    }

    function setupCache()
    {
        Timber::$cache = false;
        if (defined('WP_ENV') && 'production' === WP_ENV) {
            Timber::$cache = true;
            add_filter('timber/cache/mode', function ($cacheMode) {
                $cacheMode = Loader::CACHE_OBJECT;

                return $cacheMode;
            });
        }
    }

    function defaultPostLabels($labels)
    {
        $labels->add_new               = 'Νέο άρθρο';
        $labels->add_new_item          = 'Προσθήκη άρθρου';
        $labels->all_items             = 'Όλα τα άρθρα';
        $labels->archives              = 'Αρχείο Άρθρων';
        $labels->attributes            = 'Χαρακτηριστικά άρθρου';
        $labels->edit_item             = 'Επεξεργασία άρθρου';
        $labels->featured_image        = 'Επιλεγμένη εικόνα';
        $labels->filter_items_list     = 'Φίλτρο λίστας άρθρων';
        $labels->insert_into_item      = 'Εισαγωγή στο άρθρο';
        $labels->items_list            = 'Λίστα άρθρων';
        $labels->items_list_navigation = 'Λίστα πλοήγησης άρθρων';
        $labels->menu_name             = 'Άρθρα';
        $labels->name                  = 'Άρθρα';
        $labels->name_admin_bar        = 'Άρθρου';
        $labels->new_item              = 'Νέο άρθρο';
        $labels->not_found             = 'Δεν βρέθηκαν άρθρα. ';
        $labels->not_found_in_trash    = 'Δεν βρέθηκαν άρθρα στα διαγραμένα.';
        $labels->remove_featured_image = 'Αφαίρεση επιλεγμένης εικόνας';
        $labels->search_items          = 'Αναζήτηση άρθρων';
        $labels->set_featured_image    = 'Ορισμός επιλεγμένης εικόνας ';
        $labels->singular_name         = 'Άρθρο';
        $labels->uploaded_to_this_item = 'Μεταφορτώθηκε στο άρθρο';
        $labels->use_featured_image    = 'Χρήση ως επιλεγμένη εικόνα';
        $labels->view_item             = 'Προβολή άρθρου';
        $labels->view_items            = 'Προβολή Άρθρων';

        return $labels;
    }

    function registerPostTypes()
    {
    }

    function addToContext($context)
    {
        //$context['settings'] = get_fields('options');
        //$context['menu']     = new Menu('primary');
        if (current_theme_supports('nanga-sidebar')) {
            $context['sidebar'] = Timber::get_sidebar('sidebar.php');
        }
        $context['site'] = $this;

        return $context;
    }

    function addToTwig($twig)
    {
        // $twig->addFilter('antispam', new Twig_Filter_Function([$this, 'antispam']));
        // $twig->addExtension(new \nochso\HtmlCompressTwig\Extension(true));
        $twig->addExtension(new Twig_Extension_StringLoader());

        return $twig;
    }

    function antispam($email)
    {
        return antispambot($email);
    }
}

new TheSite();
