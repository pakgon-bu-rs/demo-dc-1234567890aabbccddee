<h1><?php echo __('Edit Reason Code Management'); ?></h1><br />
<?php  echo $this->Form->create('Re',array('url'=>array('controller'=>'ReasonCodes','action'=>'edit'))); ?>
<table>
        <tr>
            <th><?php echo __('ID'); ?></th>
            <td><?php echo $data['id'] ; ?> </td>
              <?php echo $this->Form->input('id',array('type'=>'hidden','label'=>false,'value'=>$data['id'])); ?> 
      
        </tr>  
        <tr>
            <th><?php echo __('Name'); ?></th>
            <td><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'value'=>$data['name'])); ?></td>
       </tr>
       <tr>
            <th><?php echo __('Name (EN)'); ?></th>
            <td><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'value'=>$data['name_eng'])); ?></td>
       </tr>
       
       <tr>
            <th><?php echo __('Type'); ?></th>
            <td><?php echo $this->Form->input('type',array('type'=>'text','label'=>false,'value'=>$data['type_code'])); ?></td>
       </tr>
       
        <tr>
            <th>&nbsp;</th>
            <td><?php echo $this->Form->input('Save',array('type'=>'Submit','label'=>false)); ?></td>
	</tr>
</table>

<?php  echo $this->Form->end();?>
 <a href ="/ReasonCodes/index/">Back</a>