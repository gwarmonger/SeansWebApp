<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'class' => 'form-control loginmarg',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'form-control loginmarg',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
$submit = array(
	'class' => 'btn btn-primary', 'type' => 'submit', 'name'=>'submit');
?>
<div class="col-md-4">
<div class="loginform well">
<div class="input-group">		
<?php echo form_open($this->uri->uri_string()); ?>
	
		<span class="label label-default">Login or Email</span>
		<div><?php echo form_input($login); ?></div>
		<div style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
	
		<span class="label label-default">Password</span>
		<div><?php echo form_password($password); ?></div>

		<div style="color: red;"><?php echo form_error($password['name']); ?>
			<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>

		<div>
			<?php echo form_checkbox($remember); ?>
			<?php echo form_label('Remember me', $remember['id']); ?>
			<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
			<!--<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>-->
		</div>

<?php echo form_submit($submit, 'Login'); ?>
<?php echo form_close(); ?>
</div>
</div>
</div>