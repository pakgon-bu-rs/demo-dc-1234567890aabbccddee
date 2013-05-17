<h1><?php echo __('Vehicle Type Management > Edit '); ?></h1><br />
<?php  echo $this->Form->create('Vt',array('url'=>array('controller'=>'VehicleTypes','action'=>'edit'))); ?>
<table>
        <tr>
            <th><?php echo __('ID'); ?></th>
            <td><?php echo $data['id']; ?> </td>
                <?php echo $this->Form->input('id',array('type'=>'hidden','label'=>false,'value'=>$data['id'])); ?> 
        </tr>
        
        <tr>
            <th><?php echo __('Name'); ?></th>
            <td><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'value'=>$data['name'])); ?> </td>
       </tr>
         <tr>
            <th><?php echo __('Name (EN)'); ?></th>
            <td><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'value'=>$data['name_eng'])); ?> </td>
        </tr>
       <tr>
            <th><?php echo __('Description'); ?></th>
            <td><?php echo $this->Form->input('description',array('type'=>'text','label'=>false,'value'=>$data['description'])); ?> </td>
       </tr>
        <tr>
            <th><?php echo __('Active'); ?></th>
            
            <td><?php echo $this->Form->input('is_active', array('options' =>$active,'label'=>false,'value'=>$data['is_active']));?> </td> 
        </tr>
        
          
        <tr>
            <th>&nbsp;</th>
            <td><?php echo $this->Form->submit('Save',array('label'=>false)); ?></td>
	</tr>
</table>

<?php  echo $this->Form->end();?>
 <a href ="/VehicleTypes/index/">Back</a>
  <script>
function check(){
    
        if(document.getElementById('name').value==''){
            alert('Not data "Name"');
            document.getElementById('name').focus(); 
            return false;
        }if(document.getElementById('nameeng').value==''){
            alert('Not data "Name English"');
            document.getElementById('nameeng').focus(); 
            return false;
        }if(document.getElementById('description').value==''){
            alert('Not data "Description"');
            document.getElementById('description').focus(); 
            return false;
        }if(document.getElementById('active').value==''){
            alert('Not data "Active"');
            document.getElementById('active').focus(); 
            return false;
        }
        
            return true;
        
}
</script>