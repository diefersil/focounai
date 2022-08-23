<?php
global $car_dealer_options;
if ( ( isset( $car_dealer_options['trade_in_appraisal_form_status'] ) && ! $car_dealer_options['trade_in_appraisal_form_status'] ) || empty($car_dealer_options['trade_in_appraisal_form_cf7_shortcode']) ) {
	return;
}

if ( ! wp_is_mobile() ) {
	echo '<div class="vehicle-detail-trade-in-appraisal-wrap">';
}
?>
<a class="dealer-form-btn" data-toggle="modal" data-target="#trade-in-appraisal-modal" href="#"><i class="fas fa-exchange-alt"></i><?php echo esc_html__( 'Trade-In Appraisal', 'cardealer' ); ?></a>
<div class="modal fade cardealer-lead-form cardealer-lead-form-trade-in-appraisal" id="trade-in-appraisal-modal" tabindex="-1" role="dialog" aria-labelledby="trade-in-appraisal-lbl" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h6 class="modal-title" id="trade-in-appraisal-lbl"><?php echo esc_html__( 'Trade-In Appraisal', 'cardealer' ); ?></h6>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode( $car_dealer_options['trade_in_appraisal_form_cf7_shortcode'] ); ?>
			</div>
		</div>
	</div>
</div>
<?php
if ( ! wp_is_mobile() ) {
	echo '</div>';
}
?>

