<div class="ui-pakgon-form">
<h1><?php echo __('Dock Type Management > Add '); ?></h1>

<?php  echo $this->Form->create('Dt',array('url'=>array('controller'=>'DocksTypes','action'=>'add'))); ?>
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
            <td valign="top"><?php echo __('Description'); ?></td>
            <td><?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'id'=>'description','rows'=>2,'cols'=>26)); ?> </td>
       </tr>

        <tr>
            <td><?php echo __('Active'); ?></td>
            <td><?php echo $this->Form->input('is_active', array('options' =>$active,'label'=>false,'id'=>'is_active'));?> </td> 
        </tr>
        
        <tr>
            <td>&nbsp;</td>
            <td>
                <table class="no-border">
                    <tr>
                        <td>
                        <?php echo $this->Form->submit('Save',array('type'=>'Submit',"div"=>false,'label'=>false,'onClick' => "return check();")); ?>
                        <?php echo $this->Form->button('Cancel',array("div"=>false,'label'=>false, 'type'=>'button','onclick'=>"window.location='/DocksTypes/index';")); ?>
                        </td>
                    </tr>    
             </table>
            </td>
        </tr>
</table>

<?php  echo $this->Form->end();?>
 </br>

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
        
        }if(document.getElementById('active').value==''){
            alert('Not data "Active"');
            document.getElementById('active').focus(); 
            return false;
        }
        
            return true;
        
}
</script>