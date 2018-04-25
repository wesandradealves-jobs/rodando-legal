<?php

function remove_menus(){
global $post;
remove_menu_page( 'index.php' );                  //Dashboard
remove_menu_page( 'jetpack' );                    //Jetpack*
remove_menu_page( 'edit.php' );                   //Posts
// remove_menu_page( 'upload.php' );                 //Media
//   remove_menu_page( 'edit.php?post_type=page' );    //Pages
remove_menu_page( 'edit-comments.php' );          //Comments
// remove_menu_page( 'themes.php' );                 //Appearance
// remove_menu_page( 'plugins.php' );                //Plugins
//   remove_menu_page( 'users.php' );                  //Users
//   remove_menu_page( 'tools.php' );                  //Tools
// remove_menu_page( 'options-general.php' );        //Settings
// $frontpage_id = get_option('page_on_front');
// add_menu_page( 'Home', 'Home', 'edit_posts', 'post.php?post='.$frontpage_id.'&action=edit', '', 'dashicons-admin-home', -1 );
// add_menu_page( 'Customize', 'Customize', 'administrator', 'customize.php', '', 'dashicons-admin-appearance', 1 );
}
////////////////////////////////////////////////////
function getrid() {
// remove_post_type_support( 'page', 'page-attributes' );
}
////////////////////////////////////////////////////
function df_terms_clauses($clauses, $taxonomy, $args) {
if (!empty($args['post_type'])) {
global $wpdb;
$post_types = array();
foreach($args['post_type'] as $cpt) {
$post_types[] = "'".$cpt."'";
}
if(!empty($post_types)) {
$clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';
$clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';
$clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';
$clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];
}
}
return $clauses;
}
////////////////////////////////////////////////////
//
// function add_taxonomies_to_pages() {
//  register_taxonomy_for_object_type( 'category', 'page' );
//  }
// function category_and_tag_archives( $wp_query ) {
//     $my_post_array = array('post','page');

//     if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
//        $wp_query->set( 'post_type', $my_post_array );

//    if ( $wp_query->get( 'tag' ) )
//        $wp_query->set( 'post_type', $my_post_array );
// }
//
////////////////////////////////////////////////////
function customizer( $wp_customize ) {
// $wp_customize->add_section( 'social_network' , array(
// 'title'       => __( 'Social Network' ),
// 'priority'    => 2
// ));
$wp_customize->add_section( 'general' , array(
'title'       => __( 'General Settings' ),
'priority'    => 0
));
$wp_customize->add_section( 'rodape' , array(
'title'       => __( 'Rodapé' ),
'priority'    => 1
));
$wp_customize->add_section( 'logo' , array(
'title'       => __( 'Logo' ),
'priority'    => 1
));
// $wp_customize->add_setting( 'google-analytics' );
$wp_customize->add_setting( 'logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
'label'    => __( 'Logo' ),
'section'  => 'logo',
'settings' => 'logo'
)));
$wp_customize->add_setting( 'logo-rodape' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo-rodape', array(
'label'    => __( 'Footer Logo' ),
'section'  => 'logo',
'settings' => 'logo-rodape'
)));
$wp_customize->add_setting( 'texto-rodape' );
$wp_customize->add_control('texto-rodape',  array(
    'label' => 'Texto do Rodapé',
    'section' => 'rodape',
    'type' => 'textarea',
    'settings' => 'texto-rodape'
));
// $wp_customize->add_control(
// 	'enable_menus', 
// 	array(
// 		'label'    => __( 'Enable Menus', 'api_builder' ),
// 		'section'  => 'general',
// 		'settings' => 'enable_menus',
// 		'type'     => 'radio',
// 		'choices'  => array(
// 			'yes'  => 'Yes',
// 			'no' => 'No',
// 		),
// 	)
// );
// $wp_customize->add_setting( 'facebook' );
// $wp_customize->add_control('facebook',  array(
//     'label' => 'Facebook',
//     'section' => 'social_network',
//     'type' => 'text',
//     'settings' => 'facebook'
// ));
// $wp_customize->add_setting( 'twitter' );
// $wp_customize->add_control('twitter',  array(
//     'label' => 'Twitter',
//     'section' => 'social_network',
//     'type' => 'text',
//     'settings' => 'twitter'
// ));
// $wp_customize->add_setting( 'linkedin' );
// $wp_customize->add_control('linkedin',  array(
//     'label' => 'Linkedin',
//     'section' => 'social_network',
//     'type' => 'text',
//     'settings' => 'linkedin'
// ));
$wp_customize->add_setting( 'email' );
$wp_customize->add_control('email',  array(
    'label' => 'Email',
    'section' => 'general',
    'type' => 'email',
    'settings' => 'email'
));
$wp_customize->add_setting( 'telefone' );
$wp_customize->add_control('telefone',  array(
    'label' => 'Telefone',
    'section' => 'general',
    'type' => 'text',
    'settings' => 'telefone'
));
}
////////////////////////////////////////////////////
function remove_customizer_settings( $wp_customize ){
$wp_customize->remove_panel('nav_menus');
$wp_customize->remove_section('static_front_page');
}
////////////////////////////////////////////////////
function get_the_category_bytax( $id = false, $tcat = 'category' ) {
$categories = get_the_terms( $id, $tcat );
if ( ! $categories )
$categories = array();
$categories = array_values( $categories );
foreach ( array_keys( $categories ) as $key ) {
_make_cat_compat( $categories[$key] );
}
// Filter name is plural because we return alot of categories (possibly more than #13237) not just one
return apply_filters( 'get_the_categories', $categories );
}
////////////////////////////////////////////////////
function get_custom_field_data($key, $echo = false) {
global $post;
$value = get_post_meta($post->ID, $key, true);
if($echo == false) {
return $value;
} else {
echo $value;
}
}
////////////////////////////////////////////////////
function hide_admin_bar() {
wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');
return false;
}
////////////////////////////////////////////////////
function menu() {
register_nav_menus(
array(
'header' => __( 'Header' ),
'mobile' => __( 'Mobile' ),
'footer' => __( 'Footer' )
)
);
}
////////////////////////////////////////////////////
function updateNumbers() {
global $wpdb;
$querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$counts = 0 ;
if ($pageposts):
foreach ($pageposts as $post):
setup_postdata($post);
$counts++;
add_post_meta($post->ID, 'incr_number', $counts, true);
update_post_meta($post->ID, 'incr_number', $counts);
endforeach;
endif;
}
////////////////////////////////////////////////////
set_post_thumbnail_size( 600, 600 );
////////////////////////////////////////////////////
// if (class_exists('MultiPostThumbnails')) {
// for ($i=1;$i<=15;$i++) {
// new MultiPostThumbnails(
// array(
// 'label' => 'Imagem',
// 'id' => 'featured-image-'.$i,
// 'post_type' => 'page',
// 'meta_key' => '_wp_page_template',

// 'meta_value' => 'republicas.php'
// )
// );
// }
// }
//
////////////////////////////////////////////////////
function query_post_type($query) {
if(is_category() || is_tag()) {
$post_type = get_query_var('post_type');
if($post_type)
$post_type = $post_type;
else
$post_type = array('nav_menu_item','post','articles');
$query->set('post_type',$post_type);
return $query;
}
}
////////////////////////////////////////////////////
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<i class="glyphicon glyphicon-menu-left"></i>'),
    'next_text'       => __('Next <i class="glyphicon glyphicon-menu-right"></i>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav id='blog-pagination' class='clearfix'>";
    //   echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
////////////////////////////////////////////////////
function my_formatter($content) {
$new_content = '';
$pattern_full = '{(\[raw\].*?\[/raw\])}is';
$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

foreach ($pieces as $piece) {
if (preg_match($pattern_contents, $piece, $matches)) {
$new_content .= $matches[1];
} else {
$new_content .= wptexturize(wpautop($piece));
}
}

return $new_content;
}
////////////////////////////////////////////////////
function regScripts() {
wp_deregister_script('jquery');
wp_enqueue_script('jquery', (get_bloginfo('stylesheet_directory')."/node_modules/jquery/dist/jquery.min.js"));
wp_enqueue_script('jquery-ui', ("https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"));
wp_enqueue_script('owl-carousel-js', ("https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"));
wp_enqueue_script('pace-js', (get_bloginfo('stylesheet_directory')."/assets/js/pace.min.js"));
wp_enqueue_script('materialize-css', (get_bloginfo('stylesheet_directory')."/node_modules/materialize-css/dist/js/materialize.min.js"));
wp_enqueue_script('inview', (get_bloginfo('stylesheet_directory')."/assets/js/inview.min.js"));
wp_enqueue_script('transformicons', (get_bloginfo('stylesheet_directory')."/assets/js/transformicons.min.js"));
wp_enqueue_script('jsmask', (get_bloginfo('stylesheet_directory')."/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"));
wp_enqueue_script('latinize', (get_bloginfo('stylesheet_directory')."/node_modules/latinize/latinize.js"));
wp_enqueue_script('functions.js', (get_bloginfo('stylesheet_directory')."/assets/js/functions.js"));
wp_enqueue_style('owl-carousel', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css');
wp_enqueue_style('owl-theme', 'https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css');
wp_enqueue_style('owl-transition', get_bloginfo('stylesheet_directory').'/node_modules/owlcarousel/owl-carousel/owl.transitions.min.css');
wp_enqueue_style('pace-js', get_bloginfo('stylesheet_directory').'/assets/css/bounce.min.css');
wp_enqueue_style('bootstrap', get_bloginfo('stylesheet_directory').'/node_modules/bootstrap/dist/css/bootstrap.min.css');
wp_enqueue_style('materialize-css', get_bloginfo('stylesheet_directory').'/node_modules/materialize-css/dist/css/materialize.min.css');
wp_enqueue_style('css-reset', get_bloginfo('stylesheet_directory').'/node_modules/css-reset/reset.min.css');
wp_enqueue_style('svg', 'http://svgicons.sparkk.fr/svgicons.css');
wp_enqueue_style('style', get_bloginfo('stylesheet_directory').'/style.min.css');
}
////////////////////////////////////////////////////
function my_add_excerpts_to_pages() {
add_post_type_support( 'page', 'excerpt' );
}
////////////////////////////////////////////////////
// Register widgetized areas
if ( ! function_exists( 'the_widgets_init' ) ) {
function the_widgets_init() {
if ( ! function_exists( 'register_sidebars' ) )
return;
register_sidebar(
array(
'id'            => 'leilao-de-veiculo',
'name'          => __( 'Sidebar Leilão' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="widget-title">',
'after_title'   => '</h3>',
)
);
register_sidebar(
array(
'id'            => 'veiculos-removidos',
'name'          => __( 'Sidebar Veículos Removidos' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget'  => '</div>',
'before_title'  => '<h3 class="widget-title">',
'after_title'   => '</h3>',
)
);
} // End the_widgets_init()
}
////////////////////////////////////////////////////
function add_class_to_excerpt( $excerpt ) {
return str_replace('<p', '<p class="excerpt"', $excerpt);
    }
    function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
    }
    function menu_fix_on_search_page( $query ) {
    if(is_search()){
    $query->set( 'post_type', array('attachment', 'post', 'nav_menu_item'));
    return $query;
    }
}
////////////////////////////////////////////////////
class description_walker extends Walker_Nav_Menu{
function start_el(&$output, $item, $depth, $args){
global $wp_query;
$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
$class_names = $value = '';
$classes = empty( $item->classes ) ? array() : (array) $item->classes;
$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
$class_names = ' class="'. esc_attr( $class_names ) . '"';
$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . '>';
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $prepend = '<strong>';
    $append = '</strong>';
    $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
    if($depth != 0)
    {
    $description = $append = $prepend = "";
    }
    $item_output = $args->before;
    $item_output .= '<a'. $attributes . $class_names .'>';
        $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
        $item_output .= $description.$args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    if ($item->menu_order == 1) {
    $classes[] = 'first';
    }
    }
    }
////////////////////////////////////////////////////
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
////////////////////////////////////////////////////
function hide_editor() {
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  $page = get_the_title($post_id);
  if($page == 'Home'){ 
        remove_post_type_support('page', 'editor');
        remove_post_type_support('page', 'thumbnail');
  }
}
// 

if( function_exists('acf_add_options_page') ) {
 
acf_add_options_page(array(
		'page_title' 	=> 'Rodando Legal',
		'menu_title'	=> 'Rodando Legal<br>Settings',
		'menu_slug' 	=> 'rodando-legal',
		'capability'	=> 'edit_posts',
        'parent_slug'   => '',
        // 'icon_url'      =>  get_template_directory_uri().'/favico.png', // Add this line and replace the second inverted commas with class of the icon you like
        'position' => -1
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'General Settings',
	// 	'menu_title'	=> 'General Settings',
	// 	'capability'	=> 'edit_posts',
        //         'parent_slug'   => 'rodando-legal'
	// ));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Page Settings',
		'menu_title'	=> 'Home',
		'capability'	=> 'edit_posts',
        'parent_slug'   => 'rodando-legal'
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Product Page Settings',
	// 	'menu_title'	=> 'Product',
	// 	'parent_slug'	=> 'theme-product-settings',
	// 	'capability'	=> 'edit_posts',
        // 'parent_slug'   => 'flow',
	// ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Why Flow Page Settings',
	// 	'menu_title'	=> 'Why Flow',
	// 	'parent_slug'	=> 'theme-product-settings',
	// 	'capability'	=> 'edit_posts',
        // 'parent_slug'   => 'flow',
	// ));
    
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Company Page Settings',
	// 	'menu_title'	=> 'Company',
	// 	'parent_slug'	=> 'theme-product-settings',
	// 	'capability'	=> 'edit_posts',
        // 'parent_slug'   => 'flow',
	// ));
    
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Careers Page Settings',
	// 	'menu_title'	=> 'Careers',
	// 	'parent_slug'	=> 'theme-product-settings',
	// 	'capability'	=> 'edit_posts',
        // 'parent_slug'   => 'flow',
	// ));
    
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Request a Demo Page Settings',
	// 	'menu_title'	=> 'Request',
	// 	'parent_slug'	=> 'theme-request-settings',
	// 	'capability'	=> 'edit_posts',
        // 'parent_slug'   => 'flow',
	// ));
 
}

// Register our tweaked Category Archives widget
function myprefix_widgets_init() {
    register_widget( 'WP_Widget_Categories_custom' );
}
add_action( 'widgets_init', 'myprefix_widgets_init' );

/**
 * Duplicated and tweaked WP core Categories widget class
 */
class WP_Widget_Categories_Custom extends WP_Widget {

    function __construct()
    {
        $widget_ops = array( 'classname' => 'cat-list', 'description' => __( "A list of categories, with slightly tweaked output.", 'mytextdomain'  ) );
        parent::__construct( 'categories_custom', __( 'Categories Custom', 'mytextdomain' ), $widget_ops );
    }

    function widget( $args, $instance )
    {
        extract( $args );

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories Custom', 'mytextdomain'  ) : $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;
        ?>
        <ul>
            <?php
            // Get the category list, and tweak the output of the markup.
            $pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )

            // $replacement = '<li$1><a$2>$3</a><span class="cat-count">$4</span>'; // no link on span
            // $replacement = '<li$1><a$2>$3</a><span class="cat-count"><a$2>$4</a></span>'; // wrap link in span
            $replacement = '<li$1><a class="clearfix" $2><span class="cat-name pull-left">$3</span> <span class="category-counter pull-right">$4</span></a>'; // give cat name and count a span, wrap it all in a link


        $args = array(
                'orderby'       => 'name',
                'hide_empty' => FALSE,
                'order'         => 'ASC',
                'show_count'    => 1,
                'title_li'      => '',
                'exclude'       => '2,5,31',
                'echo'          => 0,
                'depth'         => 1,
        );

            $subject      = wp_list_categories( $args );
            echo preg_replace( $pattern, $replacement, $subject );
            ?>
        </ul>
        <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['count'] = 1;
        $instance['hierarchical'] = 0;
        $instance['dropdown'] = 0;

        return $instance;
    }

    function form( $instance )
    {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = esc_attr( $instance['title'] );
        $count = true;
        $hierarchical = false;
        $dropdown = false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title', 'mytextdomain' ); ?>"><?php _e( 'Title:', 'mytextdomain'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" <?php checked( $count ); ?> disabled="disabled" />
        <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'mytextdomain'  ); ?></label>
        <br />
        <?php
    }
}
//////////////////////////////////////////////////// 

function my_vc_shortcode_faq_leilao( $atts ) {   
    $faq = get_field('faq_leilao','option');   
    if($faq) : 
    echo '<ul class="accordion slidein">';
    foreach( $faq as $row ) :
    echo '<li><a href="javascript:void(0)" title="'.$row[faq_leilao_pergunta].'"><span>'.$row[faq_leilao_pergunta].'</span><i><svg class="svg-icon" viewBox="0 0 20 20"><path fill="none" d="M14.989,9.491L6.071,0.537C5.78,0.246,5.308,0.244,5.017,0.535c-0.294,0.29-0.294,0.763-0.003,1.054l8.394,8.428L5.014,18.41c-0.291,0.291-0.291,0.763,0,1.054c0.146,0.146,0.335,0.218,0.527,0.218c0.19,0,0.382-0.073,0.527-0.218l8.918-8.919C15.277,10.254,15.277,9.784,14.989,9.491z"></path></svg></i></a><p>'.$row[faq_leilao_resposta].'</p></li>';
    endforeach; 
    echo '</ul>';
    endif;
}
add_shortcode( 'my_vc_php_output_faq_leilao', 'my_vc_shortcode_faq_leilao');
function my_vc_shortcode_faq_veiculo_removido( $atts ) {   
    $faq = get_field('faq_veiculo_removido','option');   
    if($faq) : 
    echo '<ul class="accordion slidein">';
    foreach( $faq as $row ) :
    echo '<li><a href="javascript:void(0)" title="'.$row[faq_veiculo_removido_pergunta].'"><span>'.$row[faq_veiculo_removido_pergunta].'</span><i><svg class="svg-icon" viewBox="0 0 20 20"><path fill="none" d="M14.989,9.491L6.071,0.537C5.78,0.246,5.308,0.244,5.017,0.535c-0.294,0.29-0.294,0.763-0.003,1.054l8.394,8.428L5.014,18.41c-0.291,0.291-0.291,0.763,0,1.054c0.146,0.146,0.335,0.218,0.527,0.218c0.19,0,0.382-0.073,0.527-0.218l8.918-8.919C15.277,10.254,15.277,9.784,14.989,9.491z"></path></svg></i></a><p>'.$row[faq_veiculos_removido_resposta].'</p></li>';
    endforeach; 
    echo '</ul>';
    endif;
}
add_shortcode( 'my_vc_php_output_faq_veiculo_removido', 'my_vc_shortcode_faq_veiculo_removido');

//////////////////////////////////////////////////// 
add_theme_support( 'post-thumbnails' );

if( !is_admin() ) add_filter( 'pre_get_posts', 'menu_fix_on_search_page' );
add_filter('upload_mimes', 'cc_mime_types');
add_filter( 'wpcf7_validate_configuration', '__return_false' );
add_filter('the_content', 'my_formatter', 99);
add_filter('pre_get_posts', 'query_post_type');
add_filter( 'show_admin_bar', 'hide_admin_bar' );
add_filter('terms_clauses', 'df_terms_clauses', 10, 3);
add_filter( "the_excerpt", "add_class_to_excerpt" );
add_action( 'wp_enqueue_scripts', 'regScripts' );
add_action ( 'publish_post', 'updateNumbers' );
add_action ( 'deleted_post', 'updateNumbers' );
add_action ( 'edit_post', 'updateNumbers' );
add_action( 'init', 'menu' );
add_action( 'customize_register', 'remove_customizer_settings', 20 );
add_action( 'customize_register', 'customizer' );
add_action( 'admin_menu', 'remove_menus' );
add_action( 'init', 'getrid' );
add_action( 'init', 'my_add_excerpts_to_pages' );
add_action( 'init', 'the_widgets_init' );
add_action( 'init', 'add_taxonomies_to_pages' );
add_action( 'admin_init', 'hide_editor' );


?>