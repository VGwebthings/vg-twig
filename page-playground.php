<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
    <?php tha_head_top(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php tha_head_bottom(); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div id="page">
    <?php tha_header_before(); ?>
    <?php tha_header_top(); ?>
    <?php tha_header_bottom(); ?>
    <?php tha_header_after(); ?>
    <?php tha_content_before(); ?>
    <div id="content" role="main">
        <?php tha_content_top(); ?>
        <?php while ( have_posts() ) { ?>
            <?php the_post(); ?>
            <?php tha_entry_before(); ?>
            <?php tha_entry_top(); ?>
            <?php the_content(); ?>
            <?php if ( comments_open() || '0' != get_comments_number() ) : comments_template(); endif; ?>
            <?php tha_entry_bottom(); ?>
            <?php tha_entry_after(); ?>
        <?php } ?>
        <?php tha_content_bottom(); ?>
    </div>
    <?php tha_content_after(); ?>
</div>
<?php tha_footer_before(); ?>
<?php tha_footer_top(); ?>
<?php wp_footer(); ?>
<?php tha_footer_bottom(); ?>
<?php tha_footer_after(); ?>
<?php tha_body_bottom(); ?>
</body>
</html>
