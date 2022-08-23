<?php

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );

    if ( is_rtl() ) {
    	wp_enqueue_style( 'mylisting-rtl', get_template_directory_uri() . '/rtl.css', [], wp_get_theme()->get('Version') );
    }
}, 500 );


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


