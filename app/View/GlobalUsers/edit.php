<h1>Global Usrs (H.Q. Level) > Edit</h1>
<br>
<?php echo $this->Form->create('GlobalUser');?>
	<fieldset>
	<?php
    echo $this->Form->input('id');
        $options = array("A"=>"Active","S"=>"Suspend","D"=>"Deactivate"); 
        echo "<table class=nostyle>";
		echo "<tr><td>Display :</td><td>".$this->Form->input('display' ,array('label'=>FALSE ,"size"=>"30"))."</td></tr>";
		echo "<tr><td>Code :</td><td>".$this->Form->input('code' ,array('label'=>FALSE ,"size"=>"30"))."</td></tr>";
		echo "<tr><td>Email :</td><td>".$this->Form->input('email',array('label'=>FALSE ,"size"=>"30"))."</td></tr>";
        echo "<tr><td>Employee ID : </td><td>".$this->Form->input('ref3' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>Pre name (CN) : </td><td>".$this->Form->input('pre_name' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>First name (CN) : </td><td>".$this->Form->input('first_name' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>Lastname (CN) : </td><td>".$this->Form->input('last_name' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>Pre name (EN) : </td><td>".$this->Form->input('pre_name_eng' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>First name (EN) : </td><td>".$this->Form->input('first_name_eng' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>Lastname (EN) : </td><td>".$this->Form->input('last_name_eng' ,array('label'=>FALSE))."</td></tr>";
		echo "<tr><td>Position</td><td>".$this->Form->input('position_id' ,array('type'=>'select', 'label'=>FALSE, 'value'=>$positions))."</td></tr>";
		echo "<tr><td>Stakeholder</td><td>".$this->Form->input('stakeholder_id' ,array('type'=>'select', 'label'=>FALSE, 'value'=>$stakeholders))."</td></tr>";
            
		echo "<tr><td>Status (A/D/S) : </td><td>".$this->Form->input('status' ,array('label'=>FALSE, "options"=>$options))."</td></tr>";
                     echo "</table>";
	?>
	</fieldset>
<small>Status : A=Active , D = Deactive , S = Suspend</samll>
<?php echo $this->Form->end('Update');?>
<?php 
//    pr($this->data); 
//    pr($positions);
//    pr($stakeholders);
?>