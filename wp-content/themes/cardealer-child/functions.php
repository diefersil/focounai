<?php

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );

    if ( is_rtl() ) {
    	wp_enqueue_style( 'mylisting-rtl', get_template_directory_uri() . '/rtl.css', [], wp_get_theme()->get('Version') );
    }
}, 500 );

add_filter( 'auto_update_plugin', '__return_false' );


/*if(is_front_page()){
    add_filter( 'the_title', function( $title ){
        
            $year = get_the_terms(get_the_ID(), 'car_year' );
            if(isset($year[0]->name)){
                //echo $title . "<br/>" . $year[0]->name ;
                //the_title( '<h2>', "<br/>" . $year[0]->name. '</h2>');
                $title = $title . '<br/>' . $year[0]->name ;
                //return $title;
            }else{
               return $title; 
            }
        
    }, 999, 1 );
}*/

//----------------------------------------------------------------wp_reset_query();
//if( is_page() ){
    /*if ( ! function_exists( 'cardealer_list_car_link_title' ) ) {
        function cardealer_list_car_link_title() {
            $year = get_the_terms(get_the_ID(), 'car_year' );
            echo '<a href="' . esc_url( get_the_permalink() ) . '">' . esc_attr( get_the_title() ) . '<br/>' . $year[0]->name . '</a>';
        }
    }*/
//}

/*function cardealer_vehicle_title() {
    global $car_dealer_options;
    $is_custom_cars_details_title  = ( isset( $car_dealer_options['vehicle-title-location'] ) ) ? $car_dealer_options['vehicle-title-location'] : false;
    if ( $is_custom_cars_details_title === 'header' ) {
        the_title( '<h2>', '</h2>' );
    }

}*/

/*if ( is_single() ) {
    function cardealer_vehicle_title() {
        global $car_dealer_options;
        $is_custom_cars_details_title  = ( isset( $car_dealer_options['vehicle-title-location'] ) ) ? $car_dealer_options['vehicle-title-location'] : false;
        if ( $is_custom_cars_details_title === 'header' ) {
            $year = get_the_terms(get_the_ID(), 'car_year' );
            $title .= "<h2>" . get_the_title() ;
            $title .= "<br/><span>" . $year[0]->name . '</span>' ;
            $title .= "</h2>' ;
            return $title;
        }
    }
}*/


   /* add_filter('cardealer_classic_list_car_title', 'teste');
    function teste($titulo){
        $titulo = NULL;
       return $titulo;
        
    }


    function cardealer_classic_list_car_title(){
        echo 'teste';
    }*/


    /*function add_button($b) {
        if ( is_single() ) {
            return do_shortcode('[SHORTCODE_ELEMENTOR id="12559"]');
        } else{
            return $b;
        }
    }*/
//add_filter('the_content', 'add_button',10);


/*function theme_slug_filter_the_content( $content ) {
    $custom_content = do_shortcode('[SHORTCODE_ELEMENTOR id="12559"]');
    $custom_content .= $content;
    return $custom_content;   
}
add_filter( 'the_content', 'theme_slug_filter_the_content' );*/


function cardealer_vehicle_title() {
    global $car_dealer_options;
    $is_custom_cars_details_title  = ( isset( $car_dealer_options['vehicle-title-location'] ) ) ? $car_dealer_options['vehicle-title-location'] : false;
    if ( $is_custom_cars_details_title === 'header' ) {
        $year = get_the_terms(get_the_ID(), 'car_year' );
        the_title( '<h2>', "<br/><span>" . $year[0]->name . "</span></h2>" );
        echo do_shortcode('[elementor-template id="12616"]');
    }
}


//remove_action( 'cardealer_list_car_title',  10 );

add_action( 'cardealer_list_car_title', 'new_home_title', 1 ); 
function new_home_title(){
    remove_action( 'cardealer_list_car_title', 'cardealer_list_car_link_title',5 );
    $year = get_the_terms(get_the_ID(), 'car_year' );
    $price = get_the_terms(get_the_ID(), 'car_price' );
    echo '<a class=home-title href="' . esc_url( get_the_permalink() ) . '">' . esc_attr( get_the_title() ) . '</a>';
    echo '<a class=home-year href="' . esc_url( get_the_permalink() ) . '">' . $year[0]->name . '</a>';
    //echo cardealer_get_car_price();

    //print($price);
}



add_shortcode ('car_wa', 'car_url');
function car_url() {
    $pageURL = "https://api.whatsapp.com/send?phone=5538999605010&text=Olá, estou no site da Foco Veículos. Estou vendo o veículo: ";
    $pageURL .= get_the_title() . " %0D" . get_the_permalink();
	return $pageURL;
}

add_shortcode ('car_wshare', 'car_urlshare');
function car_urlshare() {
    $pageURL = "https://api.whatsapp.com/send?text=Olá, De uma olhada nesse carro da Foco Veículos: ";
    $pageURL .= get_the_title() . " %0D" . get_the_permalink();
	return $pageURL;
}

add_shortcode ('car_face', 'car_face_url');
function car_face_url() {
    $pageURL = "https://www.facebook.com/sharer/sharer.php?u=" . get_the_permalink();
	return $pageURL;
}

add_shortcode('home_cars', 'get_cars');
function get_cars(){
    echo "<div class='all-cars-list-arch'>";
	    get_template_part( 'template-parts/cars/content', 'cars' );
	echo "</div>"; 
}

