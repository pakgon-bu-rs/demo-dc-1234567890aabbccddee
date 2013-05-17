<h1><?php echo __('Stakeholder Management: Add'); ?></h1>
<br /><br />
<?php 
    echo $this->Form->create('StakeholderMenuManagement', array('url'=>'/StakeholderMenuManagement/add'));
    
    $status_list = array('Y'=>'Active', 'N'=>'Inactive');
?>
	<table cellspadding="0" cellspacing="0">
            <tr>
                <td>Application</td>
                <td><?php echo $this->Form->input('application_id', array('div'=>false,'label'=>false, 'options'=>$applicationDataLists));?></td>
            </tr>
            <tr>
                <td>Stakholder Name</td>
                <td><?php echo $this->Form->input('name', array('div'=>false,'label'=>false));?></td>
            </tr>
			<tr>
                <td>&nbsp;</td>
                <td><?echo $this->Form->submit('Submit');?></td>
            </tr>
        </table>
<?php echo $this->Form->end();?>