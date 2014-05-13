<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'class'=>'form-control',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'class'=>'form-control',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class'=>'form-control',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'class'=>'form-control',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class'=>'form-control',
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<div class="container">
	<div class="loginform well mainwell">
		<center><div class="input-group">	
	<?php if ($use_username) { ?>
		<span class="label label-default">Username</span>
		<div><?php echo form_input($username); ?></div>
		<div style="color: red;"><?php echo form_error($username['name']); ?>
			<?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></div>
	<?php } ?>
		<span class="label label-default">Email Address</span>
		<div><?php echo form_input($email); ?></div>
		<div style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></div>
		<span class="label label-default">Password</span>
		<div><?php echo form_password($password); ?></div>
		<div style="color: red;"><?php echo form_error($password['name']); ?></div>
		<span class="label label-default">Confirm Password</span>
		<div><?php echo form_password($confirm_password); ?></div>
		<div style="color: red;"><?php echo form_error($confirm_password['name']); ?></div>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
			<div class="well capmargins">
			<div id="recaptcha_image"></div>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<div><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></div>
		<div style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
		<?php echo $recaptcha_html; ?>
		</div>
	<?php } else { ?>
	
			<div><p>Enter the code exactly as it appears:</p></div>
			<?php echo $captcha_html; ?>
			<div><?php echo form_label('Confirmation Code', $captcha['id']); ?></div>
		<div><?php echo form_input($captcha); ?></div>
		<div style="color: red;"><?php echo form_error($captcha['name']); ?></div>
	
	<?php }
	} ?>
<?php echo form_submit('register', 'Register', 'class="btn btn-primary"'); ?>
<?php echo form_close(); ?>
</div></center>
</div>
</div>