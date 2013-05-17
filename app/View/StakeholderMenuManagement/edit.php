<h1><?php echo __('Stakeholder Management : Edit'); ?></h1>
<br /><br />
<?php 
    echo $this->Form->create('Stakeholder', array('url'=>'/StakeholderMenuManagement/edit'));
    echo $this->Form->input('id');
    
    $status_list = array('Y'=>'Active', 'N'=>'Inactive');
?>
	<table cellspadding="0" cellspacing="0">
            <tr>
                <td>Application</td>
                <td><?php echo $this->Form->input('application_id',array('div'=>false,'label'=>false, 'options'=>$application_list));?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $this->Form->input('name',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo $this->Form->input('is_active',array('div'=>false,'label'=>false, 'options'=>$status_list));?></td>
            </tr>
			<tr>
                <td>&nbsp;</td>
                <td><?echo $this->Form->submit('Submit');?></td>
            </tr>
        </table>
<?php echo $this->Form->end();?>