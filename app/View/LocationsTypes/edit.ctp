<div class="ui-pakgon-cp-form">
<div class="top-caption">
	<p><?php echo __('Location Types Management > Edit.'); ?></p>
</div>
	<?php echo $this->Form->create('LocationsType'); ?>
        <table cellpadding="0" cellspacing="0" class="table-form-edit">
         <tr>
            <td><?php echo __('ID');?></td>
            <td colspan="2"><?php echo $this->Form->input('id',array('type'=>'text','label'=>false,'readonly'=>true));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name');?></td>
            <td colspan="2"><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name (EN)');?></td>
            <td colspan="2"><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Column');?></td>
            <td colspan="2"><?php echo $this->Form->input('max_column',array('type'=>'text','label'=>false,'class'=>'required digits','min'=>1));?></td>
          </tr>
          <tr>
            <td><?php echo __('Level');?></td>
            <td colspan="2"><?php echo $this->Form->input('max_row',array('type'=>'text','label'=>false,'class'=>'required digits','min'=>1));?></td>
          </tr>
          <tr>
            <td><?php echo __('Row');?></td>
            <td colspan="2"><?php echo $this->Form->input('max_level',array('type'=>'text','label'=>false,'class'=>'required digits','min'=>1));?></td>
          </tr>
          <tr>
            <td><?php echo __('Capacity Limit');?></td>
            <td colspan="2"><?php echo $this->Form->input('capacity_limit',array('type'=>'text','label'=>false,'class'=>'required number','min'=>1));?></td>
          </tr>
          <tr>
            <td valign="top"><?php echo __('Description');?></td>
            <td colspan="2"><?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'rows'=>2,'cols'=>26));?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">
                <?php echo $this->Form->submit(__('Update.'),array('id'=>'btnLocationsTypesEditSubmit','name'=>'btnLocationsTypesEditSubmit','div'=>false)); ?>
                <?php echo $this->Form->submit(__('Cancel.'),array('id'=>'btnLocationsTypesEditCancelSubmit','name'=>'btnLocationsTypesEditCancelSubmit','div'=>false,'type'=>'button')); ?>
            </td>
          </tr>
        </table>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
$(function(){
	$("#btnLocationsTypesEditSubmit").button();
	$("#btnLocationsTypesEditCancelSubmit").button();
	$("#btnLocationsTypesEditCancelSubmit").click(function(){
		location = '/LocationsTypes/index/';	
		return false;
	});
});
</script>