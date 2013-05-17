<h1><?php __('Global Usrs (H.Q. Level) > Add');?></h1>
<br>
<?php echo $form->create('GlobalUser');?>
	<fieldset>
	<?php
                    echo "<table>";
		echo "<tr><td>Display</td><td>".$form->input('display' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Email</td><td>".$form->input('email',array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Employee ID : </td><td>".$form->input('ref3' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Pre name (CN)</td><td>".$form->input('pre_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>First name (CN)</td><td>".$form->input('first_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Lastname (CN)</td><td>".$form->input('last_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Pre name (EN)</td><td>".$form->input('pre_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>First name (EN)</td><td>".$form->input('first_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Lastname (EN)</td><td>".$form->input('last_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr style=\"display:none\"><td>Status (A)</td><td>".$form->input('status' ,array('label'=>FALSE,'value'=>'A','readonly'=>TRUE))."</td></td>";
                     echo "</table>";
	?>
	</fieldset>
<?php echo $form->end('Save');?>
