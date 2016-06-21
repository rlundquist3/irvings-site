<?php 
$jeweltheme_polmo_contact_heading = get_theme_mod('jeweltheme_polmo_contact_heading',__('<span>Contact</span> With Us','polmo-lite'));
$jeweltheme_polmo_contact_shortcode = get_theme_mod('jeweltheme_polmo_contact_shortcode',"");
?>

  <section id="contact" class="contact">
    <div class="contact-inner">
      <div id="google-map" class="google-map">
        <div id="googleMaps" class="google-map-container"></div>
      </div><!-- /#google-map -->

      <div class="form-area col-sm-12 text-center wow animated fadeInRight" data-wow-delay=".75s">
        <?php if ( !empty($jeweltheme_polmo_contact_heading) ){ ?>
          <h2 class="section-title">
            <?php echo wp_kses_post( $jeweltheme_polmo_contact_heading ); ?>
          </h2><!-- /.section-title -->
        <?php } ?>

        <?php if ( !empty($jeweltheme_polmo_contact_shortcode) ){ ?>
            <?php echo do_shortcode( $jeweltheme_polmo_contact_shortcode ); ?>
        <?php } ?>

      </div><!-- /.form-area -->
    </div><!-- /.contact-inner -->
  </section>
