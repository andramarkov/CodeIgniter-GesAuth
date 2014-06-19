<div style="text-align:center;">
	<h2><?php echo $lang['login_title']; ?></h2>
	<p><?php echo $lang['login_paragraph1']; ?></p>
</div>
<div id="message"></div>
<div id="login-box">
	<h1><a href="<?php echo site_url(); ?>"><?php echo SITE_NAME; ?></a></h1>
	<?php
	echo form_open('login','method="post" id="login-form"');
	?>
	<span id="login">
	<label for="login"><?php echo $lang['login_input_login']; ?></label>
	<?php echo form_input(array('name'=>'login','value'=>'','class'=>'form-control login textbox','style'=>'width:200px;')) ; ?><br />
	</span>
	<span id="password">
	<label for="password"><?php echo $lang['login_input_password']; ?></label>
	<?php echo form_password(array('name'=>'password','value'=>'','class'=>'form-control password textbox ','style'=>'width:200px;')); ?><br />
	</span>
	<p>
	<?php echo form_submit('submit','S\'identifier','id="submit" class="submit"'); ?>
	</p>
	<?php echo form_close("\n"); ?>
</div>
<script type="application/javascript">
$(document).ready(function() {
	$('#submit').click(function() {
		var form_data = {
			login : $('.login').val(),
			password : $('.password').val(),
			ajax : '1'
		};
		
		$.ajax({
			url: "<?php echo site_url('login/ajax_check'); ?>",
			type: 'POST',
			async : false,
			data: form_data,
			success: function(msg) {
				$('#message').html(msg);
			}
		});
		return false;
	});
});
</script>