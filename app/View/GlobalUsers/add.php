<h1>Global Usrs (H.Q. Level) > Add</h1>
<br>
<?php echo $this->Form->create('GlobalUser');?>
	<fieldset>
	<?php
        echo "<table>";
		echo "<tr><td>Display</td><td>".$this->Form->input('display' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Code</td><td>".$this->Form->input('code',array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Email</td><td>".$this->Form->input('email',array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Employee ID : </td><td>".$this->Form->input('ref3' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Pre name (CN)</td><td>".$this->Form->input('pre_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>First name (CN)</td><td>".$this->Form->input('first_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Lastname (CN)</td><td>".$this->Form->input('last_name' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Pre name (EN)</td><td>".$this->Form->input('pre_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>First name (EN)</td><td>".$this->Form->input('first_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Lastname (EN)</td><td>".$this->Form->input('last_name_eng' ,array('label'=>FALSE))."</td></td>";
		echo "<tr><td>Position</td><td>".$this->Form->input('position_id' ,array('label'=>FALSE, 'value'=>$positions))."</td></td>";
		echo "<tr><td>Stakeholder</td><td>".$this->Form->input('stakeholder_id' ,array('label'=>FALSE, 'value'=>$stakeholders))."</td></td>";
		echo "<tr style=\"display:none\"><td>Status (A)</td><td>".$this->Form->input('status' ,array('label'=>FALSE,'value'=>'A','readonly'=>TRUE))."</td></td>";
                     echo "</table>";
	?>
	</fieldset>
<?php echo $this->Form->end('Save');?>
