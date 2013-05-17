<?php
	App::import('Component','Common');
	$commonComp = new CommonComponent(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<!-- Basics -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

    <?php //echo $this->Html->css('reset'); ?>
    <?php //echo $this->Html->css('main'); ?>
    <?php //echo $this->Html->css('2col'); ?>
    <?php //echo $this->Html->css('style'); ?>
    <?php //echo $this->Html->css('mystyle'); ?>	
    
	<!-- CSS -->
    <?php echo $this->Html->css('ui/authen/ui.authen.reset.css'); ?>	
    <?php echo $this->Html->css('ui/authen/ui.authen.animate.css'); ?>	
    <?php echo $this->Html->css('ui/authen/ui.authen.styles.css'); ?>	
	
</head>

	<!-- Main HTML -->
	
<body>
	
    <!-- Top Logo -->
	<div id="tray" class="box" style="height:70px;">
        <table cellpadding="2" cellspacing="0" width="100%" style="margin-top:0;background-color:#303030;">
              <tbody>
			  <tr style="vertical-align: top;">
                  <td valign="middle"  style="width:100px; vertical-align: top;"> <a href="#"><img src="/img/logo_pg.png" "valign="middle" alt="PAKGON Logo Image" style="margin-top:10px;"></a></td>
                  <td width="10px">&nbsp;</td>
                  <td style="vertical-align: top" "="" align="left"><div style="margin-top:18px; margin-left:3px; color:#FFF;font-size:1.2em;"><b><?php echo __('Distribution Center');?></b><br><?php echo @$_SESSION["GlobalUser"]["stakeholder_name"];?></div></td>
                  
              </tr>
          </tbody>
		</table>
	</div>
    
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form method="post" action="/Login">
		
		<label for="name">Username:</label>
		
		<input type="name" name="data[Login][code]" id="LoginCode">
		
		<label for="username">Password:</label>
		
		
		
		<input type="password" name="data[Login][password]" id="LoginPassword">
		
		<div id="lower">
			<input type="submit" value="Login">
		</div>
		
		</form>
	</div>
	<!-- End Page Content -->
</body>
</html>