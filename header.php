<?php 
    $logo = get_theme_mod('logo');
    if ($logo) {
        $logo = wp_get_attachment_image($logo);
    }
?>
<style>
    :root {
        --color02: <?= get_theme_mod('primary_color') ?> !important;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0'">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800,900&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/assets/css/style.css">
	<?php wp_head(); ?>
    <title><?= get_bloginfo('name'); ?> <?php if(wp_title()) { echo "- "; wp_title();} ?></title>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <div class="row navbar-mobile">
                <div class="col-6 my-auto">
                    <span class="navbar-logo navbar-logo-mobile">
                        <a href="<?= get_site_url() ?>">
                            <?= $logo ?>
                            <h1 class="display-name">
                                <?= get_theme_mod('display_name') ?>
                            </h1>
                        </a>
                    </span>
                </div>
                <div class="col-6 text-right my-auto">
                    <button class="btn-menu">
                        <span class="hamburguer"></span>
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-auto">
                    <ul class="navbar-itens">
                        <li class="navbar-logo">
                            <a href="<?= get_site_url() ?>">
                                <?= $logo ?>
                                <h1 class="display-name">
                                    <?= get_theme_mod('display_name') ?>
                                </h1>
                            </a>
                        </li>

                        <?php 
                            $navbar_items = wp_get_nav_menu_items('navbar-top');
                            foreach ($navbar_items as $navbar_item) {
                                if($navbar_item->title != 'Button') {
                                    ?>
                                        <li><a href="<?= $navbar_item->url ?>"><?= $navbar_item->title ?></a></li>
                                    <?php
                                } else {
                                    $link_button = $navbar_item->url;
                                    $text_button = $navbar_item->title;
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-4 text-right my-auto navbar-right">
                    <?php 
                        if(get_theme_mod('button_text') && get_theme_mod('button_url')) {
                            ?>
                            <a href="<?= get_theme_mod('button_url') ?>">
                                <button class="btn">
                                    <?= get_theme_mod('button_text') ?>
                                </button>
                            </a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        $alert_txt = get_theme_mod('text_alert');
        if($alert_txt) {
            ?>
            <div class="alert">
                <div class="container">
                    <div class="row">
                        <div class="col-12 my-auto">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icon-alert.png" alt="Alert Icon">
                            <?= $alert_txt ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>