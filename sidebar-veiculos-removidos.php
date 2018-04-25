<!--Veículos Removidos-->
<aside class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <?php if ( is_active_sidebar( 'veiculos-removidos' ) ) : ?>
            <div id="widget-area" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'veiculos-removidos' ); ?>
            </div><!-- .widget-area -->
    <?php endif; ?>
</aside>