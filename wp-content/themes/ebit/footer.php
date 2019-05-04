
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
                    <?php the_field("texto", option) ?>         
                    </p>
                </div>
            </div>
        </div>
        
    </footer>

    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/popper.min.js"></script>
    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/bootstrap.min.js"></script>
    <script src="<?php echo home_url(); ?>/wp-content/themes/ebit/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            swal(
                'Mensagem enviada com sucesso! Obrigado.',
                '',
                'success'
            )
            
            // Contato
            if ( '103' == event.detail.contactFormId ) {
                swal(
                    'Mensagem enviada com sucesso! Obrigado.',
                    '',
                    'success'
                )
            }
            
        }, false );

        document.addEventListener( 'wpcf7invalid', function( event ) {
            swal(
                'Atenção',
                'Um ou mais campos possuem um erro. Verifique e tente novamente.',
                'warning'
            )
        }, false );

        document.addEventListener( 'wpcf7mailfailed', function( event ) {
            swal(
                'Erro',
                'Ocorreu um erro ao tentar enviar sua mensagem. Tente novamente mais tarde.',
                'error'
            )
        }, false );

    </script>


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