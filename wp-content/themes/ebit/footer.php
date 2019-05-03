
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-center flex-wrap">
                    <img src="<?php echo home_url(); ?>/wp-content/themes/ebit/images/logo_sm.png" alt="E-bit Fx">
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
                <div class="col-12">
                    <p>
                        A E-Bit fx informa que as transações digitais realizadas na empresa não são valores mobiliários regulados pela CVM – Comissão de Valores Mobiliários. É importante destacar ao usuário que os Ativos Digitais não possuem qualquer garantia do Fundo Garantidor de Crédito – FGC, de conversão para moedas oficiais, como Real ou Dólar, além de outros ativos digitais. Não temos lastreamento em ativos de qualquer espécie. A responsabilidade pelos riscos inerentes à compra de moedas digitais é do Cliente! Antes de executar quaisquer operações na empresa, o cliente deve certificar-se dos riscos, porque as criptomoedas apresentam volatilidade em relação aos preços, podendo existir a possibilidade de perda do capital investido. A Ebit-fx não responsabiliza-se por decisões de investimentos que venham a ser tomadas com base nas informações divulgadas por terceiros e exime-se de qualquer responsabilidade por prejuízos futuros. Informações de fechamento devem ser feitas por consultores meramente credenciados pela nossa empresa. Nosso propósito e evoluir financeiramente com nossos clientes e educar financeiramente para as transações seguras de criptoativos. Um modelo de negócio do futuro, mas que já está acontecendo! Estamos à disposição para dúvidas e esclarecimentos. Informações adicionais podem ser adquiridas na nossa Central de Atendimento pelo número 18 3637-6500 ou pelo nosso e-mail atendimento@e-bitfx.com Venha para a E-Bitfx! Seja digital! Nós fazemos o futuro acontecer agora!
                    </p>
                </div>
            </div>
        </div>
        
    </footer>

    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/popper.min.js"></script>
    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/bootstrap.min.js"></script>
    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/all.min.js"></script>

    <script>

        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("header_off").style.top = "-100px";
        } else {
            document.getElementById("header_off").style.top = "0px";
        }
        prevScrollpos = currentScrollPos;
        }
        
        function openNave() {
            document.getElementById("mySidenav").style.width = "100%";
        }
        function closeNave() {
            document.getElementById("mySidenav").style.width = "0";
        }    

        $('.sidenav a').click(function(){
        $('#mySidenav').css("width", "0");
        });

        $("a").on('click', function(event) {
            if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        }});

    </script>

  </body>
</html>