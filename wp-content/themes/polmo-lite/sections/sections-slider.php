<?php
$polmo_hide_slide = get_theme_mod('hide_slider', '1');

if( $polmo_hide_slide == '' ){ ?>

<?php for($slide =1; $slide<3; $slide++) {
  if( get_theme_mod('page-setting'.$slide)) {
  $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$slide,true));
  while( $slidequery->have_posts() ) { $slidequery->the_post();
    $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
    $img_arr[] = $image;
    $id_arr[] = $post->ID;
      
}    }
  }
?>


<?php if(!empty($id_arr)){ ?>

  <section id="main-slider" class="main-slider text-center">
    <div class="head-overlay">
      <ul class="bxslider">
        

      <?php 
      $i=1;
      foreach($id_arr as $id){ 
        $title = get_the_title( $id ); 
        $post = get_post($id); 
        ?>       


        <li>
          <div class="head-overlay">
            <?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
            if( !empty($image) ){ ?>
              <img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title();?>" >
            <?php } else{?>
              <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slider/default.jpg" title="<?php the_title(); ?>" />
            <?php } ?>
          </div><!-- /.head-overlay -->

          <div class="slider-text">
            <div class="slide-inner">            
              <h2 class="slider-title" data-animation="wow animated bounceInDown"><?php echo $title; ?></h2>
              <p class="slide-description">
                <?php the_excerpt(); ?>
              </p>
              <div class="slide-btn-container">
                <a class="btn" href="<?php the_permalink(); ?>">
                  <?php echo esc_attr( 'Download Now!','polmo-lite' ); ?>
                </a>
              </div><!-- /.slide-btn-container -->
            </div><!-- /.slide-inner -->
          </div><!-- /.slider-text -->
        </li>


        <?php $i++; } ?>  
      </ul>
    </div><!-- /.head-overlay -->
    
    <div class="clear"></div>        

  </section><!-- /#main-slider --> 

<?php } else{ 
          if ( current_user_can( 'edit_theme_options' ) ){
              printf( __( 'There is Nothing to Show. Please Create a <a href="%s">New Page</a>? <br>', 'polmo-lite' ), esc_url( admin_url( 'post-new.php?post_type=page' ) ));
          }
  } } ?>