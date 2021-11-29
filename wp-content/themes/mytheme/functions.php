<?php

//Load Stylesheets
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/stylesheets/bootstrap.css' , array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('fontawesome', get_template_directory_uri() . '/stylesheets/fontawesome-webfont.css' , array(), false, 'all');
    wp_enqueue_style('fontawesome');
    

    wp_register_style('main', get_template_directory_uri() . '/stylesheets/main.css' , array(), false, 'all');
    wp_enqueue_style('main');

    wp_register_style('style', get_template_directory_uri() . '/style.css' , array(), false, 'all');
    wp_enqueue_style('style');

    wp_register_style('style2', get_template_directory_uri() . '/stylesheets/style2.css' , array(), false, 'all');
    wp_enqueue_style('style2');

}
add_action('wp_enqueue_scripts','load_css');

// Load Js
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('head', get_template_directory_uri() . '/javascript/head.core.js' , 'jquery', false ,true);
    wp_enqueue_script('head');

    wp_register_script('lte', get_template_directory_uri() . '/javascript/lt-ie-9.js' , 'jquery', false ,true);
    wp_enqueue_script('lte');
    
    wp_register_script('query', get_template_directory_uri() . '/javascript/jquery.js' , 'jquery', false ,true);
    wp_enqueue_script('query');

    wp_register_script('popper', get_template_directory_uri() . '/javascript/popper.js' , 'jquery', false ,true);
    wp_enqueue_script('popper');

    wp_register_script('bootstrap', get_template_directory_uri() . '/javascript/bootstrap.js' , 'jquery', false ,true);
    wp_enqueue_script('bootstrap');

    wp_register_script('ofi', get_template_directory_uri() . '/javascript/ofi.browser.js' , 'jquery', false ,true);
    wp_enqueue_script('ofi');

    wp_register_script('nav', get_template_directory_uri() . '/javascript/jquery.nav.js' , 'jquery', false ,true);
    wp_enqueue_script('nav');

    wp_register_script('sticky', get_template_directory_uri() . '/javascript/jquery.sticky.js' , 'jquery', false ,true);
    wp_enqueue_script('sticky');

    wp_register_script('main', get_template_directory_uri() . '/javascript/main.js' , 'jquery', false ,true);
    wp_enqueue_script('main');


}
add_action('wp_enqueue_scripts','load_js');

// Theme Options
add_theme_support('menus');
add_theme_support('widgets');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');


function my_sidebars()
{
   register_sidebar(
       array(
           'name' => 'Social Media',
           'id' => 'social-media',
           'before_title' => '<h4 class="widget-title">',
           'after_title' => '</h4>'
       )
    );
    
}
add_action('widgets_init', 'my_sidebars');

// Menus
register_nav_menus(
    array(
        'header-menu' => 'Header Menu Location',
        'footer-menu' => 'Footer Menu Locations',
        'front-page-menu' => 'Front page menu',
    )
    );

//ACF OPTIONS

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

// Custom body class
function custom_body_classes($classes){
    if(is_page('order-received')){
        unset($classes[array_search("checkout",$classes)]);
    }
    if(is_page('checkout')){
        $classes[] = 'checkout';
    }
    
    if(is_page('contact')){
        $classes[] = 'contact';
    }
    //return $classes;
    
    return $classes;
    
    
}
add_filter('body_class', 'custom_body_classes');

// Ajax Call for stockist
add_action('wp_ajax_my_action','stockist_fetch');
add_action('wp_ajax_nopriv_my_action','stockist_fetch');

function stockist_fetch(){
   $id = $_REQUEST['post_id'];?>            
    <h3><?= get_the_title($id); ?></h3>
    <ul class="list-unstyled">
        <?php while(have_rows('stockists',$id)): the_row(); ?>
        <li>
        <?php the_sub_field('stockist_name');?>
        </li>
        <?php endwhile;?>
    </ul>
    
    <?php
        die();
    }
    ?>
<?php
// Image size moodifer
add_image_size('cart-image-size',101,101,true);

// Woocommerce function call
//include_once('woocommerce/woo-modifications.php');
// Ajax Call for Cocktails
add_action('wp_ajax_cocktail_action','cocktail_prepare');
add_action('wp_ajax_nopriv_cocktail_action','cocktail_prepare');

function cocktail_prepare(){
   $id = $_REQUEST['cocktail_id'];
   ob_start();
   ?>            
    <div class="modal-body">
              <div class="container-fluid px-0">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="details">
                      <h2><?= get_the_title($id); ?></h2>
                      <div class="details-inner">
                        <p><?php the_field('cocktail_description',$id); ?></p>
                        <h3 class="h2">What you’ll need</h3>
                        <ul>
                            <?php
                                while(have_rows('you_need',$id)): the_row();
                            ?>
                                <li><?php the_sub_field('your_needs',$id); ?></li>
                            <?php endwhile;?>
                        </ul>
                        <?php
                            $i=1;
                            while(have_rows('cocktail_steps',$id) && $i<10): the_row();
                        ?>
                            <h3>Step <?php echo $i;?></h3>
                            <p><?php the_sub_field('cocktail_step',$id); ?></p>
                            <?php $i++ ?>
                        <?php endwhile;?>
                        <div class="sociable">
                          <h3><?php the_field('share_title','options'); ?></h3>
                          <div class="social-icons-wrapper">
                            <ul class="list-unstyled">
                              <li><a href="<?php the_field('facbook_share','options'); ?>"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="<?php the_field('linkedin_share','options'); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                              <li><a href="<?php the_field('twitter_share','options'); ?>"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="<?php the_field('share_link','options'); ?>"><i class="fa fa-link"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <img src="<?php the_field('close_button','options'); ?>" alt="Close">
                    </button>
                    <div class="prod-image">
                    <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($id) ); ?> " alt="img">
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
    <?php
         $content = ob_get_clean();
         $result = Array(
             "result" => "success",
             "html"   => $content,
             'count'  => $i
         );
         echo json_encode($result);
         exit(0);
    }
    ?>
<?php

//For Price

add_action( 'woocommerce_single_product_summary', 'move_single_product_variable_price_location', 2 );

function move_single_product_variable_price_location() {
    global $product;

    // Variable product only
    if( $product->is_type('variable') ):

    // removing the price of variable products
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 11 );

    // Add back the relocated (customized) price of variable products
    add_action( 'woocommerce_single_product_summary', 'custom_single_product_variable_prices', 11 );

    endif;
}


function custom_single_product_variable_prices(){
    global $product;

    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $price !== $saleprice && $product->is_on_sale() ) {
        $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
    }

    ?>
    <style>
        div.woocommerce-variation-price,
        div.woocommerce-variation-availability,
        div.hidden-variable-price {
            height: 0px !important;
            overflow:hidden;
            position:relative;
            line-height: 0px !important;
            font-size: 0% !important;
            visibility: hidden !important; 
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            // When variable price is selected by default
            setTimeout( function(){
                if( 0 < $('input.variation_id').val() && null != $('input.variation_id').val() ){
                    if($('p.availability'))
                        $('p.availability').remove();

                    $('p.price').html($('div.woocommerce-variation-price > span.price').html()).append('<p class="availability">'+$('div.woocommerce-variation-availability').html()+'</p>');
                    console.log($('div.woocommerce-variation-availability').html());
                }
            }, 300 );

        });
    </script>
    <?php

    echo '<p class="price">'.$price.'</p>
    ';
}

