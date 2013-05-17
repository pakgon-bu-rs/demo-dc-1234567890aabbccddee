<h1><?php echo __('Add Reason Code Management'); ?></h1><br />
<?php  echo $this->Form->create('Re',array('url'=>array('controller'=>'ReasonCodes','action'=>'add'))); ?>
<table>
        <tr>
            <th><?php echo __('ID'); ?></th>
            <td><?php echo $this->Form->input('id',array('type'=>'text','label'=>false)); ?> </td>
        </tr>  
        <tr>
            <th><?php echo __('Name'); ?></th>
            <td><?php echo $this->Form->input('name',array('type'=>'text','label'=>false)); ?> </td>
       </tr>
       <tr>
            <th><?php echo __('Name (EN)'); ?></th>
            <td><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false)); ?> </td>
       </tr>
      
       <tr>
            <th><?php echo __('Type'); ?></th>
            <td><?php echo $this->Form->input('type',array('type'=>'text','label'=>false)); ?> </td>
       </tr>
        <tr>
            <th>&nbsp;</th>
            <td><?php echo $this->Form->input('Save',array('type'=>'Submit','label'=>false)); ?></td>
	</tr>
</table>

<?php  echo $this->Form->end();?>
 <a href ="/ReasonCodes/index/">Back</a>