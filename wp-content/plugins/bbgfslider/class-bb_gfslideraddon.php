<?php

GFForms::include_addon_framework();

class BBGFSliderAddOn extends GFAddOn {

	protected $_version = BBGF_SLIDER_ADDON_VERSION;
	protected $_min_gravityforms_version = '1.9';
	protected $_slug = 'bbgfslider';
	protected $_path = 'bbgfslider/bb_gfslideraddon.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Gravity Forms Slider Field Add-On';
	protected $_short_title = 'Slider Field Add-On';

	private static $_instance = null;

	public static function get_instance() {
		if ( self::$_instance == null ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function pre_init() {
		parent::pre_init();

		if ( $this->is_gravityforms_supported() && class_exists( 'GF_Field' ) ) {
			require_once( 'includes/class-bb-gf-slider.php' );
		}
	}

	public function init_admin() {
		parent::init_admin();
		add_filter( 'gform_tooltips', array( $this, 'tooltips' ) );
		add_action( 'gform_field_standard_settings', array( $this, 'field_standard_settings' ), 10, 2 );
		add_action( 'gform_field_appearance_settings', array( $this, 'field_appearance_settings' ), 10, 2 );
	}

	public function scripts() {

		$scripts = array(
			array(
				'handle'  => 'rangeslider_js',
				'src'     => 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js',
				'version' => $this->_version,
				'deps'    => array( 'jquery' ),
				'enqueue' => array(
					array( 'field_types' => array( 'slider' ) ),
				),
			),
			array(
				'handle'  => 'my_script_js',
				'src'     => $this->get_base_url() . '/js/my_script.js',
				'version' => $this->_version,
				'deps'    => array( 'jquery' ),
				'enqueue' => array(
					array( 'field_types' => array( 'slider' ) ),
				),
			),

		);

		return array_merge( parent::scripts(), $scripts );
	}


	public function styles() {
		$styles = array(
			array(
				'handle'  => 'rangeslider_css',
				'src'     => 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css',
				'version' => $this->_version,
				'enqueue' => array(
					array( 'field_types' => array( 'slider' ) )
				)
			),
			array(
				'handle'  => 'my_styles_css',
				'src'     => $this->get_base_url() . '/css/my_styles.css',
				'version' => $this->_version,
				'enqueue' => array(
					array( 'field_types' => array( 'slider' ) )
				)
			),
		);

		return array_merge( parent::styles(), $styles );
	}

	public function tooltips( $tooltips ) {
		$simple_tooltips = array(
			'slider_type' => sprintf( '<h6>%s</h6>%s', esc_html__( 'Slider Type', 'bbgfslider' ), esc_html__( 'Use Single for only TO. User double for From and To.', 'bbgfslider' ) ),
		);

		return array_merge( $tooltips, $simple_tooltips );
	}


	public function field_standard_settings( $position, $form_id ) {
		if ( $position == 20 ) {
			?>

			<li class="slider_type_setting field_setting">
				<label for="slider_type" class="section_label">
					<?php esc_html_e( 'Type of Slider', 'bbgfslider' ); ?>
					<?php gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_type" onChange="SetSliderType(jQuery(this).val());">
					<option value="single">Single</option>
					<option value="double">Double</option>
				</select>
			</li>

			<li class="slider_min_setting field_setting">
          <label for="slider_min_setting" class="section_label">
              <?php esc_html_e( 'Slider Min Value', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_min_setting" type="text" onkeyup="SetSliderMinSetting(jQuery(this).val());" onchange="SetSliderMinSetting(jQuery(this).val());"/>
      </li>
			<li class="slider_max_setting field_setting">
          <label for="slider_max_setting" class="section_label">
              <?php esc_html_e( 'Slider Max Value', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_max_setting" type="text" onkeyup="SetSliderMaxSetting(jQuery(this).val());" onchange="SetSliderMaxSetting(jQuery(this).val());"/>
      </li>

			<li class="slider_hideminmax_setting field_setting">
				<label for="slider_hideminmax_setting" class="section_label">
					<?php esc_html_e( 'Hide Min & Max Labels', 'bbgfslider' ); ?>
					<?php //gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_hideminmax_setting" onChange="SetSliderHideminmaxSetting(jQuery(this).val());">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</li>

			<li class="slider_from_setting field_setting">
          <label for="slider_from_setting" class="section_label">
              <?php esc_html_e( 'Slider From Value', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_from_setting" type="text" onkeyup="SetSliderFromSetting(jQuery(this).val());" onchange="SetSliderFromSetting(jQuery(this).val());"/>
      </li>

			<li class="slider_to_setting field_setting">
          <label for="slider_to_setting" class="section_label">
              <?php esc_html_e( 'Slider To Value', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_to_setting" type="text" onkeyup="SetSliderToSetting(jQuery(this).val());" onchange="SetSliderToSetting(jQuery(this).val());"/>
      </li>

			<li class="slider_hidefromto_setting field_setting">
				<label for="slider_hidefromto_setting" class="section_label">
					<?php esc_html_e( 'Hide From To Labels', 'bbgfslider' ); ?>
					<?php //gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_hidefromto_setting" onChange="SetSliderHidefromtoSetting(jQuery(this).val());">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</li>
			<li class="slider_step_setting field_setting">
          <label for="slider_step_setting" class="section_label">
              <?php esc_html_e( 'Slider Step Value', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_step_setting" type="text" onkeyup="SetSliderStepSetting(jQuery(this).val());" onchange="SetSliderStepSetting(jQuery(this).val());"/>
      </li>

			<li class="slider_prettify_setting field_setting">
				<label for="slider_prettify_setting" class="section_label">
					<?php esc_html_e( 'Pretiffy the Values', 'bbgfslider' ); ?>
					<?php //gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_prettify_setting" onChange="SetSliderPrettifySetting(jQuery(this).val());">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</li>
			<li class="slider_prettifyseparator_setting field_setting">
          <label for="slider_prettifyseparator_setting" class="section_label">
              <?php esc_html_e( 'Prettify Separator (Eg. ,)', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_prettifyseparator_setting" type="text" onkeyup="SetSliderPrettifyseparatorSetting(jQuery(this).val());" onchange="SetSliderPrettifyseparatorSetting(jQuery(this).val());"/>
      </li>

			<li class="slider_grid_setting field_setting">
				<label for="slider_grid_setting" class="section_label">
					<?php esc_html_e( 'Show Grid for Slider', 'bbgfslider' ); ?>
					<?php //gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_grid_setting" onChange="SetSliderGridSetting(jQuery(this).val());">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</li>
			<li class="slider_gridsnap_setting field_setting">
				<label for="slider_gridsnap_setting" class="section_label">
					<?php esc_html_e( 'Snap marker to  Grid', 'bbgfslider' ); ?>
					<?php //gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_gridsnap_setting" onChange="SetSliderGridsnapSetting(jQuery(this).val());">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</li>

			<li class="slider_prefix_setting field_setting">
          <label for="slider_prefix_setting" class="section_label">
              <?php esc_html_e( 'Slider Value Prefix (Eg. $)', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_prefix_setting" type="text" onkeyup="SetSliderPrefixSetting(jQuery(this).val());" onchange="SetSliderPrefixSetting(jQuery(this).val());"/>
      </li>
			<li class="slider_postfix_setting field_setting">
          <label for="slider_postfix_setting" class="section_label">
              <?php esc_html_e( 'Slider Value Postfix (Eg. $)', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_postfix_setting" type="text" onkeyup="SetSliderPostfixSetting(jQuery(this).val());" onchange="SetSliderPostfixSetting(jQuery(this).val());"/>
      </li>
			<li class="slider_postfixm_setting field_setting">
          <label for="slider_postfixm_setting" class="section_label">
              <?php esc_html_e( 'Max Postfix (Eg. +)', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_postfixm_setting" type="text" onkeyup="SetSliderPostfixmSetting(jQuery(this).val());" onchange="SetSliderPostfixmSetting(jQuery(this).val());"/>
      </li>

			<li class="slider_values_setting field_setting">
          <label for="slider_values_setting" class="section_label">
              <?php esc_html_e( 'Slider Custom Values', 'bbgfslider' ); ?>
              <?php //gform_tooltip( 'input_class_setting' ) ?>
          </label>
          <input id="slider_values_setting" type="text" onkeyup="SetSliderValuesSetting(jQuery(this).val());" onchange="SetSliderValuesSetting(jQuery(this).val());"/>
      </li>
			<?php

		}
	}
	public function field_appearance_settings( $position, $form_id ) {
		if ( $position == 500 ) { ?>
			<li class="slider_skin_setting field_setting">
				<label for="slider_skin_setting" class="section_label">
					<?php esc_html_e( 'Select a skin for Slider', 'bbgfslider' ); ?>
					<?php //gform_tooltip( 'slider_type' ) ?>
				</label>
				<select id="slider_skin_setting" onChange="SetSliderSkinSetting(jQuery(this).val());">
					<option value="flat">Flat</option>
					<option value="big">Big</option>
					<option value="modern">Modern</option>
					<option value="sharp">Sharp</option>
					<option value="round">Round</option>
					<option value="square">Square</option>
				</select>
			</li>
			<?php
		}
	}

}
