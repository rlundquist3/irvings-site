<?php 

    $hide_services = get_theme_mod('hide_services', '1');
    
    if( $hide_services == ''){ ?>

  <!-- Service Section-->

  <section id="services" class="services text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <?php if ( !empty($jeweltheme_polmo_service_heading_title) && !empty($jeweltheme_polmo_service_desc) ){ ?>
              <h2 class="section-title">
                <?php echo  $jeweltheme_polmo_service_heading_title; ?>
              </h2>
              <p class="section-description">
                <?php echo  $jeweltheme_polmo_service_desc; ?>
              </p><!-- /.section-description -->
            <?php } ?>

          </div><!-- /.section-top -->

          <div class="section-details">
            <div class="service-details">

              <?php for($is=1; $is<5; $is++) { 
                if( get_theme_mod('page-column'.$is,false) ) {
                  $queryvar = new wp_query('page_id='.get_theme_mod('page-column'.$is,true));       
                  while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 

                    <div class="col-md-3 col-sm-6">
                      <div class="item wow animated fadeInRight" data-wow-delay=".35s">
                          <div class="item-icon">
                            <?php if ( has_post_thumbnail() ) {
                              the_post_thumbnail( array(65,65,true));
                              } else { ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/img_404.png" width="65" alt=""/>
                            <?php } ?>
                          </div><!-- /.item-icon -->
                          <div class="item-details">
                            <h4 class="item-title"><?php the_title(); ?></h4><!-- /.item-title -->
                            <p class="item-description">
                              <?php the_excerpt(); ?>
                            </p><!-- /.item-description -->
                          </div><!-- /.item-details -->
                      </div><!-- /.item -->
                    </div>


              <?php endwhile;
              wp_reset_postdata();
              ?>
              <?php } else { 

                  if ( current_user_can( 'edit_theme_options' ) ){
                      printf( __( 'There is Nothing to Show. Please Create a <a href="%s">New Page</a>? <br>', 'polmo-lite' ), esc_url( admin_url( 'post-new.php?post_type=page' ) ));
                  }

              }
           } // End for loop ?>


            </div><!-- /.service-details -->
          </div><!-- /.section-details -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#services -->

  <!-- Service Section-->


  <?php } ?>