<?php if ( has_nav_menu( 'main_menu' ) ) : ?>

    <nav class="navbar navbar-light navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1-collapse">
                    <span class="sr-only"><?php _e('Toggle navigation','devdmbootstrap3'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> -->

            <?php
            wp_nav_menu([
                'theme_location'    => 'main_menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => '',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker()
            ]);
            ?>
        </div>
    </nav>

<?php endif; ?>
