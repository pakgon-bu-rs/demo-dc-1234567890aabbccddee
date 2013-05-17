<?php
	App::import('Component','Common');
	$commonComp = new CommonComponent(); 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
    <title>
        <?php __('DC : '); ?>
        <?php echo $title_for_layout; ?>
    </title>
    <?php echo $scripts_for_layout;?>
<style>
<!--
.styling{
/*color:lime;*/
text-align: center;
color:white; 
font: bold 8px MS Sans Serif;
padding: 6px;
}
.authentication{
    height: 100%;
    margin:auto;
    
}
.authentication hr{
    border: solid 2px #5b5b5b;
}

.authen_btn {
    border: 1px solid #006; 
    background-color: #fff;
}    
-->
</style>
</head>
<body>
	<div style="background-color:#e32; padding: 1px; font-family: Arial Black">@2013 Distribution Center</div>
	<table width="100%" cellpadding="0" cellspacing="0" border="1">
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" style="border: 0px 0px 0px 0px;">
								<tr>
									<td width="120px"><a href="/Home/"><?=$this->Html->image("cplotus_logo.jpg");?></a></td>
									<td><span style="font-size: 22px;"></span><br/><?php echo $this->Session->read('GlobalUser.stakeholder_name'); ?></td>
								</tr>
								<tr>
									<td colspan="2" style="background-color: white"></td>
								</tr>  
							</table>
						</td>
						<td width="350"></td>      
					</tr>
				</table>
			</td>
		</tr>
		<tr >
			<td>
				<?php echo $this->Form->create('Login', array('url'=>'/Login'));?>
				<br><br><br>
					<table align="center" border="0" cellpadding="0" cellspacing="0" style="margin:auto;width:45%" class="authentication">
				<tr>
					<td colspan="2">
						<p style="font-size: 10pt;">You can Login here for using Distribution Center, we hope you enjoy your visit!</p>  
						<br/>
					</td>
				</tr>
				<tr>
					<td colspan="2"><span style="font-size: 10pt;color: red;"><b>Enter your username and password to login.</b></span><br/></td>
				</tr>
				<tr>
					<td width="150px"><span style="font-size: 10pt;">Username:</span></td>
					<td><?echo $this->Form->input('code', array('type'=>'text', 'label'=>false,'div'=>false));?></td>
				</tr>
				<tr>
					<td><span style="font-size: 10pt;">     Password :</span></td>
					<td><?echo $this->Form->input('password',array('type'=>'password','div'=>false,'label'=>false));?></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php echo $this->Form->button('登陆',array('type'=>'submit','div'=>false,'label'=>false,'class'=>'authen_btn'));?>
					</td>
				</tr>
			</table>
		   <?php echo $this->Form->end();?>
				<br><br><br><br><br><br><br>
			</td>
		</tr>
	</table>
	<div class="footer">
	   Copyright 2013, Distribution Center Reserved
	</div>
</body>
</html>