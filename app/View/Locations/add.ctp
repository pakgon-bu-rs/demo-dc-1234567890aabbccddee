<div class="ui-pakgon-cp-form">
<div class="top-caption">
	<p><?php echo __('Location Management > Add.'); ?></p>
</div>
	<?php echo $this->Form->create('Location'); ?>
        <table cellpadding="0" cellspacing="0" class="table-form-add">
          <tr>
            <td width="20%;"><?php echo __('Zone: ');?></td>
            <td colspan="2"><?php echo $this->Form->select('zone_id',$zoneOptions,array('label'=>false,'default'=>'','empty'=>'--- select location type ---','class'=>'required digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Location Type: ');?></td>
            <td colspan="2"><?php echo $this->Form->select('location_type_id',$locationTypeOptions,array('label'=>false,'default'=>'','empty'=>'--- select location type ---','class'=>'required digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Level From: ');?></td>
            <td colspan="2"><?php echo $this->Form->input('level_from',array('type'=>'text','label'=>false,'class'=>'required','maxlength'=>'1'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Level To: ');?></td>
            <td colspan="2"><?php echo $this->Form->input('level_to',array('type'=>'text','label'=>false,'class'=>'required','maxlength'=>'1'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Column From: ');?></td>
            <td colspan="2"><?php echo $this->Form->input('column_from',array('type'=>'text','label'=>false,'class'=>'required digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Column To: ');?></td>
            <td colspan="2"><?php echo $this->Form->input('column_to',array('type'=>'text','label'=>false,'class'=>'required digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Row From: ');?></td>
            <td colspan="2"><?php echo $this->Form->input('row_from',array('type'=>'text','label'=>false,'class'=>'required digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Row To: ');?></td>
            <td colspan="2"><?php echo $this->Form->input('row_to',array('type'=>'text','label'=>false,'class'=>'required digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Status: ');?></td>
            <td colspan="2"><?php echo $this->Form->select('status',array('A'=>'Available','I'=>'Inactive'),array('label'=>false,'empty'=>'--- select status ---','default'=>'','class'=>'required'));?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">
                <?php echo $this->Form->submit(__('Add.'),array('id'=>'btnLocationsAddSubmit','name'=>'btnLocationsAddSubmit','div'=>false,'type'=>'button')); ?>
                <?php echo $this->Form->submit(__('Cancel.'),array('id'=>'btnLocationsAddCancelSubmit','name'=>'btnLocationsAddCancelSubmit','div'=>false,'type'=>'button')); ?>
            </td>
          </tr>
        </table>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
$(function(){
	$("#btnLocationsAddSubmit").button();
	$("#btnLocationsAddCancelSubmit").button();
	$("#btnLocationsAddCancelSubmit").click(function(){
		location = '/Locations/index/';	
		return false;
	});
	
	//validation data in it valid format
	$("#btnLocationsAddSubmit").click(function(){
		var bComplete;
		var valid = $("form#LocationAddForm").validate({
			rules:{
				LocationZoneId:{required:true},
				LocationLocationTypeId:{required:true},
				LocationLevelFrom:{required:true},
				LocationLevelTo:{required:true},
				LocationColumnFrom:{required:true},
				LocationColumnTo:{required:true},
				LocationRowFrom:{required:true},
				LocationRowTo:{required:true},
				LocationStatus:{required:true},
			}	
		});
		
		bComplete = valid.form();
		if(bComplete == true){
			$("form#LocationAddForm").submit();
		}else{
			$("#MessageStatus").text('Please enter valid format');
		}
	});
});
</script>
