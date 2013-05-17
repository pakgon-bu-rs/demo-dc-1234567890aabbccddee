<?php
	App::import('Component','Common');
	$commonComp = new CommonComponent(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
	
    <!--link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" / --> <!-- RESET -->
    <!--link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" / --> <!-- MAIN STYLE SHEET -->
    <!--link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" / --> <!-- DEFAULT: 2 COLUMNS -->
    <!--link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" / --> <!-- ALTERNATE: 1 COLUMN -->
    <!--link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" / --> <!-- GRAPHIC THEME -->
    <!--link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" / --> <!-- WRITE YOUR CSS CODE HERE -->
    
    <!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	
    <?php echo $this->Html->script('ui/jquery-1.9.1.min.js'); ?>
    <?php echo $this->Html->script('ui/jquery-ui-1.10.2.custom.min.js'); ?>
    <?php echo $this->Html->css('ui/redmond/jquery-ui-1.10.2.custom.min.css'); ?>
    <?php echo $this->Html->script('jquery.start.js'); ?>
    <?php echo $this->Html->script('JQuery.validate.js'); ?>
    <?php echo $this->Html->script('jQuery.pakgon.cp.dc.action.js'); ?>
    
    <?php echo $this->Html->css('reset'); ?>
    <?php echo $this->Html->css('main'); ?>
    <?php echo $this->Html->css('2col'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('mystyle'); ?>	
    <?php echo $this->Html->css('submit'); ?>
    <?php echo $this->Html->css('textbox'); ?>
    <?php echo $this->Html->css('ui-pakgon-cp-form.css'); ?>
    <?php echo $scripts_for_layout; ?> 

    <title>
        <?php __('SCS2 : '); ?>
        <?php echo $title_for_layout; ?>
    </title>
    <?php echo $scripts_for_layout;?>
</head>
<body>
	<div id="main">
		<!--	Top Logo	-->
		<div id="tray" class="box">
			 <table width="100%" cellpadding="2" cellspacing="0" >
				  <tr style="vertical-align: top">
					  <td  style="width:100px; vertical-align: top"><a href="/"><?= $this->Html->image('cplotus_logo.jpg',array("valign"=>"middle"));?></a></td>
					  <td width="10px">&nbsp;</td>
					  <td align="left" style="vertical-align: top""> <?="<font size='4.5px'><b>存储</b><br> ".$_SESSION["GlobalUser"]["stakeholder_name"]."</font>"?></td>
					  <td style="width:150px; vertical-align: top" >
						  <?php
							 echo "<b>Name:</b> ". $_SESSION["GlobalUser"]["display"]; 
							 echo "<br><b>Position:</b> ".$_SESSION["GlobalUser"]["positions"];
						  ?>
						  <br><b>Code:</b> <?=$_SESSION["GlobalUser"]["code"]; ?>  |  <a href="/Logout" id="logout">Log out</a>
						</td>
						<td style="width:50px"><? echo $this->Html->image("unknownUser.jpg",array("width"=>50)); ?></td>
				  </tr>
			  </table>               
		</div><!--	End Top Logo	-->

		<hr class="noscreen" />

		<!--	Menu	-->
		<hr class="noscreen" />
		<!--	Container	-->
		<div id="cols" class="box">
				<!--	Aside (Left Column)		-->
				<div id="aside" class="box">
					<div class="padding box"></div>     
					<?php echo $commonComp->getMenuByStakeholder('001'); ?>
				</div><!--	End Aside	-->
			<hr class="noscreen" />
			<!--	Content (Right Column)		-->
			<!--	Content	-->       
			<div id="content" class="box">
			   <?php echo $this->Session->flash(); ?>
			   <div style="background:#FFF; height: auto; min-height:100%;">
					<?php  echo $content_for_layout; ?>
				</div> 
			</div><!--	End Content		-->
			<hr class="noscreen" /><!--		Footer		-->
			<div id="footer" class="box">
				<p class="f-left">&copy; 2012 <a href="#">Zicure</a>, All Rights Reserved &reg;</p>
				<p class="f-right"></p>
			</div><!--	End Footer	-->
		</div> <!--	End Container	-->
	</div><!--	End Main	-->
</body>
</html>

<script type="text/javascript">
$(document).ready(function() {
	$("#flashMessage").dialog({
		title:"<?php echo __("App status Message", true); ?>",
		modal:true,
		width: 600,
		height:200,
		buttons:{
			<?php echo __("Done", true); ?>: function() {
				$(this).dialog("close");
			}
		}
	});
});
</script>