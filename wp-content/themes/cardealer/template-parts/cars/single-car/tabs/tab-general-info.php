<?php
$car_id = get_the_ID();

echo do_shortcode( wpautop( get_post_meta( $car_id, 'general_information', true ) ) );
