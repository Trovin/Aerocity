<?php

if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class Simple_GF_Field extends GF_Field {

	public $type = 'slider';

	public function get_form_editor_field_title() {
		return esc_attr__( 'Slider', 'bbgfslider' );
	}

	public function get_form_editor_button() {
		return array(
			'group' => 'advanced_fields',
			'text'  => $this->get_form_editor_field_title(),
		);
	}

	function get_form_editor_field_settings() {
		$features = array('label_setting',
											'description_setting',
											'rules_setting',
											'placeholder_setting',

											'slider_type_setting',
											'slider_min_setting',
											'slider_max_setting',
											'slider_hideminmax_setting',
											'slider_from_setting',
											'slider_to_setting',
											'slider_hidefromto_setting',

											'css_class_setting',
											'size_setting',
											'admin_label_setting',
											'default_value_setting',
											'visibility_setting',
											'conditional_logic_field_setting',);


				$features_paid = array('slider_grid_setting',
																'slider_gridsnap_setting',
																'slider_step_setting',
																'slider_prettify_setting',
																'slider_prettifyseparator_setting',
																'slider_prefix_setting',
																'slider_postfix_setting',
																'slider_postfixm_setting',
																'slider_values_setting',

																'slider_skin_setting',
												);

		if(count($features_paid)>0){
				return array_merge($features,$features_paid);
		}
		return $features;
	}

	public function is_conditional_logic_supported() {
			return true;
	}

	public function get_form_editor_inline_script_on_page_render() {
		//Type
		$script = sprintf( "function SetDefaultValues_slider(field) {field.label = '%s';}", $this->get_form_editor_field_title() ) . PHP_EOL;
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var sliderType = field.sliderType == undefined ? '' : field.sliderType;" .
		           "jQuery('#slider_type').val(sliderType);" .
	           	"});" . PHP_EOL;

		$script .= "function SetSliderType(value) {SetFieldProperty('sliderType', value);}" . PHP_EOL;

		//Min
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var sliderMin = field.sliderMin == undefined ? '' : field.sliderMin;" .
		           "jQuery('#slider_min_setting').val(sliderMin);" .
	           	"});" . PHP_EOL;

		$script .= "function SetSliderMinSetting(value) {SetFieldProperty('sliderMin', value);}" . PHP_EOL;

		//Max
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var sliderMax = field.sliderMax == undefined ? '' : field.sliderMax;" .
		           "jQuery('#slider_max_setting').val(sliderMax);" .
	           	"});" . PHP_EOL;

		$script .= "function SetSliderMaxSetting(value) {SetFieldProperty('sliderMax', value);}" . PHP_EOL;

		//Hide Min Max
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
							 "var sliderHideminmax = field.sliderHideminmax == undefined ? '' : field.sliderHideminmax;" .
							 "jQuery('#slider_hideminmax_setting').val(sliderHideminmax);" .
							"});" . PHP_EOL;
		$script .= "function SetSliderHideminmaxSetting(value) {SetFieldProperty('sliderHideminmax', value);}" . PHP_EOL;

		//From
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var sliderFrom = field.sliderFrom == undefined ? '' : field.sliderFrom;" .
		           "jQuery('#slider_from_setting').val(sliderFrom);" .
	           	"});" . PHP_EOL;
		$script .= "function SetSliderFromSetting(value) {SetFieldProperty('sliderFrom', value);}" . PHP_EOL;

		//To
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
		           "var sliderTo = field.sliderTo == undefined ? '' : field.sliderTo;" .
		           "jQuery('#slider_to_setting').val(sliderTo);" .
	           	"});" . PHP_EOL;
		$script .= "function SetSliderToSetting(value) {SetFieldProperty('sliderTo', value);}" . PHP_EOL;

		//Hide From To
		$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
							 "var sliderHidefromto = field.sliderHidefromto == undefined ? '' : field.sliderHidefromto;" .
							 "jQuery('#slider_hidefromto_setting').val(sliderHidefromto);" .
							"});" . PHP_EOL;
		$script .= "function SetSliderHidefromtoSetting(value) {SetFieldProperty('sliderHidefromto', value);}" . PHP_EOL;


			//Step
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
			           "var sliderStep = field.sliderStep == undefined ? '' : field.sliderStep;" .
			           "jQuery('#slider_step_setting').val(sliderStep);" .
		           	"});" . PHP_EOL;
			$script .= "function SetSliderStepSetting(value) {SetFieldProperty('sliderStep', value);}" . PHP_EOL;

			//Pretify
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
			           "var sliderPrettify = field.sliderPrettify == undefined ? '' : field.sliderPrettify;" .
			           "jQuery('#slider_prettify_setting').val(sliderPrettify);" .
		           	"});" . PHP_EOL;
			$script .= "function SetSliderPrettifySetting(value) {SetFieldProperty('sliderPrettify', value);}" . PHP_EOL;

			//Pretiffy Separator
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderPrettifyseparator = field.sliderPrettifyseparator == undefined ? '' : field.sliderPrettifyseparator;" .
								 "jQuery('#slider_prettifyseparator_setting').val(sliderPrettifyseparator);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderPrettifyseparatorSetting(value) {SetFieldProperty('sliderPrettifyseparator', value);}" . PHP_EOL;

			//Grid
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderGrid = field.sliderGrid == undefined ? '' : field.sliderGrid;" .
								 "jQuery('#slider_grid_setting').val(sliderGrid);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderGridSetting(value) {SetFieldProperty('sliderGrid', value);}" . PHP_EOL;

			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderGridsnap = field.sliderGridsnap == undefined ? '' : field.sliderGridsnap;" .
								 "jQuery('#slider_gridsnap_setting').val(sliderGridsnap);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderGridsnapSetting(value) {SetFieldProperty('sliderGridsnap', value);}" . PHP_EOL;

			//Prefix
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderPrefix = field.sliderPrefix == undefined ? '' : field.sliderPrefix;" .
								 "jQuery('#slider_prefix_setting').val(sliderPrefix);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderPrefixSetting(value) {SetFieldProperty('sliderPrefix', value);}" . PHP_EOL;

			//Postfix
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderPostfix = field.sliderPostfix == undefined ? '' : field.sliderPostfix;" .
								 "jQuery('#slider_postfix_setting').val(sliderPostfix);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderPostfixSetting(value) {SetFieldProperty('sliderPostfix', value);}" . PHP_EOL;

			//Max Postfix
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderPostfixm = field.sliderPostfixm == undefined ? '' : field.sliderPostfixm;" .
								 "jQuery('#slider_postfixm_setting').val(sliderPostfixm);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderPostfixmSetting(value) {SetFieldProperty('sliderPostfixm', value);}" . PHP_EOL;

			//Custom Values
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderValues = field.sliderValues == undefined ? '' : field.sliderValues;" .
								 "jQuery('#slider_values_setting').val(sliderValues);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderValuesSetting(value) {SetFieldProperty('sliderValues', value);}" . PHP_EOL;

			//Skin Setting
			$script .= "jQuery(document).bind('gform_load_field_settings', function (event, field, form) {" .
								 "var sliderSkin = field.sliderSkin == undefined ? '' : field.sliderSkin;" .
								 "jQuery('#slider_skin_setting').val(sliderSkin);" .
								"});" . PHP_EOL;
			$script .= "function SetSliderSkinSetting(value) { SetFieldProperty('sliderSkin', value); }" . PHP_EOL;

		return $script;
	}

	public function get_field_input( $form, $value = '', $entry = null ) {
		$id              = absint( $this->id );
		$form_id         = absint( $form['id'] );
		$is_entry_detail = $this->is_entry_detail();
		$is_form_editor  = $this->is_form_editor();

		// Prepare the value of the input ID attribute.
		$field_id = $is_entry_detail || $is_form_editor || $form_id == 0 ? "input_$id" : 'input_' . $form_id . "_$id";
		$list_field_id	= '#field_' . $form_id . "_$id";
		$value = esc_attr( $value );

		// Get the value of the inputClass property for the current field.
		$inputClass = $this->inputClass;

		// Prepare the input classes.
		$size         = $this->size;
		$class_suffix = $is_entry_detail ? '_admin' : '';
		$class        = $size . $class_suffix . ' ' . $inputClass;

		// Prepare the other input attributes.
		$tabindex              = $this->get_tabindex();
		$logic_event           = ! $is_form_editor && ! $is_entry_detail ? $this->get_conditional_logic_event( 'keyup' ) : '';
		$placeholder_attribute = $this->get_field_placeholder_attribute();
		$required_attribute    = $this->isRequired ? 'aria-required="true"' : '';
		$invalid_attribute     = $this->failed_validation ? 'aria-invalid="true"' : 'aria-invalid="false"';
		$disabled_text         = $is_form_editor ? 'disabled="disabled"' : '';

		$slider_type         		= $this->sliderType ? 'data-type="'.$this->sliderType.'"':'';
		$slider_min         		= $this->sliderMin ? 'data-min="'.$this->sliderMin.'"':'data-min="0"';
		$slider_max         		= $this->sliderMax ? 'data-max="'.$this->sliderMax.'"':'data-max="100"';
		$slider_hideminmax		  = $this->sliderHideminmax ? 'data-hide-min-max="'.$this->sliderHideminmax.'"':'';
		$slider_from         		= $this->sliderFrom ? 'data-from="'.$this->sliderFrom.'"':'data-from:"0"';
		$slider_to	         		= $this->sliderTo ? 'data-to="'.$this->sliderTo.'"':'data-to:"100"';
		$slider_hidefromto		  = $this->sliderHidefromto ? 'data-hide-from-to="'.$this->sliderHidefromto.'"':'';


		$slider_prettify     		= $this->sliderPrettify ? 'data-prettify-enabled="'.$this->sliderPrettify.'"':'';
		$slider_separator    		= $this->sliderPrettifyseparator ? 'data-prettify-separator="'.$this->sliderPrettifyseparator.'"':'';

		$slider_grid	         	= $this->sliderGrid ? 'data-grid="'.$this->sliderGrid.'"':'data-grid:"false"';
		$slider_gridsnap	      = $this->sliderGridsnap ? 'data-grid-snap="'.$this->sliderGridsnap.'"':'data-grid-snap:"false"';
		$slider_prefix	        = $this->sliderPrefix ? 'data-prefix="'.$this->sliderPrefix.'"':'';
		$slider_postfix	        = $this->sliderPostfix ? 'data-postfix="'.$this->sliderPostfix.'"':'';
		$slider_postfixm	      = $this->sliderPostfixm ? 'data-max-postfix="'.$this->sliderPostfixm.'"':'';
		$slider_step	         	= $this->sliderStep ? 'data-step="'.$this->sliderStep.'"':'';
		$slider_values	        = $this->sliderValues ? 'data-values="'.$this->sliderValues.'"':'';
		$slider_skin		        = $this->sliderSkin ? 'data-skin="'.$this->sliderSkin.'"':'';

		// Prepare the input tag for this field.
		$input = "<input name='input_{$id}' id='{$field_id}' type='text' value='{$value}' class='{$class} js-range-slider' data-decorate_both='true' {$tabindex} {$logic_event} {$placeholder_attribute} {$required_attribute} {$invalid_attribute} {$disabled_text} $slider_type $slider_min $slider_max $slider_from $slider_to $slider_grid $slider_gridsnap $slider_prefix $slider_step $slider_values
		$slider_postfix $slider_postfixm $slider_skin $slider_hideminmax $slider_hidefromto $slider_prettify $slider_separator />";

		return sprintf( "<div class='ginput_container ginput_container_%s'>%s</div>", $this->type, $input );
	}

	// public function get_conditional_logic_event( $event ) {
	//
	// }
}

GF_Fields::register( new Simple_GF_Field() );
