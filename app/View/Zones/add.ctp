<div class="ui-pakgon-form">
    <h1><?php echo __('Zone Management > Add'); ?></h1>
	<?php echo $this->Form->create('Zone'); ?>
        
        <table cellpadding="0" cellspacing="0" class="table-form-add">
          <tr>
            <td><?php echo __('ID:');?></td>
            <td colspan="2"><?php echo $this->Form->input('id',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required digits','max'=>999));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name'); ?></td>
            <td colspan="2"><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name (EN)'); ?></td>
            <td colspan="2"><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td valign="top"><?php echo __('Note');?> </td>
            <td colspan="2"><?php echo $this->Form->input('note',array('type'=>'textarea','label'=>false,'rows'=>2,'cols'=>26));?></td>
          </tr>
          <tr>
            <td><?php echo __('Active');?> </td>
            <td colspan="2">
            <?php $status = array('N'=>'Not Active','Y'=>'Active');?>
            <?php echo $this->Form->select('is_active',$status,array('label'=>false,'default'=>'Y','disabled'=>true));?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">
                <?php echo $this->Form->submit(__('Add'),array('id'=>'btnZonesAddSubmit','name'=>'btnZonesAddSubmit','div'=>false,'type'=>'button')); ?>
                <?php echo $this->Form->submit(__('Cancel'),array('id'=>'btnZonesAddCancelSubmit','name'=>'btnZonesAddCancelSubmit','div'=>false,'type'=>'button')); ?>
            </td>
          </tr>
        </table>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
$(function(){
	$("#btnZonesAddCancelSubmit").click(function(){
		location = '/zones/index/';	
		return false;
	});
	
	$("#btnZonesAddSubmit").click(function(){
		if($("#ZoneId").val() != ""){
			$.post('/Zones/hasExitingZoneID/' + $("#ZoneId").val(),function(data, textStatus, jqXHR){
				if(data == 'N'){
					alert("<?php echo __('Zone has ID repeated please enter another.');?>");
					$("#ZoneId").focus();
					return false;	
				}else{
					$("form#ZoneAddForm").submit();	
				}
			});	
		}else{
			alert("<?php echo __("Please enter zone ID");?>");
			$("#ZoneId").focus();
			return false;
		}
		
	});
});
</script>