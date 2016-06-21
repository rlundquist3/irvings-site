<?php
$jeweltheme_polmo_blog_heading = get_theme_mod('jeweltheme_polmo_blog_heading',__('<span>Our</span> Latest Blog Posts','polmo-lite'));

?>
  <!-- Latest Blog Post -->

  <section id="blog" class="blog text-center">
    <div class="section-padding">
      <div class="container">
        <div class="row">
          <div class="section-top wow animated fadeInUp" data-wow-delay=".5s">
            <?php if ( !empty($jeweltheme_polmo_blog_heading) ){ ?>
              <h2 class="section-title">
                <?php echo  $jeweltheme_polmo_blog_heading; ?>
              </h2><!-- /.section-title -->
            <?php } ?>
          </div><!-- /.section-top -->

          <div class="section-details">
            <div class="post-area">
              <?php 
                $args = array(
                  "posts_per_page" => 2,
                  "post_type" => "post",
                  "order" => "DESC",
                  );
                $posts = new WP_Query( $args );
                wp_reset_query();
                if ( $posts->have_posts() ) {
                  while ( $posts->have_posts() ) {
                    $posts->the_post();
                    $meta = get_post_meta($post->ID);                           
              ?>       
                  <div class="col-md-4">
                    <article class="type-post post wow animated fadeInUp" data-wow-delay=".35s">
                      <div class="post-thumbnail">
                        <?php if ( has_post_thumbnail() ) { 
                          $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'polmo-home-blog' );
                          ?>
                          <img src="<?php echo esc_url( $url[0] ); ?>" alt="<?php the_title();?>" />
                          <?php } ?>
                      </div><!-- /.post-thumbnail -->

                      <div class="post-content">
                        <h4 class="entry-title">
                          <a href="<?php the_permalink();?>">
                            <?php the_title();?>
                          </a>
                        </h4><!-- /.entry-title -->
                        <p class="entry-content">
                          <?php the_excerpt(); ?>
                        </p><!-- /.entry-content -->
                      </div><!-- /.post-content -->
                    </article><!-- /.type-post -->
                </div>
              <?php 
                    } 
                }
              wp_reset_postdata();
              ?>
            </div><!-- /.post-area -->

            <div class="btn-container text-center">
              <a class="btn more" href="<?php echo jeweltheme_polmo_get_blog_link();?>">
                <?php echo esc_html__("View Blog","polmo-lite");?>
              </a>
            </div><!-- /.btn-container -->
          </div><!-- /.section-details -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section-padding -->
  </section><!-- /#blog -->

  <!-- Latest Blog Post -->