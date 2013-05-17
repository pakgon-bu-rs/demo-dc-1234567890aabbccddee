<div class="ui-pakgon-form">
<h1><?php echo __('Vehicle Type Management > Add '); ?></h1><br />
<?php  echo $this->Form->create('Vt',array('url'=>array('controller'=>'VehicleTypes','action'=>'add'))); ?>
<table> 
       <tr>
            <td><?php echo __('Name'); ?></td>
            <td><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'id'=>'name')); ?> </td>
       </tr>
       
        <tr>
            <td><?php echo __('Name (EN)'); ?></td>
            <td><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'id'=>'nameeng')); ?> </td>
       </tr>
       
       <tr>
            <td><?php echo __('Description'); ?></td>
            <td><?php echo $this->Form->input('description',array('type'=>'text','label'=>false,'id'=>'description')); ?> </td>
       </tr>
       
        <tr>
            <td><?php echo __('Active'); ?></td>
            <td><?php echo $this->Form->input('is_active', array('options' =>$active,'label'=>false,'id'=>'active'));?> </td> 
        </tr>
        
        <tr>
            <td>&nbsp;</td>
            <td><?php echo $this->Form->input('Save',array('type'=>'Submit','label'=>false,'onClick' => "return check();")); ?></td>
	</tr>
</table>
</br>
<?= $this->Form->button('Back',array("div"=>false, 'type'=>'button','onclick'=>"window.location='/VehicleTypes/index';")); ?>
<?php  echo $this->Form->end();?>
</div>
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