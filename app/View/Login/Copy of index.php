<h3>Login</h3>
<hr /><br /><br />
<?php
	echo $form->create('Login', array('url'=>'/login/index'));
	echo $form->input('code', array('type'=>'text', 'label'=>'User Code'));
	echo $form->input('password', array('type'=>'password'));
	echo $form->end('Login');
?>
Please use : username : 1000, password : 1234 for testing