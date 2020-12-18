    <?php 
        $logo = get_theme_mod('logo');
        if ($logo) {
            $logo = wp_get_attachment_image($logo);
        }

        for ($i=1; $i <= 5; $i++) { 
            $logo_ps = get_theme_mod('ps_logo_'.$i);
            if ($logo_ps) {
                $logos_ps[$i] = wp_get_attachment_image($logo_ps, 'full');
            }
        }
    ?>
    <div class="footer">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4 footer-division logo-footer">
                    <a href="<?= get_site_url() ?>">
                        <?= $logo ?>
    				    <h1 class="display-name"><?= get_theme_mod('display_name') ?></h1>
                    </a>
    				<p class="footer-logo"><?= get_bloginfo('name'); ?></p>
    				<div class="about">
    					<p>
                            <?= get_theme_mod('about') ?>
                        </p>
    				</div>
    			</div>
    			<div class="col-md-2 footer-division">
    				<p class="footer-title">Essentials Links</p>
    				<ul>
    					<?php 
                            $navbar_items = wp_get_nav_menu_items('essentials-links');
                            foreach ($navbar_items as $navbar_item) {
                                ?>
                                    <li><a href="<?= $navbar_item->url ?>"><?= $navbar_item->title ?></a></li>
                                <?php
                            }
                        ?>
    				</ul>
    			</div>
    			<div class="col-md-4 footer-division">
    				<p class="footer-title">Social Media & Portfolio Accounts</p>
    				<div class="row">
    					<div class="col-md-6" style="margin-left: -15px">
    						<ul>
		    					<?php 
                                    $navbar_items = wp_get_nav_menu_items('social-media');
                                    foreach ($navbar_items as $navbar_item) {
                                        ?>
                                            <li><a href="<?= $navbar_item->url ?>"><?= $navbar_item->title ?></a></li>
                                        <?php
                                    }
                                ?>
		    				</ul>
    					</div>
    					<div class="col-md-6" style="margin-left: -15px">
    						<ul>
		    					<?php 
                                    $navbar_items = wp_get_nav_menu_items('portfolio-accounts');
                                    foreach ($navbar_items as $navbar_item) {
                                        ?>
                                            <li><a href="<?= $navbar_item->url ?>"><?= $navbar_item->title ?></a></li>
                                        <?php
                                    }
                                ?>
		    				</ul>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-2 footer-division">
    				<p class="footer-title"><?= get_bloginfo('name'); ?></p>
    				<ul>
    					<?php 
                            $navbar_items = wp_get_nav_menu_items('your-links');
                            foreach ($navbar_items as $navbar_item) {
                                ?>
                                    <li><a href="<?= $navbar_item->url ?>"><?= $navbar_item->title ?></a></li>
                                <?php
                            }
                        ?>
    				</ul>
    			</div>
    		</div>
    		<div class="row footer-rights-partners">
    			<div class="col-md-4 mt-auto">
    				All rights reserved - <?= get_bloginfo('name'); ?> 2020
    			</div>
    			<div class="col-md-8 text-right mt-auto">
    				<p class="footer-title">Partners & Sponsors</p>
    				<?php 
                        foreach ($logos_ps as $logo_ps) {
                            echo $logo_ps;
                        }
                    ?>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/assets/js/scripts.js"></script>

    <?php wp_footer(); ?>
</body>
</html>
