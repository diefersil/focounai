<?php
/**
 * Template part.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CarDealer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-2">
		<div class="blog-image blog-entry-slider">
			<?php
			$gallery_type = get_post_meta( get_the_ID(), 'gallery_type', true );

			if ( function_exists( 'have_rows' ) ) {
				if ( have_rows( 'gallery_images' ) ) {
					if ( 'slider' === $gallery_type ) {
						?>
						<div class="owl-carousel-6 blog-post-carousel" data-lazyload="<?php echo esc_attr( cardealer_lazyload_enabled() ); ?>">
							<?php
							while ( have_rows( 'gallery_images' ) ) {
								the_row();

								// vars.
								$image = get_sub_field( 'image' );
								if ( $image ) {
									?>
									<div class="item">
										<?php if ( cardealer_lazyload_enabled() ) { ?>
											<img class="owl-lazy" src="<?php echo esc_url( LAZYLOAD_IMG ); ?>" data-src="<?php echo esc_url( $image['sizes']['cardealer-blog-thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
										<?php } else { ?>
											<img src="<?php echo esc_url( $image['sizes']['cardealer-blog-thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
										<?php } ?>

									</div>
									<?php
								}
							}
							?>
						</div>
						<?php
					} elseif ( 'grid' === $gallery_type ) {
						?>
						<div class="blog-entry-grid clearfix hover-direction">
							<ul class="grid-post">
								<?php
								while ( have_rows( 'gallery_images' ) ) {
									the_row();

									// vars.
									$image = get_sub_field( 'image' );
									if ( $image ) {
										?>
										<li>
											<div class="gallery-item" style="position: relative; overflow: hidden;">
												<?php if ( cardealer_lazyload_enabled() ) { ?>
												<img alt="<?php echo esc_attr( $image['alt'] ); ?>" src="<?php echo esc_url( LAZYLOAD_IMG ); ?>" data-src="<?php echo esc_url( $image['sizes']['cardealer-blog-thumb'] ); ?>" class="img-responsive cardealer-lazy-load">
												<?php } else { ?>
												<img alt="<?php echo esc_attr( $image['alt'] ); ?>" src="<?php echo esc_url( $image['sizes']['cardealer-blog-thumb'] ); ?>" class="img-responsive">
												<?php } ?>
											</div>
										</li>
										<?php
									}
								}
								?>
							</ul>
						</div>
						<?php
					}
				}
			} elseif ( has_post_thumbnail() ) {
				?>
				<div class="blog-entry-image hover-direction clearfix blog">
					<?php if ( cardealer_lazyload_enabled() ) { ?>
					<img alt="<?php echo esc_attr( get_the_title() ); ?>" src="<?php echo esc_url( LAZYLOAD_IMG ); ?>" data-src="<?php the_post_thumbnail_url( 'cardealer-blog-thumb' ); ?>" class="cardealer-lazy-load img-responsive">
					<?php } else { ?>
					<img alt="<?php echo esc_attr( get_the_title() ); ?>" src="<?php the_post_thumbnail_url( 'cardealer-blog-thumb' ); ?>" class="img-responsive">
					<?php } ?>
				</div>
				<?php
			}
			?>
			<div class="date-box">
				<span><?php echo sprintf( '%1$s', esc_html( get_the_date( 'M Y' ) ) ); ?></span>
			</div>
		</div>

		<div class="blog-content">
			<div class="blog-admin-main">
				<div class="blog-admin">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
					<span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span>
				</div>
				<div class="blog-meta pull-right">
					<ul>
						<li><a href="<?php echo esc_url( get_comments_link( get_the_ID() ) ); ?>"> <i class="fas fa-comment"></i><br />
							<?php
							$comments_count = wp_count_comments( get_the_ID() );
							echo esc_html( $comments_count->approved );
							?>
						</a></li>
						<li class="share"><a href="#"> <i class="fas fa-share-alt"></i><br /> ...</a>
							<?php
							global $car_dealer_options;
							$facebook_share    = $car_dealer_options['facebook_share'];
							$twitter_share     = $car_dealer_options['twitter_share'];
							$linkedin_share    = $car_dealer_options['linkedin_share'];
							$google_plus_share = $car_dealer_options['google_plus_share'];
							$pinterest_share   = $car_dealer_options['pinterest_share'];
							$whatsapp_share    = $car_dealer_options['whatsapp_share'];

							if ( '' !== $facebook_share || '' !== $twitter_share || '' !== $linkedin_share || '' !== $google_plus_share || '' !== $pinterest_share || '' !== $whatsapp_share ) {
								?>
								<div class="blog-social">
									<ul>
									<?php if ( $facebook_share ) { ?>
										<li>
											<a href="#" class="facebook-share" data-title="<?php echo esc_attr( get_the_title() ); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>"><i class="fab fa-facebook-f"></i></a>
										</li>
										<?php
									}
									if ( $twitter_share ) {
										?>
										<li>
											<a href="#"  data-title="<?php echo esc_attr( get_the_title() ); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" class="twitter-share"><i class="fab fa-twitter"></i></a>
										</li>
										<?php
									}
									if ( $linkedin_share ) {
										?>
										<li>
											<a href="#"  data-title="<?php echo esc_attr( get_the_title() ); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" class="linkedin-share"><i class="fab fa-linkedin-in"></i></a>
										</li>
										<?php
									}
									if ( $google_plus_share ) {
										?>
										<li>
											<a href="#"  data-title="<?php echo esc_attr( get_the_title() ); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" class="googleplus-share"><i class="fab fa-google-plus-g"></i></a>
										</li>
										<?php
									}
									if ( $pinterest_share ) {
										?>
										<li>
											<a href="#"  data-title="<?php echo esc_attr( get_the_title() ); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" class="pinterest-share" data-image="<?php the_post_thumbnail_url( 'full' ); ?>"><i class="fab fa-pinterest-p"></i></a>
										</li>
										<?php
									}
									if ( $whatsapp_share ) {
										if ( ! wp_is_mobile() ) {
											?>
												<li><a href="#" data-url="<?php echo esc_url( get_permalink() ); ?>"  class="whatsapp-share"><i class="fab fa-whatsapp"></i></a></li>
											<?php } else { ?>
												<li><a target="_blank" href="https://wa.me/?text=<?php echo esc_url( get_permalink() ); ?>"><i class="fab fa-whatsapp"></i></a></li>
											<?php } ?>
									<?php } ?>
									</ul>
								</div>
								<?php
							}
							?>
						</li>
					</ul>
				</div>
			</div>
			<div class="blog-description text-center">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
				<div class="separator"></div>
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</article><!-- #post -->
