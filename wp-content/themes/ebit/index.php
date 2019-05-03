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

    <section class="infomoney">
        <div class="content">
            <h2>SÓ EM 2018 O VOLUME DE TRANSAÇÕES
                    REALIZADAS EM BTC ATINGIU O VALOR DE
                <strong>850 BILHOES EM DÓLARES ”</strong>
            </h2>
            <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>
            <small>Infomoney</small>
        </div>
    </section>

    <section class="diferencial" id="tecnologia">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-9 offset-lg-2">
                    <div class="content">
                        <h2>
                            <strong>TECNOLOGIA</strong>
                            DE PONTA É NOSSO DIFERENCIAL
                        </h2>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco_preto.png" alt="traço"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-12 col-md-12">
                    <div class="colunas">
                        <div class="detalhes">
                            <div class="item">Análise rápida e organizada
                                    por equipe de consultores
                                    totalmente <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/analiserapida.png" alt="Análise rápida e organizada
                                        por equipe de consultores
                                        totalmente"></span></div>
                            <div class="item">Atestada por clientes com
                                    resultados sustentáveis <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/atestada.png" alt="Atestada por clientes com
                                        resultados sustentáveis"></span></div>
                            <div class="item">Mais de 1000 empresas
                                    participantes<span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/1000empresas.png" alt="Mais de 1000 empresas
                                        participantes"></span></div>
                        </div>
                        <div class="detalhes">
                            <div class="item">Trabalhamos com empresas
                                    inovadoras modernas
                                    de olho no crescimento<span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/trabalhamos.png" alt="Trabalhamos com empresas
                                        inovadoras modernas
                                        de olho no crescimento"></span></div>
                            <div class="item">Transações digitais com
                                    total comodidade ao cliente <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/transacoes.png" alt="Transações digitais com
                                        total comodidade ao cliente"></span></div>
                            <div class="item">Construa seu futuro com
                                    a E-bit FX <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/ic_rocet.png" alt="Construa seu futuro com
                                        a E-bit FX"></span></div>
                        </div>
                        <div class="detalhes">
                            <div class="item">Mercado descentralizado<span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/mercado.png" alt="Mercado descentralizado"></span></div>
                            <div class="item">Selecionamos somente
                                    pessoas/empresas com
                                    potencial de crescime<span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/selecionamos.png" alt="Selecionamos somente
                                        pessoas/empresas com
                                        potencial de crescime"></span></div>
                            <div class="item">Modelo de negócio rentável
                                    e sustentável <span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/modelo.png" alt="Modelo de negócio rentável
                                        e sustentável"></span></div>
                            <div class="item">Sistema atual e moderno<span><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/sistemaatual.png" alt="Sistema atual e moderno"></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="formulario">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-2">
                    <div class="content">
                        <h2>
                                DESCUBRA <strong> AS MELHORES
                                OPORTUNIDADES</strong> DE
                                CRIPTOATIVOS EM MOEDAS DIGITAS
                        </h2>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>

                        <p>Moedas digitais já sao uma realidade no mundo virtual, negociáveis assim como dólar e o Euro. 
                            Uma nova forma de dinheiro digital descentralizado e sem controle do governo transações online rápidas 
                                e seguras processadas para qualquer lugar do mundo em segundos.
                                <br>
                                <br>
                                Como faço para fazer parte desse modelo de negócio digital
                            </p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 offset-lg-1 direita">
                    <p>É muito fácil! Simule seu capital com os nossos consultores 
                        intermediamos ativos digitais em operações de curto prazo. Desfrute das oportunidades no mercado decriptomoedas
                        <br>
                        <br>
                            .Faca parte do nosso time de sucesso 
                            <br>
                            Vamos conversar?</p> 

                    <form action="">
                        <input type="text" class="inpt" placeholder="Nome">
                        <input type="text" class="inpt" placeholder="E-mail">
                        <input type="text" class="inpt" placeholder="Cidade">
                        <input type="text" class="inpt" placeholder="Telefone">
                        <textarea placeholder="Mensagem"></textarea>
                        <input type="submit" class="enviar btn bgrosa" value="ENVIAR">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="newsletter"  id="vantagens"> 
        <h2>Inscreva-se em nossa newsletter</h2>
        <div class="forms">  
            <form action="">
                <input type="email" placeholder="Insira seu e-mail aqui" class="inpt">
                <input type="submit" class="send">
                
            </form>
        </div>
    </section>
    <section class="mapa">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-2">
                    <div class="content">
                        <h2>
                            unidade 1
                        </h2>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>

                        <p>São Paulo Avenida Paulista<br>
                            2.202 Edifício Paulista<br>
                            1191234-5678<br>
                            atendimento@e-bitfx.com
                        </p>
                        <a href="#" class="btn bgborda" target="_blank"><i class="fas fa-map-marker-alt"></i> NO MAPA  </a>
                    </div>
                </div>
                <div class="col-12 col-lg-3 direita">
                    <div class="content">
                        <h2>
                            unidade 2
                        </h2>
                        <div class="traco" style="margin-left: -60px;"><img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/traco.png" alt="traço"></div>
                        <p>São Paulo Avenida Paulista<br>
                            2.202 Edifício Paulista<br>
                            1191234-5678<br>
                            atendimento@e-bitfx.com
                        </p>
                        <a href="#" class="btn bgborda" target="_blank"><i class="fas fa-map-marker-alt"></i> NO MAPA  </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>