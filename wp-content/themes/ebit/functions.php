<?php


add_theme_support('post-thumbnails'); 

add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


//Removendo barra administrativa quando logado, no front-end
function my_function_admin_bar(){ return false; }
add_filter('show_admin_bar', 'my_function_admin_bar');

function removeHeadLinks() {
	/* REMOVE TAGS DESNECESSÁRIAS */
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action('wp_head', 'wp_generator');	
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head','rest_output_link_wp_head');
	remove_action('wp_head','wp_oembed_add_discovery_links');
	remove_action('template_redirect','rest_output_link_header', 11, 0 );
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter('the_content_feed', 'wp_staticize_emoji' );
	remove_filter('comment_text_rss', 'wp_staticize_emoji' );
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('oembed_dataparse','wp_filter_oembed_result',10);
	//add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce' );	
	add_filter('xmlrpc_enabled', '__return_false');	
	add_filter('emoji_svg_url', '__return_false' );								   
}
//add_action('init', 'removeHeadLinks');

/*
 * Desligando a API do Wordpress
 */ 
function disable_json_api () {

  // Filters for WP-API version 1.x
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');

  // Filters for WP-API version 2.x
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');

}
//add_action( 'after_setup_theme', 'disable_json_api' ); 

if ( ! function_exists( 'abctheme_setup' ) ) :
	function abctheme_setup() {		
		
		add_editor_style();
		
		/* HABILITANDO MENU */
		register_nav_menu('principal', 'Menu Principal');
		
		/* SUPORTE E IMAGENS */
		add_theme_support('post-thumbnails');
		add_image_size('4x3', 600, 400, true);	

		/* Suporte para o título */ 
		add_theme_support( 'title-tag' );
		
		/* HTML5 para elementos comuns */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );		
	}
endif;
add_action( 'after_setup_theme', 'abctheme_setup' );

/* DEsabilitando os comentários para todo o site */
function turn_on_comments() { 
   update_option('default_comment_status', 'closed');
} 
//add_action('update_option', 'turn_on_comments');

/*
 * Posições de Widgets do site
 */
function ebittheme_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Breadcrumb'),
		'id'            => 'breadcrumb',
		'description'   => __( 'Widget na posição do breadcrumb' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));

	
}
add_action( 'widgets_init', 'ebittheme_widgets_init' );

function remove_wp_seo_meta_box() {
	remove_meta_box('wpseo_meta','banners','normal');
}
//add_action('add_meta_boxes', 'remove_wp_seo_meta_box', 100);

//OVERRIDE GALERY
add_shortcode('gallery', 'my_gallery_shortcode');
function my_gallery_shortcode($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

// Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 4,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    //SEMPRE O LINK VAI SER DO TIPO FILE
    $attr['link'] = 'file';

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
        $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
        $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
        $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        $gallery_style = "
    <style type='text/css'>
        /*
        #{$selector} {
            margin: auto;
        }
        #{$selector} .gallery-item {
            float: {$float};
            margin-top: 10px;
            text-align: center;
            width: {$itemwidth}%;
        }
        #{$selector} img {
            border: 2px solid #cfcfcf;
        }
        #{$selector} .gallery-caption {
            margin-left: 0;
        }
        
        */

        .link-lightbox{
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 100;
        }
        
    </style>
    <!-- see gallery_shortcode() in wp-includes/media.php -->";
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery justify-content-between gallery d-flex flex-wrap galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
        
        $output .= "<{$itemtag} class='gallery-item thumbs' data-gallery=\"one\">";
            $output .= "<a class='link-lightbox' href=". wp_get_attachment_url($id) . "></a>";
            $output .= "
            <{$icontag} class='gallery-icon'>
                <img src=". wp_get_attachment_url($id) ." />
            </{$icontag}>";
            if ( $captiontag && trim($attachment->post_excerpt) ) {
                $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                <p>" . wptexturize($attachment->post_excerpt) . "</p>
                </{$captiontag}>";
            }    
        $output .= "</{$itemtag}>";

        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
        <br style='clear: both;' />
    </div>\n";

    return $output;
}



function add_excerpt() {
  add_post_type_support('page', array('excerpt'));
}
add_action('init', 'add_excerpt');

/* Limita a quantidade de palavras do resumo */
function get_excerpt_palavras($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).' (...)';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/* Limita a quantidade de caracteres do resumo */
function get_excerpt_caracteres($limit){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" ([.*?])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $limit);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
  $excerpt = $excerpt.' (...)';
  return $excerpt;
}



if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Configurações do tema',
        'menu_title'    => 'Configurações do tema',
        'menu_slug'     => 'configuracoes-do-tema',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}



class Description_Walker extends Walker_Nav_Menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );


        $count_pre++;
    }
}


class WPQuestions_Walker extends Walker_Category
{

    function start_lvl(&$output, $depth = 1, $args = array())
    {
        if($depth == 0) {
            $output .= "\n<ul class=\"sub-menu\">\n";
        }else{
            $output .= "\n<ul>\n";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "</ul>\n";
    }

    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        /** This filter is documented in wp-includes/category-template.php */
        $cat_name = apply_filters(
            'list_cats',
            esc_attr( $category->name ),
            $category
        );

        // Don't generate an element if the category name is empty.
        if ( ! $cat_name ) {
            return;
        }

        $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
        if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
            /**
             * Filter the category description for display.
             *
             * @since 1.2.0
             *
             * @param string $description Category description.
             * @param object $category    Category object.
             */
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        }

        $link .= '>';
        $link .= $cat_name . '</a>';

        if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
            $link .= ' ';

            if ( empty( $args['feed_image'] ) ) {
                $link .= '(';
            }

            $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

            if ( empty( $args['feed'] ) ) {
                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
            } else {
                $alt = ' alt="' . $args['feed'] . '"';
                $name = $args['feed'];
                $link .= empty( $args['title'] ) ? '' : $args['title'];
            }

            $link .= '>';

            if ( empty( $args['feed_image'] ) ) {
                $link .= $name;
            } else {
                $link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
            }
            $link .= '</a>';

            if ( empty( $args['feed_image'] ) ) {
                $link .= ')';
            }
        }

        if ( ! empty( $args['show_count'] ) ) {
            $link .= ' (' . number_format_i18n( $category->count ) . ')';
        }
        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
            $css_classes = array(
                'cat-item',
                'cat-item-' . $category->term_id,
            );

            if ( ! empty( $args['current_category'] ) ) {
                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                if ( $category->term_id == $args['current_category'] ) {
                    $css_classes[] = 'current-cat';
                } elseif ( $category->term_id == $_current_category->parent ) {
                    $css_classes[] = 'current-cat-parent';
                }
            }

            $css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

            if($depth == 0 && $args['has_children']){
                $output .=  ' class="' . $css_classes . ' drop-menu has-sub"';
            }
            if($depth == 1 && $args['has_children']){
                $output .=  ' class="' . $css_classes . ' has-sub"';
            }
            $output .=  ' class="' . $css_classes . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }

}
