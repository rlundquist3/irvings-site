<?php
/**
 * Polmo Theme Customizer
 *
 * @package Polmo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function jeweltheme_polmo_customize_register( $wp_customize ) {
	

	/**
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
	class Jewel_Theme_Polmo_Category_Dropdown_Customize_Control extends WP_Customize_Control {
	    private $cats = false;

	    public function __construct($manager, $id, $args = array(), $options = array())
	    {
	        $this->cats = get_categories($options);

	        parent::__construct( $manager, $id, $args );
	    }

	    /**
	     * Render the content of the category dropdown
	     *
	     * @return HTML
	     */
	    public function render_content()
	       {
	            if(!empty($this->cats))
	            {
	                ?>
	                    <label>
	                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
	                      <select <?php $this->link(); ?>>
	                           <?php
	                                foreach ( $this->cats as $cat )
	                                {
	                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
	                                }
	                           ?>
	                      </select>
	                    </label>
	                <?php
	            }
	       }
	 }



	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


/**************	General Settings *******************/
		
		/**************	Blog Section ***************/	
		$wp_customize->add_section( 'jeweltheme_polmo_general_blog_section' , array(
				'title'       => __( 'Blog Section', 'polmo-lite' ),
				'priority'    => 202,
				'panel' => 'panel_general'
		));

		$wp_customize->add_panel( 'panel_blog', array(
			'priority' => 202,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Blog Section', 'polmo-lite' )
			) );

		$wp_customize->add_section( 'jeweltheme_polmo_blog_section' , array(
			'title'       => __( 'Heading', 'polmo-lite' ),
			'priority'    => 36,
			'panel' => 'panel_blog'
			));

		$wp_customize->add_setting( 'jeweltheme_polmo_blog_heading', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => __('<span>Our</span> Latest Blog Posts','polmo-lite')));
		$wp_customize->add_control( 'jeweltheme_polmo_blog_heading', array(
			'label'    => __( 'Blog Page Heading Title', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_blog_section',
			'settings' => 'jeweltheme_polmo_blog_heading',
			'priority'    => 2,
			));		
		/* Blog Title */
		$wp_customize->add_setting( 'jeweltheme_polmo_general_blog_title', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => 'Welcome To <span>Polmo</span> Blog'));
		$wp_customize->add_control( 'jeweltheme_polmo_general_blog_title', array(
			'label'    => __( 'Blog Title', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_blog_section',
			'settings' => 'jeweltheme_polmo_general_blog_title',
			'priority'    => 1,
			));		

		/* Blog Sub Title */
		$wp_customize->add_setting( 'jeweltheme_polmo_general_blog_desc', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => 'Our Creative Blog Will keep you always Updated'));
		$wp_customize->add_control( 'jeweltheme_polmo_general_blog_desc', array(
			'label'    => __( 'Blog Sub Title', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_blog_section',
			'settings' => 'jeweltheme_polmo_general_blog_desc',
			'priority'    => 1,
			));



    /**************	Slider Section ***************/	
	
		$wp_customize->add_section( 'slider_section' , array(
			'title'       => __( 'Slider Section', 'polmo-lite' ),
			'priority'    => 199,
			'description'	=> __('Featured Image Size Should be 1400x765','polmo-lite'),
			'capability' => 'edit_theme_options',
			));


		$wp_customize->add_setting('page-setting1',array(
				'default' => '0',
				'capability' => 'edit_theme_options',
				'sanitize_callback'	=> 'jeweltheme_polmo_sanitize_integer'
		));
		
		$wp_customize->add_control('page-setting1',array(
				'type'	=> 'dropdown-pages',
				'label'	=> __('Select page for slide one:','polmo-lite'),
				'section'	=> 'slider_section'
		));	
		
		$wp_customize->add_setting('page-setting2',array(
				'default' => '0',
				'capability' => 'edit_theme_options',	
				'sanitize_callback'	=> 'jeweltheme_polmo_sanitize_integer'
		));
		
		$wp_customize->add_control('page-setting2',array(
				'type'	=> 'dropdown-pages',
				'label'	=> __('Select page for slide two:','polmo-lite'),
				'section'	=> 'slider_section'
		));	

		$wp_customize->add_setting('hide_slider',array(
				'default' => true,
				'sanitize_callback' => 'jeweltheme_polmo_sanitize_text',
				'capability' => 'edit_theme_options',
		));	 

		$wp_customize->add_control( 'hide_slider', array(
			   'settings' => 'hide_slider',
	    	   'section'   => 'slider_section',
	    	   'label'     => __('Uncheck This Option To Display Front Page Slider','polmo-lite'),
	    	   'type'      => 'checkbox'
	     ));	



    /**************	Service Section ***************/	

	$wp_customize->add_section('service_section', array(
		'title'	=> __('Services Box Section','polmo-lite'),		
		'description' => sprintf( __( 'Select Pages from the dropdown for Homepage Our Services Section. How to set featured image %s', 'polmo-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.JWT_FEATURED_EMAGE.'"' ), __( 'CLICK HERE', 'polmo-lite' ))),	
		'priority'	=> 200
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('Service 1','polmo-lite'),
			'section' => 'service_section',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('Service 2','polmo-lite'),
			'section' => 'service_section',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('Service 3','polmo-lite'),
			'section' => 'service_section',
	));	//end three column part
	
	$wp_customize->add_setting('page-column4',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',
			'label' => __('Service 4','polmo-lite'),
			'section' => 'service_section',
	));
	
	$wp_customize->add_setting('hide_services',array(
			'default' => true,
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_text',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_services', array(
		   'settings'  => 'hide_services',
    	   'section'   => 'service_section',
    	   'label'     => __('Uncheck This Option To Display This Section','polmo-lite'),
    	   'type'      => 'checkbox'
     ));	




    /**************	About Us Section ***************/	

		$wp_customize->add_section('aboutus_section', array(
			'title'	=> __('About Us Section','polmo-lite'),		
			'description' => sprintf( __( 'Select Pages from the Dropdown for About Us Our Services Section. How to set Featured image %s', 'polmo-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.JWT_FEATURED_EMAGE.'"' ), __( 'CLICK HERE', 'polmo-lite' ))),	
			'priority'	=> 201
		));	

		$wp_customize->add_setting('aboutus-page1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
			));

		$wp_customize->add_control(	'aboutus-page1',array('type' => 'dropdown-pages',
			'label' => __('About Us Page 1','polmo-lite'),
			'section' => 'aboutus_section',
			));	

		$wp_customize->add_setting('aboutus-page2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
			));

		$wp_customize->add_control(	'aboutus-page2',array('type' => 'dropdown-pages',
			'label' => __('About Us Page 2','polmo-lite'),
			'section' => 'aboutus_section',
			));

		$wp_customize->add_setting('hide_aboutus',array(
				'default' => true,
				'sanitize_callback' => 'jeweltheme_polmo_sanitize_text',
				'capability' => 'edit_theme_options',
		));	 

		$wp_customize->add_control( 'hide_aboutus', array(
			   'settings'  => 'hide_aboutus',
	    	   'section'   => 'aboutus_section',
	    	   'label'     => __('Uncheck This Option To Display This Section','polmo-lite'),
	    	   'type'      => 'checkbox'
	     ));	



    /**************	Sponsors Section ***************/	
		$wp_customize->add_section('sponsor_section', array(
			'title'	=> __('Sponsors Section','polmo-lite'),		
			'description' => sprintf( __( 'Select Pages from the dropdown for Homepage Our Sponsors Section. How to set featured image %s', 'polmo-lite' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.JWT_FEATURED_EMAGE.'"' ), __( 'CLICK HERE', 'polmo-lite' ))),	
			'priority'	=> 201
			));	

		/* Sponsors Heading */
		$wp_customize->add_setting( 'jeweltheme_polmo_sponsors_title', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => __('<span>Our</span> Elite Sponsors','polmo-lite')));
		$wp_customize->add_control( 'jeweltheme_polmo_sponsors_title', array(
			'label'    => __( 'Heading Title', 'polmo-lite' ),
			'section'  => 'sponsor_section',
			'settings' => 'jeweltheme_polmo_sponsors_title',
			'priority'    => 1,
			));		

		$wp_customize->add_setting('page-sponsor',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_integer',
			));

		$wp_customize->add_control(	'page-sponsor',array('type' => 'dropdown-pages',
			'label' => __('Sponsor Gallery Page','polmo-lite'),
			'section' => 'sponsor_section',
			));	

		$wp_customize->add_setting('hide_sponsor',array(
			'default' => true,
			'sanitize_callback' => 'jeweltheme_polmo_sanitize_text',
			'capability' => 'edit_theme_options',
			));	 

		$wp_customize->add_control( 'hide_sponsor', array(
			'settings'  => 'hide_sponsor',
			'section'   => 'sponsor_section',
			'label'     => __('Uncheck This Option To Display This Section','polmo-lite'),
			'type'      => 'checkbox'
			));	


	/**************	Testimonial Section ***************/	
		$wp_customize->add_section( 'jeweltheme_polmo_testimonial_section' , array(
			'title'       => __( 'Testimonial Section', 'polmo-lite' ),
			'priority'    => 203,
			'capability' => 'edit_theme_options',
			));

		$wp_customize->add_setting( 'jeweltheme_polmo_testimonial_heading', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => __('Our Testimonials','polmo-lite')));
		$wp_customize->add_control( 'jeweltheme_polmo_testimonial_heading', array(
			'label'    => __( 'Heading Title', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_testimonial_section',
			'settings' => 'jeweltheme_polmo_testimonial_heading',
			'priority'    => 1,
			));		

		$wp_customize->add_setting( 'jeweltheme_polmo_testimonial_heading_category', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => ''));
		$wp_customize->add_control(new Jewel_Theme_Polmo_Category_Dropdown_Customize_Control( $wp_customize, 'jeweltheme_polmo_testimonial_heading_category', array(
			'label'   => __( 'Catogory', 'polmo-lite' ),
			'section' => 'jeweltheme_polmo_testimonial_section',
			'settings'   => 'jeweltheme_polmo_testimonial_heading_category',
			'priority' => 2
			)) );
		$wp_customize->add_setting( 'jeweltheme_polmo_testimonial_posts', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => __('3','polmo-lite')));
		$wp_customize->add_control( 'jeweltheme_polmo_testimonial_posts', array(
			'label'    => __( 'No. of Testimonials', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_testimonial_section',
			'settings' => 'jeweltheme_polmo_testimonial_posts',
			'priority'    => 3,
			));		


	/**************	MAP & Contact Section ***************/	
		$wp_customize->add_section( 'jeweltheme_polmo_contact_section' , array(
			'title'       => __( 'Contact Section', 'polmo-lite' ),
			'priority'    => 205,
			'capability' => 'edit_theme_options',
			));

		$wp_customize->add_setting( 'jeweltheme_polmo_contact_heading', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => __('<span>Contact</span> With Us','polmo-lite')));
		$wp_customize->add_control( 'jeweltheme_polmo_contact_heading', array(
			'label'    => __( 'Contact Heading', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_contact_section',
			'settings' => 'jeweltheme_polmo_contact_heading',
			'priority'    => 1,
			));		

		$wp_customize->add_setting( 'jeweltheme_polmo_contact_shortcode', array('sanitize_callback' => 'jeweltheme_polmo_sanitize_text','default' => ""));
		$wp_customize->add_control( 'jeweltheme_polmo_contact_shortcode', array(
			'label'    => __( 'Contact Form Shortcode', 'polmo-lite' ),
			'section'  => 'jeweltheme_polmo_contact_section',
			'settings' => 'jeweltheme_polmo_contact_shortcode',
			'priority'    => 2,
			));		



}
add_action( 'customize_register', 'jeweltheme_polmo_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function polmo_lite_custom_customize_enqueue() {
	wp_enqueue_script( 'polmo_lite-custom-customize', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'polmo_lite_custom_customize_enqueue' );