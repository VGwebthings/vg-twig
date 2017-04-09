<?php
if ('production' != WP_ENV) {
    add_action('phpmailer_init', function ($phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->Host     = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port     = 2525;
        $phpmailer->Username = MAILTRAP_USERNAME;
        $phpmailer->Password = MAILTRAP_PASSWORD;
    });
}
