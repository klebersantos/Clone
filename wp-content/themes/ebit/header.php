<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo home_url(); ?>/wp-content/themes/ebit/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo home_url(); ?>/wp-content/themes/ebit//ms-icon-144x144.png">
    <meta name="theme-color" content="#000">
    <link href="<?php echo home_url(); ?>/wp-content/themes/ebit/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo home_url(); ?>/wp-content/themes/ebit/css/responsivo.css" rel="stylesheet" type="text/css" />

	<?php wp_head(); ?>
</head>
<body <?php body_class('animated', 'fadeIn'); ?>>
    
    <header class="desktop">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="logo">
                        <!-- <img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/logo.png" alt="E-bit Fx"> -->
                        <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                           }
                            ?>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <nav>
                    <?php
                        wp_nav_menu(array(
                                'menu' => 'Menu Principal',
                                'container' => false,
                                'container_class' => '',
                                'container_id' => '',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'depth' => 0,
                                'walker' => new Description_Walker,
                                'theme_location' => ''
                        ));
                        ?>
                        <!-- <ul>                              
                            <li><a href="#vantagens" class="scrollLink">VANTAGENS</a></li>
                            <li><a href="#">QUEM SOMOS</a></li>
                            <li><a href="#">COMO FUNCIONA</a></li>
                            <li><a href="#">BLOG</a></li>
                        </ul> -->
                    </nav>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="botoes">
                        <a href="#" class="btn bgborda animated ">LOGIN</a>
                        <a href="#" class="btn bgazul">CADASTRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php if( have_rows('redes_sociais', option) ): // Se tiverem chamadas  ?>
    <div class="social_header">
        <?php // Listar chamadas
        while( have_rows('redes_sociais', option) ): the_row(); 
            $icone = get_sub_field('icone');
            $nome_rede = get_sub_field('nome');
            $link_rede = get_sub_field('link'); ?>

            <a href="<?php echo $link_rede; ?>" class="bt--social" target="_blank" title="<?php echo $nome_rede; ?>">
                <?php echo $icone; ?>
            </a>
    
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <!-- <div class="social_header">
        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" title="Youtube"><i class="fab fa-youtube"></i></a>
        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
    </div> -->

    <!-- menu por cima-->

    <div class="header_off" id="header_off">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 col-lg-3">
                    <div class="logo">
                        <!-- <img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/logo.png" alt="E-bit Fx"> -->
                        <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                           }
                            ?>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <nav>
                    <?php
                        wp_nav_menu(array(
                                'menu' => 'Menu Principal',
                                'container' => false,
                                'container_class' => '',
                                'container_id' => '',
                                'menu_id' => '',
                                'echo' => true,
                                'fallback_cb' => 'wp_page_menu',
                                'before' => '',
                                'after' => '',
                                'link_before' => '',
                                'link_after' => '',
                                'depth' => 0,
                                'walker' => new Description_Walker,
                                'theme_location' => ''
                        ));
                        ?>
                        <!-- <ul>                              
                            <li><a href="#vantagens" class="scrollLink">VANTAGENS</a></li>
                            <li><a href="#">QUEM SOMOS</a></li>
                            <li><a href="#">COMO FUNCIONA</a></li>
                            <li><a href="#">BLOG</a></li>
                        </ul> -->
                    </nav>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="botoes">
                        <a href="#" class="btn bgborda animated ">LOGIN</a>
                        <a href="#" class="btn bgazul">CADASTRAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- fim menu por cima-->

    <!-- mobile -->

    <header class="mob_header nav-down">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <div class="marca"> 
                        <?php
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            }
                        ?>
                    </div>
                </div>
                <div class="col-3">
                    <a onclick="openNave()" class="hamb icon-menu">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn hamb" onclick="closeNave()">&times;</a>
        <nav class="navbar navbar-expand-md">
            <?php
                wp_nav_menu(array(
                        'menu' => 'Menu Principal',
                        'container' => false,
                        'container_class' => '',
                        'container_id' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => 'wp_page_menu',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'depth' => 0,
                        'walker' => new Description_Walker,
                        'theme_location' => ''
                ));
            ?>
            <!-- <ul>                              
                <li><a href="#vantagens">VANTAGENS</a></li>
                <li><a href="#">QUEM SOMOS</a></li>
                <li><a href="#">COMO FUNCIONA</a></li>
                <li><a href="#">BLOG</a></li>
            </ul> -->
        </nav>
        <div class="outros">
            <div class="right">
                <?php if( have_rows('redes_sociais', option) ): // Se tiverem chamadas  ?>
                <div class="social">
                    <?php // Listar chamadas
                    while( have_rows('redes_sociais', option) ): the_row(); 
                        $icone = get_sub_field('icone');
                        $nome_rede = get_sub_field('nome');
                        $link_rede = get_sub_field('link'); ?>

                        <a href="<?php echo $link_rede; ?>" class="bt--social" target="_blank" title="<?php echo $nome_rede; ?>">
                            <?php echo $icone; ?>
                        </a>
                
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <!-- <div class="social">
                    <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" title="Youtube"><i class="fab fa-youtube"></i></a>
                    <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>                       
                </div> -->
            </div>
        </div>
    </div>
    