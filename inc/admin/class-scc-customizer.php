<?php
/**
 * SCC_Customizer class
 *
 * @since 1.0.0
 */
class SCC_Customizer {

		
	/**
	 * Constructor for SCC_Customizer class
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
	
		// load customizer functionality
		add_action( 'customize_register', array( $this, 'settings' ) );
		
		// customizer styles
		add_action('customize_controls_print_styles', array( $this, 'customizer_styles' ) );
		
		// add customizer styles to head
		add_action( 'wp_head', array( $this, 'head_styles' ) );
	}


	/** ===============
	 * Simple Course Creator Design
	 */
	public function settings( $wp_customize ) {
		if ( class_exists( 'Simple_Course_Creator' ) ) {
		
			// Color customization options
			$colors = array();
			
			$wp_customize->add_section( 'scc_customizer', array(
		    	'title'       	=> __( 'Simple Course Creator Design', 'scc_customizer' ),
				'description' 	=> __( 'Customize the output of your SCC post listings. If you chose to override the output template in your theme <em>and change element classes</em>, your options may not work. Untouched options will remain as default styles. For <em>complete</em> customization control, write your own custom CSS.', 'scc_customizer' ),
				'priority'   	=> 100,
			) );
			
			// border pixels
			$wp_customize->add_setting( 'scc_border_px', array( 'default' => '' ) );		
			$wp_customize->add_control( 'scc_border_px', array(
			    'label' 	=> __( 'Border Width', 'sdm' ),
			    'section' 	=> 'scc_customizer',
				'settings' 	=> 'scc_border_px',
				'priority'	=> 30,
			) );
			
			// border radius
			$wp_customize->add_setting( 'scc_border_radius', array( 'default' => '' ) );		
			$wp_customize->add_control( 'scc_border_radius', array(
			    'label' 	=> __( 'Border Radius', 'sdm' ),
			    'section' 	=> 'scc_customizer',
				'settings' 	=> 'scc_border_radius',
				'priority'	=> 40,
			) );
			
			// border color
			$colors[] = array(
				'slug'		=>'scc_border_color', 
				'label'		=> __( 'Border Color', 'scc_customizer' ),
				'priority'	=> 50
			);
			
			// padding in pixels
			$wp_customize->add_setting( 'scc_padding_px', array( 'default' => '' ) );		
			$wp_customize->add_control( 'scc_padding_px', array(
			    'label' 	=> __( 'Course Padding', 'sdm' ),
			    'section' 	=> 'scc_customizer',
				'settings' 	=> 'scc_padding_px',
				'priority'	=> 60,
			) );
	
			// background color
			$colors[] = array(
				'slug'		=>'scc_background', 
				'label'		=> __( 'Background Color', 'scc_customizer' ),
				'priority'	=> 70
			);
			
			// text color
			$colors[] = array(
				'slug'		=>'scc_text_color', 
				'label'		=> __( 'Text Color', 'scc_customizer' ),
				'priority'	=> 80
			);
			
			// link color
			$colors[] = array(
				'slug'		=>'scc_link_color', 
				'label'		=> __( 'Link Color', 'scc_customizer' ),
				'priority'	=> 90
			);
			
			// link hover color
			$colors[] = array(
				'slug'		=>'scc_link_hover_color', 
				'label'		=> __( 'Link Hover Color', 'scc_customizer' ),
				'priority'	=> 100
			);
			
			// Build settings from $colors array
			foreach( $colors as $color ) {
		
				// customizer settings
				$wp_customize->add_setting( $color['slug'], array(
					'default'		=> $color['default'],
					'type'			=> 'option', 
					'capability'	=>  'edit_theme_options'
				) );
		
				// customizer controls
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
					'label'		=> $color['label'], 
					'section'	=> 'scc_customizer',
					'settings'	=> $color['slug'],
					'priority'	=> $color['priority']
				) ) );
			}
		}
	}
	
	
	/**
	 * styles for the customizer
	 *
	 * @since 1.0.0
	 */
	public function customizer_styles() { ?>
		<style type="text/css">
			#customize-control-scc_padding_px input[type="text"],
			#customize-control-scc_border_px input[type="text"],
			#customize-control-scc_border_radius input[type="text"] { width: 50px; }
			#customize-control-scc_padding_px label:after,
			#customize-control-scc_border_px label:after,
			#customize-control-scc_border_radius label:after { content: "px"; }
		</style>
	<?php }
	
	
	/**
	 * add customizer styles to <head>
	 *
	 * @since 1.0.0
	 */
	public function head_styles() {
		$scc_border_px = get_theme_mod( 'scc_border_px' );
		$scc_border_radius = get_theme_mod( 'scc_border_radius' );
		$scc_border_color = get_option( 'scc_border_color' );
		$scc_padding_px = get_theme_mod( 'scc_padding_px' );
		$scc_bg_color = get_option( 'scc_background' );
		$scc_text_color = get_option( 'scc_text_color' );
		$scc_link_color = get_option( 'scc_link_color' );
		$scc_link_hover_color = get_option( 'scc_link_hover_color' );

		echo '<style type="text/css">';
			echo '#scc-wrap{';
			
				// course box border
				if ( $scc_border_px == '0' ) :
					echo "border:none;";
				else : 
			
					// border width
					if ( $scc_border_px != '' ) :
						echo "border-width:" . intval( $scc_border_px ) . "px;";		
					endif;
			
					// border radius
					if ( $scc_border_radius != '' ) :
						echo "border-radius:" . intval( $scc_border_radius ) . "px;";
					endif;
				
					// border color
					if ( $scc_border_color != '' ) :
						echo "border-color:{$scc_border_color};";		
					endif;
					
					// border style
					echo "border-style:solid;";
				endif;
			
				// course box padding
				if ( $scc_padding_px == '0' ) :
					echo "padding:0;";
				elseif ( $scc_padding_px == '' ) : 
					echo '';
				else :
					echo "padding:" . intval( $scc_padding_px ) . "px;";
				endif;
					
				// course box background color
				if ( $scc_bg_color ) :
					echo "background:{$scc_bg_color};";		
				endif;
				
				// course box text color
				if ( $scc_text_color ) :
					echo "color:{$scc_text_color};";		
				endif;
		
			echo '}';
				
			// course box link color
			if ( $scc_link_color ) :
				echo "#scc-wrap a{color:{$scc_link_color};}";		
			endif;
				
			// course box link color
			if ( $scc_link_hover_color ) :
				echo "#scc-wrap a:hover{color:{$scc_link_hover_color};}";		
			endif;
	
		echo '</style>';
	}
}
new SCC_Customizer();