<?php function aqia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'aqia' ),
		'id'			 => 'footer-1',
		'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<div class="widget-title"><h3>',
		'after_title'	 => '</h3></div>',
	) );
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Footer 2', 'aqia' ),
			'id'			 => 'footer-2',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="widget-title"><h3>',
			'after_title'	 => '</h3></div>',
	));
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Footer 3', 'aqia' ),
			'id'			 => 'footer-3',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="widget-title"><h3>',
			'after_title'	 => '</h3></div>',
	));
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Bottom Sidebar', 'aqia' ),
			'id'			 => 'sidebar-1',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="sidebar-title"><h3>',
			'after_title'	 => '</h3></div>',
	));
	register_sidebar(
		array(
			'name'			 => esc_html__( 'Left Sidebar', 'aqia' ),
			'id'			 => 'sidebar-left',
			'before_widget'	 => '<div id="%1$s" class="widget %2$s">',
			'after_widget'	 => '</div>',
			'before_title'	 => '<div class="sidebar-title"><h3>',
			'after_title'	 => '</h3></div>',
	));


	
}
add_action( 'widgets_init', 'aqia_widgets_init' );

?>