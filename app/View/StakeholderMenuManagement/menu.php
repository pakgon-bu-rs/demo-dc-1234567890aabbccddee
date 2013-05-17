<h1><?php echo __('Stakeholder Management'); ?></h1>
<br />

<table>
	<tr>
    	<th>Available Menu</th>
        <th>&nbsp;</th>
    	<th>Stakeholder's Menu</th>
    </tr>
    <tr>
    	<td>
        	<?php
				$total_available_menu = count($available_menus);
				if(!empty($available_menus)){
					//debug($available_menus);
					echo $this->Form->create('StakeholderMenuManagement', array(
						'url'=>'/StakeholderMenuManagement/menu',
						'inputDefaults'=>array('div'=>false)
					));
					echo $this->Form->hidden('id', array('value'=>$this->params['pass'][0]));
					echo $this->Form->input('stakeholder_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
					echo $this->Form->input('menus', array(
						'type'=>'select', 
						'multiple'=>'checkbox', 
						'options'=>$available_menus, 
						'label'=>FALSE, 
						'div'=>FALSE
					));
				}
			?>
        </td>
        <td>
			<?php 
				if($total_available_menu % 2 == 1){
					$middle_position = ceil($total_available_menu / 2);
				}else{
					$middle_position = $total_available_menu;
				}
				
				for($i = 1; $i <= $total_available_menu; $i++){
					if($i == 1 || $i == $middle_position || $i == $total_available_menu){
						echo $this->Form->submit("===>>>"); 
					}else{
						echo "<br />";
					}
				}
			?>
		</td>
        <td>
        	<table style="border-collapse:collapse; border-width:0px; margin:0px; padding:0px">
        	<?php
				$stakeholder_id = @$this->params['pass'][0];
				if(!empty($stakeholder_menus)){
					foreach($stakeholder_menus as $i => $s){
						echo "<tr>";
						echo "<td>{$s} </td>";
						echo "<td>";
						echo "<a href='/StakeholderMenuManagement/delete/{$stakeholder_id}/{$i}' ";
						echo 'onclick="return confirmDelete(\''.$s.'\')"';
						echo ">X</a>";
						echo "</td>";
						echo "</tr>";
					}
				}
			?>
            </table>
        </td>
    </tr>
</table>
        	<?php
				echo $this->Form->end();
			?>

<script type="text/javascript">
function confirmDelete(str){
	var conf = confirm("Do you sure to delete menu \n\n'"+str+"' ?");
	
	return conf;
}
</script>
<?php //debug($available_menus); ?>