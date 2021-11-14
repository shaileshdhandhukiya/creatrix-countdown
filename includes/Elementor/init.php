<?php
//include widgets files
add_action( 'elementor/widgets/widgets_registered', 'creatrix_register_elementor_widgets' );
function creatrix_register_elementor_widgets() {
	
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {	
        require_once plugin_dir_path( __FILE__ ) . '/Widget/countdown-widget.php';
 	}
}
/*
    add category in elementor widget area
*/
add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'creatrix',
		[
			'title' => __( 'Creatrix', 'creatrix' ),
			'icon' => 'fa fa-plug',
		]
	);
});
