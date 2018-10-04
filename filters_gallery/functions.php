function add_isotope() {
    wp_register_script( 'isotope', get_template_directory_uri().'/js/isotope.pkgd.min.js', array('jquery'),  true );
    wp_register_script( 'isotope-init', get_template_directory_uri().'/js/isotope.pkgd.js', array('jquery', 'isotope'),  true );
    wp_enqueue_script('isotope-init');
}
add_action( 'wp_enqueue_scripts', 'add_isotope' );

function add_fancybox() {
	wp_register_script('fancybos-js','https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.js', array('jquery'), '1.1', true);
  wp_register_style('fancybos-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.2/jquery.fancybox.min.css');
	wp_enqueue_script('fancybos-js');
	wp_enqueue_style('fancybos-css');
}
add_action ('wp_enqueue_scripts', 'add_fancybox');