<?php get_header(); ?>

    <!-- fim mobile -->

    <span class="scroll-line"><span class="nome">scroll down</span></span>
    <?php  
    $banArgs = array(
        'post_type' => 'banner',
    );
    $banQuery = new WP_Query($banArgs);
    ?>
    <?php if($banQuery->have_posts()): ?>
    <?php while($banQuery->have_posts()) : $banQuery->the_post(); ?>
    <?php
        $tituloBtn = get_field('botao_texto');
        $link = get_field('link');
        $img_url = get_the_post_thumbnail_url();
    ?>
    <section class="banner"  style="background-image: url('<?php echo $img_url; ?>');">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-lg-2 col-lg-6 col-12">
                    <div class="content">
                        <h1><?php the_title(); ?></h1>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>
                        <h2><?php the_content(); ?></h2>
                        <a target="_blank" href="<?php echo $link; ?>" class="btn bgrosa"><?php echo $tituloBtn; ?></a>
                    </div> 
                </div>
                
                <div class="col-lg-4 col-12">
                <?php if( have_rows('lista') ): ?>
                <div class="detalhes">
                    <?php
                    while( have_rows('lista') ): the_row(); 
                        $imagem = get_sub_field('imagem');
                        $texto_ = get_sub_field('texto'); ?>
                        <div class="item"><?php echo $texto_; ?><span><img src="<?php echo $imagem; ?>" alt="<?php echo $texto_; ?>"></span></div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
                </div>
                <!-- <div class="col-lg-4 col-12">
                    <div class="detalhes">
                        <div class="item">Crescimento ágil <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/i1.png" alt="Crescimento ágil"></span></div>
                        <div class="item">Atendimento Excelente <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/ic2.png" alt="Atendimento Excelente"></span></div>
                        <div class="item">Construa seu futuro <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/ic3.png" alt="Construa seu futuro"></span></div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    
    <?php endwhile; ?>
    
    <?php endif; ?>



    <?php  
    $pagArgs3 = array(
        'page_id' => '71',
        'post_status' => 'publish'
    );
    $pagQuery3 = new WP_Query($pagArgs3);
    ?>
    <?php if($pagQuery3->have_posts()): ?>
    <?php while($pagQuery3->have_posts()) : $pagQuery3->the_post(); ?>
    <section class="infomoney"  style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="content">
            <?php the_content(); ?>
            <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>
            <small><?php the_title(); ?></small>
        </div>
    </section>

    <?php endwhile; endif;?>
    <?php wp_reset_postdata(); ?>

    
    <?php  
    $pagArgs4 = array(
        'page_id' => '36',
        'post_status' => 'publish'
    );
    $pagQuery4 = new WP_Query($pagArgs4);
    ?>
    <?php if($pagQuery4->have_posts()): ?>
    <?php while($pagQuery4->have_posts()) : $pagQuery4->the_post(); ?>

    <section class="diferencial" id="tecnologia" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-9 offset-lg-2">
                    <div class="content">
                        <?php the_content(); ?>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco_preto.png" alt="traço"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-12 col-md-12">
                    <div class="colunas">
                        <?php if( have_rows('lista') ): ?>
                        <div class="detalhes">
                            <?php
                            $i = -1;
                            while( have_rows('lista') ): the_row(); 
                                $imagem = get_sub_field('imagem');
                                $texto_ = get_sub_field('texto'); 

                                if($i != 0 && $i%3 == 0) echo '</div><div class="detalhes">'; $i++; ?>
                                <div class="item"><?php echo $texto_; ?><span><img src="<?php echo $imagem; ?>" alt="<?php echo $texto_; ?>"></span></div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; endif;?>
    <?php wp_reset_postdata(); ?>


    <?php  
    $pagArgs2 = array(
        'page_id' => '75',
        'post_status' => 'publish'
    );
    $pagQuery2 = new WP_Query($pagArgs2);
    ?>
    <?php if($pagQuery2->have_posts()): ?>
    <?php while($pagQuery2->have_posts()) : $pagQuery2->the_post(); ?>
    <section class="formulario">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-2">
                    <div class="content">
                        <?php the_field('titulo'); ?>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-12 col-lg-3 offset-lg-1 direita">
                   <?php the_excerpt(); ?>
                   
                   <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact form 1"]' ); ?>
                    <!-- <form action="">
                        <input type="text" class="inpt" placeholder="Nome">
                        <input type="text" class="inpt" placeholder="E-mail">
                        <input type="text" class="inpt" placeholder="Cidade">
                        <input type="text" class="inpt" placeholder="Telefone">
                        <textarea placeholder="Mensagem"></textarea>
                        <input type="submit" class="enviar btn bgrosa" value="ENVIAR">
                    </form> -->
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; endif;?>
    <?php wp_reset_postdata(); ?>

    <section class="blog_">

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h2>Blog</h2>

                    <div class="lista">

                    

                    <?php include_once(ABSPATH . WPINC . '/feed.php');
                        if(function_exists('fetch_feed')) {
                            $feed = fetch_feed('https://blog.e-bitfx.com/feed/');
                            if (!is_wp_error($feed)) : $feed->init();
                                $feed->set_output_encoding('UTF-8');	// set encoding
                                $feed->handle_content_type();		// ensure encoding
                                $feed->set_cache_duration(21600);	// six hours in seconds
                                $limit = $feed->get_item_quantity(10);	// get 10 feed items
                                $items = $feed->get_items(0, $limit);	// set array
                            endif;
                        }

                        if ($limit == 0) { 
                            echo '<p>RSS Feed currently unavailable.</p>'; 
                        } else {
                            // display first five feed items$thumb_id = get_post_thumbnail_id();
                            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                            $thumb_url = $thumb_url_array[0];
                            $blocks = array_slice($items, 0, 3);
                            foreach ($blocks as $block) { ?>
                                <div class="item">
                                    <div class="box_img">
                                        <a href="<?php echo $block->get_permalink(); ?>">
                                        <?php echo $thumb_url->get_the_post_thumbnail_url[0]; ?>
                                        </a>
                                    </div>
                                    <div class="data"> <?php echo $block->get_date("d/m/Y "); ?></div>
                                    <p>
                                        <?php echo substr($block->get_description(), 0, 200); ?> 
                                    </p>
                                    <a target="_blank" href="<?php echo $block->get_permalink(); ?>">Veja mais</a>

                                </div>
                            <?php }

                            
                        } ?>


                        
                    
                    </div>
                
                </div>
            </div>
        </div>
    
    </section>


    <section class="newsletter"  id="vantagens"> 
        <h2>Inscreva-se em nossa newsletter</h2>
        <div class="forms">  
                <!-- <input type="email" placeholder="Insira seu e-mail aqui" class="inpt">
                <input type="submit" class="send">
                 -->
                
                <?php  echo do_shortcode( '[contact-form-7 id="103" title="newsletter"]' ); ?>
                
        </div>
    </section>

    


    <?php  
    $pagArgs = array(
        'page_id' => '88',
        'post_status' => 'publish'
    );
    $pagQuery = new WP_Query($pagArgs);
    ?>
    <?php if($pagQuery->have_posts()): ?>
    <?php while($pagQuery->have_posts()) : $pagQuery->the_post(); ?>

    <section class="mapa">
        <div class="container">
            <div class="row">

                <?php if( have_rows('enderecos') ): // Se tiverem chamadas  ?>
                    <?php // Listar chamadas
                    while( have_rows('enderecos') ): the_row(); 
                    $nome = get_sub_field('nome');
                    $endereco = get_sub_field('endereco_completo');
                    $link = get_sub_field('link'); ?>
                    <div class="col-12 col-lg-3 offset-lg-2">

                    <div class="content">
                        <h2>
                        <?php echo $nome; ?>
                        </h2>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>

                        <?php echo $endereco; ?>

                        <a href="<?php echo $link; ?>" class="btn bgborda" target="_blank"><i class="fas fa-map-marker-alt"></i> NO MAPA  </a>
                    </div>
                    </div>
                    
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>
        </div>
    </section>

    <?php endwhile; endif;?>
    <?php wp_reset_postdata(); ?>


    <?php get_footer(); ?>