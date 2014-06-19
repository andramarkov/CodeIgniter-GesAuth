<?php

	$this->set_css($this->default_theme_path.'/gesauth/css/gesauth.css');
	$this->set_js_lib($this->default_theme_path.'/gesauth/js/jquery.form.js');
	$this->set_js_config($this->default_theme_path.'/gesauth/js/gesauth-edit.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<h3><?php echo $this->l('form_edit'); ?> <?php echo $subject?></h3>
<?php echo form_open( $update_url, 'method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data"'); ?>
<div class='ui-widget-content ui-corner-all datatables'>
<?php
$counter = 0;
	foreach($fields as $field)
	{
		$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
		$counter++;
		if($input_fields[$field->field_name]->input != "" && $input_fields[$field->field_name]->input != null ){
?>
<div class='form-field-box <?php echo $even_odd?>' id="<?php echo $field->field_name; ?>_field_box">
	<div class='form-display-as-box' id="<?php echo $field->field_name; ?>_display_as_box">
		<?php echo $input_fields[$field->field_name]->display_as;?><?php echo ($input_fields[$field->field_name]->required)? " <span class='required'>*</span> " : ""?><?php if($input_fields[$field->field_name]->display_as != '') echo ' :';?>
	</div>
	<div class='form-input-box' id="<?php echo $field->field_name; ?>_input_box">
		<?php echo $input_fields[$field->field_name]->input?>
	</div>
	<div class='clear'></div>
</div>
<?php 
		}else if($input_fields[$field->field_name]->display_as != ''){
			?>
			<h3 class="fieldsetgesauth ui-accordion-header ui-helper-reset form-title">
				<div class='floatL form-title-left'>
					<?php echo $input_fields[$field->field_name]->display_as;?>
				</div>
				<div class='clear'></div>
			</h3>
			<div class='form-content form-div'>
				<div>
			<?php
		}else{
			?>
			</div>
			</div>
			<?php
		}
	}
?>	
<div class='form-content form-div'>
	<div>
			<!-- Start of hidden inputs -->
				<?php
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<!-- End of hidden inputs -->
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
			<div class='line-1px'></div>
			<div id='report-error' class='report-div error'></div>
			<div id='report-success' class='report-div success'></div>
		</div>
		<div class='buttons-box'>
			<div class='form-button-box'>
				<input  id="form-button-save" type='submit' value='<?php echo $this->l('form_update_changes'); ?>' class='ui-input-button' />
			</div>
			<?php 	if(!$this->unset_back_to_list) { ?>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_update_and_go_back'); ?>' class='ui-input-button' id="save-and-go-back-button"/>
			</div>
			<div class='form-button-box'>
				<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class='ui-input-button' id="cancel-button" />
			</div>
			<?php }?>
			<div class='form-button-box loading-box'>
				<div class='small-loading' id='FormLoading'><?php echo $this->l('form_update_loading'); ?></div>
			</div>
			<div class='clear'></div>
		</div>
</div>		
<?php echo form_close(); ?>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';
	
	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>