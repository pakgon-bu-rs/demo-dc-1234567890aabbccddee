<div class="ui-pakgon-form">
<h1><?php echo __('Dock Management > Edit '); ?></h1>
<?php  echo $this->Form->create('Do',array('url'=>array('controller'=>'Docks','action'=>'edit',$id))); ?>
    <table>
          <tr>
                <td><?php echo __('ID'); ?></td>
                <td><?php echo $data['id'] ; ?> </td>
                    <?php echo $this->Form->input('id',array('type'=>'hidden','label'=>false,'value'=>$data['id'])); ?> 
           </tr>
                
            <tr>
                <td><?php echo __('Name'); ?></td>
                <td><?php echo $this->Form->input('docks_name',array('type'=>'text','label'=>false,'value'=>$data['name'],'id'=>'name')); ?> </td>
           </tr>
            <tr>
                <td><?php echo __('Name (EN)'); ?></td>
                <td><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'value'=>$data['name_eng'],'id'=>'nameeng')); ?> </td>
           </tr>
           <tr>
                <td valign="top"><?php echo __('Description'); ?></td>
                <td><?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'value'=>$data['description'],'id'=>'description','rows'=>2,'cols'=>26)); ?> </td>
           </tr>
                <td><?php echo __('Docks Types Name'); ?></td>
                <td><?php echo $this->Form->input('docks_types_name', array('options' => $dock_type_list,'label'=>false,'value'=>$data['dock_type_id'],
                   'id'=>'docksname'));?> </td> 
            </tr>

            <tr>
                <td><?php echo __('Active'); ?></td>        
                <td><?php echo $this->Form->input('is_active', array('options' =>$active,'label'=>false,'value'=>$data['is_active'],'id'=>'active'));?> </td> 
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <table class="no-border">
                        <tr>
                            <td>
                            <?php echo $this->Form->submit('Save',array('type'=>'Submit',"div"=>false,'label'=>false,'onClick' => "return check();")); ?>
                            <?php echo $this->Form->button('Cancel',array("div"=>false,'label'=>false, 'type'=>'button','onclick'=>"window.location='/Docks/index';")); ?>
                            </td>
                        </tr>    
                 </table>
            </tr>
    </table>

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
        }if(document.getElementById('docksname').value==''){
            alert('Not data "Name"');
            document.getElementById('docksname').focus(); 
            return false;
        }if(document.getElementById('active').value==''){
            alert('Not data "Active"');
            document.getElementById('active').focus(); 
            return false;
        }
        
            return true;
        
}
</script>