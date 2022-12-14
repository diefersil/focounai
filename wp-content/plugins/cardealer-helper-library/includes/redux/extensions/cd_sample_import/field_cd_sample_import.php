<?php
	/**
	 * Redux Framework is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 2 of the License, or
	 * any later version.
	 * Redux Framework is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	 * GNU General Public License for more details.
	 * You should have received a copy of the GNU General Public License
	 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
	 *
	 * @package     ReduxFramework
	 * @author      Dovy Paukstys
	 * @version     3.1.5
	 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Don't duplicate me!
if ( ! class_exists( 'ReduxFramework_cd_sample_import' ) ) {

	/**
	 * Main ReduxFramework_cd_sample_import class
	 *
	 * @since       1.0.0
	 */
	class ReduxFramework_cd_sample_import {

		/**
		 * Field Constructor.
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		function __construct( $field, $value, $parent ) {

			$this->parent = $parent;
			$this->field  = $field;
			$this->value  = $value;

			if ( empty( $this->extension_dir ) ) {
				$this->extension_dir = plugin_dir_path( __FILE__ );
				$this->extension_url = plugin_dir_url( __FILE__ );
			}

			// Set default args for this field to avoid bad indexes. Change this to anything you use.
			$defaults    = array(
				'options'          => array(),
				'stylesheet'       => '',
				'output'           => true,
				'enqueue'          => true,
				'enqueue_frontend' => true,
			);
			$this->field = wp_parse_args( $this->field, $defaults );

		}

		/**
		 * Field Render Function.
		 * Takes the vars and outputs the HTML for the field in the settings
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function render() {

			$secret = md5( md5( AUTH_KEY . SECURE_AUTH_KEY ) . '-' . $this->parent->args['opt_name'] );

			// No errors please
			$defaults = array(
				'full_width' => true,
				'overflow'   => 'inherit',
			);

			$this->field                   = wp_parse_args( $this->field, $defaults );
			$bDoClose                      = false;
			$id                            = $this->parent->args['opt_name'] . '-' . $this->field['id'];
			$cardealer_helper_sample_datas = cdhl_theme_sample_datas();
			$nonce                         = wp_create_nonce( 'sample_data_security' );

			if ( class_exists( 'WPBakeryVisualComposerAbstract' ) && did_action( 'elementor/loaded' ) ) {
				?>
				<div class="pgscore-sample-page-cover">
					<span style="color:#FF0000"><?php esc_html_e( 'Please activate one builder plugin, either WPBakery or Elementor, to import sample data. The theme will import sample data based on the selected plugin.', 'pgs-core' ); ?></span>
				</div>
				<?php
			} else {
				if ( ! empty( $cardealer_helper_sample_datas ) && is_array( $cardealer_helper_sample_datas ) ) {
					$imported_samples = array();
					$sample_data_arr  = get_option( 'pgs_default_sample_data' );
					$page_builder     = cardealer_get_default_page_builder();
					if ( isset( $sample_data_arr ) && ! empty( $sample_data_arr ) ) {
						$imported_samples = json_decode( $sample_data_arr );
					}
					$hide_non_default = true;
					?>
					<div class="sample-data-items">
						<?php
						foreach ( $cardealer_helper_sample_datas as $sample_data ) {
							$sample_data_id                 = sanitize_title( $sample_data['id'] );
							$sample_data_item_classes_array = array(
								'sample-data-item',
								'sample-data-item-' . $sample_data_id,
							);

							if ( ( ( 'wpbakery' === $page_builder && 'default' === $sample_data_id ) || in_array( 'default', $imported_samples, true ) ) || ( ( 'elementor' === $page_builder && 'default-elementor' === $sample_data_id ) || in_array( 'default-elementor', $imported_samples, true ) ) ) {
									$hide_non_default = false;
							}

							$sample_data_item_classes = implode( ' ', array_filter( array_unique( $sample_data_item_classes_array ) ) );
							if ( ! $hide_non_default ) {
								?>
								<div class="<?php echo esc_attr( $sample_data_item_classes ); ?>">
									<?php
									if ( file_exists( $sample_data['data_dir'] . 'preview.png' ) ) {
										?>
										<div class="sample-data-item-screenshot">
											<img src="<?php echo esc_url( $sample_data['data_url'] ); ?>/preview.png" alt="<?php echo esc_attr( $sample_data['name'] ); ?>"/>
										</div>
										<?php
									} else {
										?>
										<div class="sample-data-item-screenshot blank"></div>
										<?php
									}

									$html       = '';
									$do_disable = '';
									if ( ( 'default' === $sample_data_id || 'default-elementor' === $sample_data_id ) && ! empty( $imported_samples ) && in_array( $sample_data_id, $imported_samples, true ) ) {
										$html       = '<i class="fas fa-check"></i>';
										$do_disable = 'disabled="disabled"';
									}
									?>
									<span class="sample-data-item-details"><?php echo esc_html( $sample_data['name'] ); ?></span>
									<h2 class="sample-data-item-name"><?php echo esc_html( $sample_data['name'] ); ?> <?php echo $html; ?></h2>
									<div class="sample-data-item-actions">
										<?php $required_plugins_list = cdhl_sample_data_required_plugins_list(); ?>
										<button class="button button-primary import-this-sample hide-if-no-customize"
											data-id="<?php echo esc_attr( $sample_data['id'] ); ?>"
											data-nonce="<?php echo esc_attr( $nonce ); ?>"
											data-title="<?php echo esc_attr( $sample_data['name'] ); ?>"
											data-title="<?php echo esc_attr( $sample_data['name'] ); ?>"
											data-message="<?php echo esc_attr( $sample_data['message'] ); ?>"
											<?php echo $do_disable; ?>
											<?php echo ( 'default' !== $sample_data_id && ! isset( $sample_data_arr ) ) ? 'disabled="disabled"' : ''; ?>
											<?php echo ( ! empty( $required_plugins_list ) ) ? 'data-required-plugins="' . esc_attr( count( $required_plugins_list ) ) . '"' : ''; ?>>
											<?php echo esc_html__( 'Install', 'cardealer-helper' ); ?>
										</button>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>
					<?php
					$hide_non_default = true;
					$cd_sample_pages  = cardealer_additional_pages();

					if ( ( 'wpbakery' === $page_builder && in_array( 'default', $imported_samples, true ) ) || ( 'elementor' === $page_builder && in_array( 'default-elementor', $imported_samples, true ) ) ) {
						$hide_non_default = false;
					}

					if ( $cd_sample_pages && ! $hide_non_default && apply_filters( 'cardealer_additional_pages_enabled', true ) ) {
						?>
						<div class="cd-sample-page-cover">
							<div id="cd-sample-pages-section-start" class="redux-section-field redux-field redux-section-indent-start ">
								<h3><?php _e( 'Additional pages importer', 'cardealer-helper' ); ?></h3>
							</div>
							<div class="cd-page-preview">
								<img src="<?php echo esc_url( CDHL_URL . 'images/dummy-420x280.png' ); ?>">
								<a href="#" target="_blank"> <?php _e( 'Demo Preview', 'cardealer-helper' ); ?> </a>
							</div>
							<div class="cd-page-selector">
								<select name="cd-sample-page" id="cd-sample-page">
									<?php
									foreach ( $cd_sample_pages as $cd_sample_page ) {
										?>
										<option value="<?php echo esc_attr( $cd_sample_page['id'] ); ?>"
											data-demo="<?php echo esc_attr( $cd_sample_page['demo_url'] ); ?>"
											data-preview="<?php echo esc_attr( $cd_sample_page['previwe_img'] ); ?>"
											data-message="<?php echo esc_attr( $cd_sample_page['message'] ); ?>"
											data-additional_message="<?php echo ( isset( $cd_sample_page['additional_message'] ) ) ? esc_attr( $cd_sample_page['additional_message'] ) : ''; ?>">
											<?php echo esc_html( $cd_sample_page['name'] ); ?>
										</option>
										<?php
									}
									?>
								</select>
								<a href="#" class="button button-primary import-this-sample-page" data-id="" data-nonce="<?php echo $nonce; ?>" ><?php _e( 'Import', 'cardealer-helper' ); ?></a>
								<div class="cd-options-info info-red">
									<?php _e( 'Attention! Additional pages importer will import only page contents. Page styles will apply as per your theme styles and options. After importing page contents using additional page importer, you can manage these page contents later on using page settings.', 'cardealer-helper' ); ?>
								</div>
							</div>
						</div>
						<?php
					}
				}
			}
		}

		/**
		 * Enqueue Function.
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function enqueue() {
			wp_enqueue_script(
				'redux-cd-import-export',
				$this->extension_url . 'field_cd_sample_import' . Redux_Functions::isMin() . '.js',
				array( 'jquery', 'jquery-confirm' ),
				time(),
				true
			);

			$sample_data_requirements          = cdhl_sample_data_requirements();
			$sample_data_required_plugins_list = cdhl_sample_data_required_plugins_list();

			wp_localize_script(
				'redux-cd-import-export',
				'sample_data_import_object',
				array(
					'ajaxurl'                           => admin_url( 'admin-ajax.php' ),
					'alert_title'                       => esc_html__( 'Warning', 'cardealer-helper' ),
					'alert_proceed'                     => esc_html__( 'Proceed', 'cardealer-helper' ),
					'alert_cancel'                      => esc_html__( 'Cancel', 'cardealer-helper' ),
					'alert_install_plugins'             => esc_html__( 'Install Plugins', 'cardealer-helper' ),
					'alert_default_message'             => esc_html__( 'Importing demo content will import contents, widgets and theme options. Importing sample data will override current widgets and theme options. It can take some time to complete the import process.', 'cardealer-helper' ),
					'tgmpa_url'                         => admin_url( 'themes.php?page=theme-plugins' ),
					'sample_data_requirements'          => ! empty( $sample_data_requirements ) ? array_values( $sample_data_requirements ) : false,
					'sample_data_required_plugins_list' => ! empty( $sample_data_required_plugins_list ) ? array_values( $sample_data_required_plugins_list ) : false,
					'sample_import_nonce'               => wp_create_nonce( 'sample_import_security_check' ),
					'page_import_massage'               => esc_html__( "Attention! If the page already exists, then the page won't get imported if you wanted to import the page, please rename the page and try again.", 'cardealer-helper' ),
					'loader_title'                      => esc_html__( 'Importing Demo Content...', 'cardealer-helper' ),
					'loader_message'                    => esc_html__( 'Duration of demo content importing depends on your server speed.', 'cardealer-helper' ),
				)
			);

			wp_enqueue_style(
				'redux-cd-import-export-css',
				$this->extension_url . 'field_cd_sample_import.css',
				time(),
				true
			);
		}
	}
}
