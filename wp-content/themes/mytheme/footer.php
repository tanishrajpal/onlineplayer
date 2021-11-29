<footer id="footer">
        <div class="container">
          <div class="row flex-row-reverse">
            <div class="col-lg-9 col-md-8">
              <div class="wrapper">
                <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',
                            'menu_class' => 'footer-nav',
                            'container'  => '',
                        )
                        );                            
                ?>
                <div class="contact">
                  <div class="row align-items-end">
                    <div class="col-lg-6">
                      <h4><?php the_field('join_our_mailing_list','options');?></h4>
                      <div class="form">
                        <form action="#">
                          <div class="row g-0">
                            <div class="col">
                              <input type="text" placeholder="Email" class="form-control">
                            </div>
                            <div class="col-auto">
                              <button type="submit"><i class="fal fa-long-arrow-right"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="sociable">
                        <h4><?php the_field('follow_us','options');?></h4>
                        <a href="<?php the_field('facebook_url','options');?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php the_field('instagram_url','options');?>"><i class="fab fa-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="logo">
              <a href="<?php echo site_url();?>">
                <img src="<?php the_field('footer_logo_image','options');?>" alt="<?php the_title(); ?>">
              </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-9 col-md-8 ms-auto">
              <div class="copyright">
                <div class="wrapper">
                  <p><?php the_field('footer_copyright_text','options'); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php wp_footer();?>
      </footer>
      <!-- /footer -->
    </div>
    <!-- /container -->
  </body>
</html>