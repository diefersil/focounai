<?php
/**
 * Car Make offer
 *
 * @author  TeamWP @Potenza Global Solutions
 * @package car-dealer-helper
 */
$year         = cardealer_get_field_label_with_tax_key( 'car_year' );
$make         = cardealer_get_field_label_with_tax_key( 'car_make' );
$model        = cardealer_get_field_label_with_tax_key( 'car_model' );
$trim         = cardealer_get_field_label_with_tax_key( 'car_trim' );
$vin_number   = cardealer_get_field_label_with_tax_key( 'car_vin_number' );
$stock_number = cardealer_get_field_label_with_tax_key( 'car_stock_number' );

if ( function_exists( 'acf_add_local_field_group' ) ) :
	acf_add_local_field_group(
		/**
		 * Filters the arguments of the make an offer field group.
		 *
		 * @since 1.0
		 * @param array    $args    Arguments of the make an offer field group.
		 * @visible        true
		 */
		apply_filters(
			'cardealer_acf_make_an_offer',
			array(
				'key'                   => 'group_58da3afeae750',
				'title'                 => esc_html__( 'Make an Offer', 'cardealer-helper' ),
				'fields'                => array(
					array(
						'key'               => 'field_591ed0c6c228a',
						'label'             => esc_html__( 'User Information', 'cardealer-helper' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'placement'         => 'top',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_58da3b08c61cc',
						'label'             => esc_html__( 'First Name', 'cardealer-helper' ),
						'label'             => cardealer_get_theme_option( 'cstfrm_lbl_first_name', esc_html__( 'First Name', 'cardealer-helper' ) ),
						'name'              => 'first_name',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-first_name',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_58da3b22c61cd',
						'label'             => cardealer_get_theme_option( 'cstfrm_lbl_last_name', esc_html__( 'Last Name', 'cardealer-helper' ) ),
						'name'              => 'last_name',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-last_name',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_58da3b2cc61ce',
						'label'             => cardealer_get_theme_option( 'cstfrm_lbl_email', esc_html__( 'Email', 'cardealer-helper' ) ),
						'name'              => 'email_id',
						'type'              => 'email',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-email_id',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_58da3b46c61cf',
						'label'             => cardealer_get_theme_option( 'cstfrm_lbl_phone', esc_html__( 'Phone', 'cardealer-helper' ) ),
						'name'              => 'home_phone',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-home_phone',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_58da3b57c61d0',
						'label'             => cardealer_get_theme_option( 'cstfrm_lbl_message', esc_html__( 'Message', 'cardealer-helper' ) ),
						'name'              => 'comment',
						'type'              => 'textarea',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-comment',
							'id'    => '',
						),
						'default_value'     => '',
						'new_lines'         => 'wpautop',
						'maxlength'         => '',
						'placeholder'       => '',
						'rows'              => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_58da3b64c61d1',
						'label'             => cardealer_get_theme_option( 'cstfrm_lbl_request_price', esc_html__( 'Request Price', 'cardealer-helper' ) ),
						'name'              => 'request_price',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-request_price',
							'id'    => '',
						),
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ecde3cdabe',
						'label'             => esc_html__( 'Vehicle Information', 'cardealer-helper' ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name- acf_field_name- acf_field_name-',
							'id'    => '',
						),
						'placement'         => 'top',
						'endpoint'          => 0,
					),
					array(
						'key'               => 'field_591ecdf5cdabf',
						'label'             => $year,
						'name'              => 'car_year_inq',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-car_year_inq',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece00cdac0',
						'label'             => $make,
						'name'              => 'car_make_inq',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-car_make_inq acf_field_name-car_make_inq acf_field_name-car_make_inq',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece0acdac1',
						'label'             => $model,
						'name'              => 'car_model_inq',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-car_model_inq',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece0fcdac2',
						'label'             => $trim,
						'name'              => 'car_trim_inq',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-car_trim_inq',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece16cdac3',
						'label'             => $vin_number,
						'name'              => 'vin_number',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-vin_number',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece1ccdac4',
						'label'             => $stock_number,
						'name'              => 'stock_number',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-stock_number',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece22cdac5',
						'label'             => esc_html__( 'Regular Price', 'cardealer-helper' ),
						'name'              => 'regular_price',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-regular_price',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
					array(
						'key'               => 'field_591ece28cdac6',
						'label'             => esc_html__( 'Sale Price', 'cardealer-helper' ),
						'name'              => 'sale_price',
						'type'              => 'text',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'acf_field_name-sale_price',
							'id'    => '',
						),
						'default_value'     => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'maxlength'         => '',
						'readonly'          => 1,
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'make_offer',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'left',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
				'menu_item_level'       => 'all',
			)
		)
	);

endif;
