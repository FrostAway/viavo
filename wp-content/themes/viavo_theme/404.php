<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />

        <title>Page Not Found</title>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/assets/css/style.css" />
    </head>

    <body <?php body_class(); ?>>
        <div id="container">
            <div class="page404">
                <h2>Viavo Error 404 - Page Not Found</h2>
                <img src="<?= get_template_directory_uri()?>/assets/images/404.jpg" title="page not found" />
                <h4>Quay về <a href="<?= home_url() ?>">Trang chủ </a></h4>
            </div>
        </div>
    </body>
</html>