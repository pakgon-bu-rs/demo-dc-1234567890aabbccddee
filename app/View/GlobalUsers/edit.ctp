<h1><?php __('Global Usrs (H.Q. Level) > Edit');?></h1>
<br>
<?php echo $form->create('GlobalUser');?>
	<fieldset>
	<?php
                    echo "<table class=nostyle>";
		echo "<tr><td>Display :</td><td>".$form->input('display' ,array('label'=>FALSE ,"size"=>"30"))."</td></td>";
		echo "<tr><td>Email :</td><td>".$form->input('email',array('label'=>FALSE ,"size"=>"30"))."</td></td>";
                      echo "<tr><td>Employee ID : </td><td>".$form->input('ref3' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Pre name (CN) : </td><td>".$form->input('pre_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>First name (CN) : </td><td>".$form->input('first_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Lastname (CN) : </td><td>".$form->input('last_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Pre name (EN) : </td><td>".$form->input('pre_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>First name (EN) : </td><td>".$form->input('first_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Lastname (EN) : </td><td>".$form->input('last_name_eng' ,array('label'=>FALSE))."</td></td>";
            
                     $options = array("A"=>"Active","S"=>"Suspend","D"=>"Deactivate"); 
		echo "<tr><td>Status (A/D/S) : </td><td>".$form->input('status' ,array('label'=>FALSE, "options"=>$options))."</td></td>";
                     echo "</table>";
	?>
	</fieldset>
<small>Status : A=Active , D = Deactive , S = Suspend</samll>
<?php echo $form->end('Update');?>
