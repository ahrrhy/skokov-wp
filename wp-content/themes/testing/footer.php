    <footer class=" container site-footer">

        <div class="row for-footer-menu">
            <p class="col-sm-6"><?php echo get_theme_mod('copyright_textbox', ''); ?></p>

            <div class="col-sm-6 site-nav">
                <?php
                $args = array(
                    'theme_location' => 'footer',
                    'menu'            => '',
                    'container'       => 'dic',
                    'container_class' => 'row ',
                    'container_id'    => '',
                    'menu_class'      => 'row  custom-menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                );
                ?>

                <?php wp_nav_menu($args); ?>
            </div>


        </div>

    </footer>


    <?php wp_footer(); ?>
    </body>
</html>