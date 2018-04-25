    <footer>

        <div id="footer">

            <div class="container">

                <div  class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                    <a class="logo" href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">

                    <?php 

                        if ( get_theme_mod( 'logo-rodape' ) ) :

                            echo "<img height='70' src='".esc_url( get_theme_mod( 'logo-rodape' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>";

                        else : 

                            echo "<span>".esc_attr( get_bloginfo( 'name', 'display' ) )."</span>";

                        endif;

                    ?>

                    </a>   

                    <?php if ( get_theme_mod( 'texto-rodape' ) ) : ?>

                    <p><?php echo get_theme_mod('texto-rodape'); ?></p>

                    <?php endif; ?>

                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 clearfix">

                    <nav class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center">

                        <ul class="text-left">

                            <?php wp_nav_menu( array( 'container' => false, 'menu' => 'Footer', 'items_wrap' => '%3$s' ) ); ?>  

                        </ul>

                    </nav>

                    <div id="newsletter" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                        <p><strong>Assine Nossa Newsletter</strong></p>

                        <?php echo do_shortcode('[wysija_form id="1"]'); ?>

                    </div>

                </div>   

            </div>

        </div>

        <div id="copyright">

            <div class="container">

                <p class="text-center">&#169; <?php echo date('Y')." ".esc_attr( get_bloginfo( 'name', 'display' ) ); ?>, Todos os direitos reservados.</p>

            </div>

        </div>

    </footer>

    <?php wp_footer(); ?>

    <script>
    transformicons.add('.tcon');
    </script>

</body>

</html>