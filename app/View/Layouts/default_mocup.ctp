<?php
App::import('Component','Common');
$commonComp = new CommonComponent(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="noindex,nofollow" />
	
    
<?php echo $this->Html->script('ui/jquery-1.9.1.min.js'); ?>
    <?php echo $this->Html->script('ui/jquery-ui-1.10.2.custom.min.js'); ?>
    <?php echo $this->Html->css('ui/redmond/jquery-ui-1.10.2.custom.min.css'); ?>
    <?php echo $this->Html->script('jquery.start.js'); ?>
    <?php echo $this->Html->script('JQuery.validate.js'); ?>
    <?php echo $this->Html->script('jQuery.pakgon.cp.dc.action.js'); ?>
    
    
    <!-- Main CSS Styles BENZ EDIT  FILE LIST-->
    <link href="css/default_mocup/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/default_mocup/main.css" rel="stylesheet" type="text/css" />
    <link href="css/default_mocup/2col.css" rel="stylesheet" type="text/css" />
    <link href="css/default_mocup/style.css" rel="stylesheet" type="text/css" />
    <link href="css/default_mocup/mystyle.css" rel="stylesheet" type="text/css" />
    <link href="css/default_mocup/submit.css" rel="stylesheet" type="text/css" />
    <link href="css/default_mocup/textbox.css" rel="stylesheet" type="text/css" />
    <?php //echo $this->Html->css('default_mocup/reset'); ?>
    <?php //echo $this->Html->css('default_mocup/main'); ?>
    <?php //echo $this->Html->css('default_mocup/2col'); ?>
    <?php //echo $this->Html->css('default_mocup/style'); ?>
    <?php //echo $this->Html->css('default_mocup/mystyle'); ?>	
    <?php //echo $this->Html->css('default_mocup/submit'); ?>
    <?php //echo $this->Html->css('default_mocup/textbox'); ?>
    
    <!-- END EDIT -->
    
    
    
<?php echo $this->Html->css('ui-pakgon-cp-form.css'); ?>
    
    

    
    
    <? echo $scripts_for_layout; ?> 

  <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
    <title>
        <?php __('SCS2 : '); ?>
        <?php echo $title_for_layout; ?>
    </title>
    <?php echo $scripts_for_layout;?>
</head>

<body>
     
<div id="main">
<!--	 Tray  -->
 
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
                      <br>
                          <b>Code:</b> <?=$_SESSION["GlobalUser"]["code"]; ?>  |  <a href="/Logout" id="logout">Log out</a>
                    
                      </td>
                       <td style="width:50px"><? echo $this->Html->image("unknownUser.jpg",array("width"=>50)); ?></td>
              </tr>
          </table>
                       
		

	</div>  <!-- /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	 <!-- /header -->

	<hr class="noscreen" />

	<!-- Columns -->
	<div id="cols" class="box">

		<!-- Aside (Left Column) -->
		<div id="aside" class="box">

			<div class="padding box">
			</div> <!-- /padding -->
                            
                       
			   <?php echo $commonComp->getMenuByStakeholder('001'); ?>

		</div> 
             
            <!-- /aside -->

		<hr class="noscreen" />

		<!-- Content (Right Column) -->
         
  <div id="content" class="box">
           <?php echo $this->Session->flash(); ?>
           <div style="background:#FFF; height: auto; min-height:100%;">
           <?php  echo $content_for_layout; ?>
    </div> <!-- /content -->

	</div> <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left">&copy; 2012 <a href="#">Zicure</a>, All Rights Reserved &reg;</p>

		<p class="f-right"></p>

	</div> <!-- /footer -->

</div> <!-- /main -->

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