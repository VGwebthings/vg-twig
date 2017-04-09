<?php
add_action('admin_head', function () {
    echo '<style>body{opacity:0;transition:opacity .15s;}</style>';
    echo '<script>jQuery(window).load(function(){jQuery("body").css("opacity","1")});</script>';
}, 11);
