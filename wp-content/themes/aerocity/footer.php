        </div>
        <!--close content class tag-->
        <footer class="footer" role="contentinfo">
            <div class="footer-flex">

                <div class="footer-info">
                    <div class="footer-info__wrapper">
                        <div>
                            <a class="logo-link" href="<?php echo get_home_url(); ?>">
                                <img src="<?php the_field('website_logo_image', 'options'); ?>" class="footer__logo-image" alt="logo-image"/>
                            </a>
                        </div>

                        <div><a href="mailto:<?php the_field('website_email', 'options'); ?>" class="footer-info__email"><?php the_field('website_email', 'options'); ?></a></div>
                        <div><a href="tel:<?php the_field('website_phone', 'options'); ?>" class="footer-info__phone"><?php the_field('website_phone', 'options'); ?></a></div>
                    </div>

                    <?php
                    $link = get_field('copyright', 'options');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                       <div>
                            <a class="footer-info__copyright" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                Copyright ©<?php echo date("Y"); ?>
                                <?php echo esc_html($link_title); ?>
                            </a>
                       </div>
                    <?php endif; ?>
                </div>

                <nav class="footer-nav" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_class' => 'footer-nav__list', 'container' => false ) ); ?>

                    <div class="footer-nav__mobile">
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-4', 'menu_class' => 'footer-nav__sublist', 'container' => false ) ); ?>
                    </div>
                </nav>

                <div class="footer__additional-info">
                    <div class="social-nav_footer">
                        <?php get_template_part('template-parts/sections/template-elements/social'); ?>
                    </div>

                    <?php wp_nav_menu( array( 'theme_location' => 'menu-4', 'menu_class' => 'footer-nav__list', 'container' => false ) ); ?>
                </div>
            </div>
        </footer>
    </div>
    <!--close wrapper class tag-->
<?php wp_footer(); ?>

</body>
</html>
