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
    <?php echo $this->Html->script('pakgon.action.js'); ?>
    <?php echo $this->Html->script('jQuery.pakgon.cp.dc.action.js'); ?>
    
    <?php echo $this->Html->css('reset'); ?>
    <?php echo $this->Html->css('main'); ?>
    <?php echo $this->Html->css('2col'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('mystyle'); ?>	
    <?php //echo $this->Html->css('submit'); ?>
    <?php //echo $this->Html->css('textbox'); ?>
    <?php //echo $this->Html->css('ui-pakgon-cp-form.css'); ?>
    <?php echo $scripts_for_layout; ?> 

    <title>
        <?php __('SCS2 : '); ?>
        <?php echo $title_for_layout; ?>
    </title>
    <?php echo $scripts_for_layout;?>
</head>
<body>
	<div id="main">
	<!-- Top Logo -->
	<div id="tray" class="box" style="height:70px;">
        <table cellpadding="2" cellspacing="0" width="100%" style="margin-top:0;">
              <tbody>
			  <tr style="vertical-align: top;">
                  <td valign="middle"  style="width:100px; vertical-align: top;"> <a href="#"><img src="/img/logo_pg.png" "valign="middle" alt="PAKGON Logo Image" style="margin-top:10px;"></a></td>
                  <td width="10px">&nbsp;</td>
                  <td style="vertical-align: top" "="" align="left"><div style="margin-top:18px; margin-left:3px; color:#FFF;font-size:1.2em;"><b><?php echo __('Distribution Center');?></b><br><?php echo $_SESSION["GlobalUser"]["stakeholder_name"];?></div></td>
                  <td style="width:150px; vertical-align: top;">
                      <div style="margin-top:10px; font-size:12px;">
                          <div><b>Name:</b> <?php echo $_SESSION["GlobalUser"]["display"];?> </div><div style=" margin-top:5px;"><b>Position:</b><?php echo $_SESSION["GlobalUser"]["positions"];?><br></div>
                          <div style="margin-top:5px;"><b>Code:</b> <?php echo $_SESSION["GlobalUser"]["code"];?>  |<a href="/Logout" id="logout">Log out</a></div>
                      </div>
                  </td>
                  
                  <td style="width:50px;">
                      <div style="margin-top:3px;">
                      <img src="/img/unknownUser.jpg" alt="" width="50">
                      </div>
                  </td>
              </tr>
          </tbody>
		</table>
	</div>
	<!-- End Top Logo -->

		<hr class="noscreen" />

		<!--	Menu	-->
		<hr class="noscreen" />
		<!--	Container	-->
		<div id="cols" class="box" style="clear:both;">
        
				<!--	Aside (Left Column)		-->
				<div id="aside" class="box" style="width:190px;">
                <!-- Top Carlendar -->
                        <div class="padding box">           
                            <div id="calendarPane">
                                <div id="calendarCurrentDate">
                                    <div class="calendarShowDate"><?=date("j M Y");?></div>
                                </div>
                                <div id="calendarCurrentWeek">
                                    <table border="0" width="100%" cellpadding="0" cellspacing="0" style="margin:0;">
                                    <tr class="bg_weekwidgets" height="12">
                                        <?php
                                            $da = array("Su", "M", "T", "W", "Th", "F", "Sa");
                                            for ($i=0; $i<7; $i++) {
                                                echo "<td align=\"center\">" . $da[$i] . "</td>";
                                            }
                                        ?>
                                    </tr>
                                    <tr class="bg_daywidgets"height="27">
                                        <?php
                                            
                                            $dom = date("d");
                                            $dow = date("w");
                                            $startDate = new DateTime(date("Y-m-d"));
                                            $startDate->sub(new DateInterval('P' . $dow . 'D'));
                            
                                            for ($i=0; $i<7; $i++) {
                                                $calDate = $startDate;
                                                if ($i > 0) {
                                                    $calDate->modify('+1 day');
                                                }
                                                $isToday = false;
                                                if ($calDate->format("d") == date('d')) {
                                                    $isToday = true;
                                                }
                                                echo "<td align=\"center\" " . ($isToday? " id='calendarCurrentDOM'": '') . ">"  . $calDate->format("d") . "</td>";
                                            }
                                            
                                        ?>
                                    </tr>
                                </table>
                                </div>
                            </div>
                        </div> 
                <!-- Top Carlendar -->
                
					<?php echo $commonComp->getMenuByStakeholder('001'); ?>
				</div>
                <!--	End Aside	-->
			<hr class="noscreen" />
			<!--	Content (Right Column)		-->
			
            <!--	Content	-->       
			<div id="content" class="box">
			   <div style="background:#FFF;height:auto;min-height:100%;">
					<?php  echo $content_for_layout; ?>
				</div> 
			</div>
            <!--	End Content		-->
            
			<hr class="noscreen" />
            
            <!-- Footer -->
            <div id="footer" class="box">
                <p class="f-left">© 2012 <a href="#">Zicure</a>, All Rights Reserved ®</p>
                <p class="f-right"></p>
            </div> 
            <!-- End footer -->
            
		</div> <!--	End Container	-->
	</div><!--	End Main	-->
</body>
</html>