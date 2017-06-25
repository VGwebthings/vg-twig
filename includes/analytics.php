<?php
if (defined('WP_ENV') && 'production' === WP_ENV) {
    add_filter('wp_resource_hints', function ($hints, $type) {
        if ('dns-prefetch' === $type) {
            $hints[] = '//www.google-analytics.com';
        }

        return $hints;
    }, 10, 2);
    /*
    add_action('wp_head', function () {
        ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', '', 'auto');
            ga('send', 'pageview');
        </script>
        <?php
    }, 1);
    */
    add_action('wp_head', function () {
        ?>
        <script src="https://cdn.jsdelivr.net/ga-lite/latest/ga-lite.min.js" async></script>
        <script>var galite = galite || {}; galite.UA = 'UA-7923073-5';</script>
        <?php
    }, 1);
}
