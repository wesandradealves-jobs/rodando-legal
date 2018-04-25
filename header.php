<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <title><?php if (is_front_page()) { echo get_bloginfo('title')." - ".get_bloginfo('description'); } else { echo get_bloginfo('title')." - ".get_the_title(); } ?></title>

    <?php wp_meta(); ?>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta http-equiv="Content-Style-Type" content="text/css" />

    <meta http-equiv="Content-Script-Type" content="text/javascript" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/php;charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />

    <meta name="DC.title" content="<?php echo get_bloginfo('title'); ?>" />

    <meta name="DC.creator " content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />

    <meta name="DC.creator.address" content="http://www.github.com/wesandradealves" />

    <meta name="DC.description" content="<?php echo get_bloginfo('description'); ?>" />

    <meta name="DC.publisher" content="Grupo L2R | http://www.grupol2r.com.br/" />

    <meta name="DC.Identifier" content="<?php echo site_url(); ?>">

    <!--cache-->

    <meta http-equiv="cache-Control" content="public, max-age=1" />

    <meta http-equiv="expires" content="0" />

    <!--<meta http-equiv="pragma" content="no-cache" />-->

    <!---->

    <meta name="apple-mobile-web-app-capable" content="yes" />

    <meta name="HandheldFriendly" content="true" />

    <meta name="audience" content="all" />

    <meta name="author" content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />

    <meta name="copyright" content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />

    <meta name="resource-type" content="Document" />

    <meta name="distribution" content="Global" />

    <meta name="robots" content="index, follow, ALL" />

    <meta name="GOOGLEBOT" content="index, follow" />

    <meta name="rating" content="General" />

    <meta name="revisit-after" content="2 Days" />

    <meta http-equiv="content-language" content="pt_BR" />

    <meta name="language" content="pt_BR" />

    <meta property="og:locale" content="pt_BR" />

    <meta property="og:type" content="website" />

    <meta property="og:title" content="<?php echo get_bloginfo('title'); ?>" />

    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />

    <meta property="og:url" content="<?php echo site_url(); ?>" />

    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />

    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />

    <link rel="canonical" href="<?php echo site_url(); ?>" />

    <?php wp_head(); ?>

</head>

<body 

    <?php

    global $post;

    if (is_front_page()) {

      echo 'class="pg-home"';

    } else if(is_archive()){

      echo 'class="pg-archive pg-interna"';

    } else if(is_category()){

      echo 'class="pg-category pg-interna"';

    } else if(is_search()){

      echo 'class="pg-search pg-interna"';

    } else if(is_single()){

      echo 'class="pg-single pg-interna"';

    } else {

      echo 'class="pg-interna page_id_'.$post->ID.'"';

    }

    ?>>

    <div id="wrap">

        <nav id="mobileNavigation" class="visible-xs">

            <ul>

                <?php wp_nav_menu( array( 'container' => false, 'menu' => 'Mobile', 'items_wrap' => '%3$s' ) ); ?>   

            </ul>

        </nav>

        <header>

            <?php if(get_theme_mod('email')||get_theme_mod('telefone')) : ?>

            <div id="topo">

                <div class="container text-right">

                    <ul class="text-right">

                        <?php if(get_theme_mod('telefone')) : ?>

                        <li><i><svg class="svg-icon" viewBox="0 0 20 20">

							<path d="M17.659,3.681H8.468c-0.211,0-0.383,0.172-0.383,0.383v2.681H2.341c-0.21,0-0.383,0.172-0.383,0.383v6.126c0,0.211,0.172,0.383,0.383,0.383h1.532v2.298c0,0.566,0.554,0.368,0.653,0.27l2.569-2.567h4.437c0.21,0,0.383-0.172,0.383-0.383v-2.681h1.013l2.546,2.567c0.242,0.249,0.652,0.065,0.652-0.27v-2.298h1.533c0.211,0,0.383-0.172,0.383-0.382V4.063C18.042,3.853,17.87,3.681,17.659,3.681 M11.148,12.87H6.937c-0.102,0-0.199,0.04-0.27,0.113l-2.028,2.025v-1.756c0-0.211-0.172-0.383-0.383-0.383H2.724V7.51h5.361v2.68c0,0.21,0.172,0.382,0.383,0.382h2.68V12.87z M17.276,9.807h-1.533c-0.211,0-0.383,0.172-0.383,0.383v1.755L13.356,9.92c-0.07-0.073-0.169-0.113-0.27-0.113H8.851v-5.36h8.425V9.807z"></path>

						</svg></i> <?php echo get_theme_mod('telefone'); ?></li> 

                        <?php endif; ?>

                        <?php if(get_theme_mod('email')) : ?>

                        <li><a title="<?php echo get_theme_mod('email'); ?>" href="mailto:<?php echo get_theme_mod('email'); ?>"><i><svg class="svg-icon" viewBox="0 0 20 20">

							<path d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>

						</svg></i> <?php echo get_theme_mod('email'); ?></a></li>

                        <?php endif; ?>

                    </ul>

                </div>

            </div>

            <?php else : ?>

            <style type="text/css">

                header #header .logo {

                    margin: 0px 0 -75px 0 !important;

                }            

            </style>            

            <?php endif; ?>

            <div id="header">

                <div class="container">

                    <a class="col-lg-3 col-md-3 col-sm-4 col-xs-9 logo" href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">

                    <?php 

                        if ( get_theme_mod( 'logo' ) ) :

                            echo "<img src='".esc_url( get_theme_mod( 'logo' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>";

                        else : 

                            echo "<span>".esc_attr( get_bloginfo( 'name', 'display' ) )."</span>";

                        endif;

                    ?>

                    </a>                    

                    <nav class="col-lg-9 col-md-9 col-sm-8 col-xs-3 text-right">

                        <ul class="text-right">

                            <?php wp_nav_menu( array( 'container' => false, 'menu' => 'Header', 'items_wrap' => '%3$s' ) ); ?>   

                            <li class="visible-xs">

                                <button onclick="mobileNavigation()" type="button" class="tcon tcon-menu--xcross" aria-label="toggle menu">

                                    <span class="tcon-menu__lines" aria-hidden="true"><!----></span>

                                    <span class="tcon-visuallyhidden">toggle menu</span>

                                </button>                            

                            </li>

                        </ul>

                    </nav>                    

                </div>

            </div>

        </header>