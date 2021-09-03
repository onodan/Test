<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">

    <link rel="icon"  href="<?php echo get_template_directory_uri();?>/assets/img/icon.ico" />
</head>
<body>
    <!--header-->
    <header class="header-page">
        <div class="container header-page_container">
            <div class="header-page_start">
                <div class="logo">
                    <?php if(is_front_page()):?>
                    <img class="logo_img" src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site-logo'));?>" alt="" width="200" height="60">
                    <?php else : ?>
                        <a href="<?php echo get_home_url();?>">
                        <img class="logo_img" src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('site-logo'));?>" alt="" width="200" height="60">

                        </a>
                        <?php endif;?>
                </div>
            </div>
            <div class="header-pade_end">
                <nav class="header-page_nav">
               

                        <?php wp_nav_menu( [
	'theme_location'  => 'menu-main-header',
	'container'       => null, 
	'menu_class'      => 'header-page_ul', 
] );
?>


                </nav>
                <div class="phone">
                    <a href="79039496829" class="phone_item haeder-page_phone"><?php echo $GLOBALS['kak_doma']['phone'] ; ?>
</a>
                </div>
                <div class="header-page_menu">
                    <button class="btn-menu" type="button" data-popup="popup-menu">
                        <span class="btn-menu_box">
                            <span class="btn-menu_inner"></span>
                        </span>

                    </button>
                </div>
            </div>
        </div>
    </header>
    <!--/header-->