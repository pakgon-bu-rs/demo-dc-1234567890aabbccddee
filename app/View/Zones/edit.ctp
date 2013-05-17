<div class="ui-pakgon-form">
    <h1><?php echo __('Zone Management > Edit'); ?></h1>
	<?php echo $this->Form->create('Zone'); ?>
        <table cellpadding="0" cellspacing="0" class="table-form-edit">
          <tr>
            <td width="20%;"><?php echo __('Zone ID :'); ?> </td>
            <td colspan="2"><?php echo $this->Form->input('id',array('type'=>'text','label'=>false,'size'=>15,'readonly'=>true,'class'=>'required: digits'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name'); ?></td>
            <td colspan="2"><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name (EN)'); ?> </td>
            <td colspan="2"><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td valign="top"><?php echo __('Description'); ?> </td>
            <td colspan="2"><?php echo $this->Form->input('note',array('type'=>'textarea','label'=>false,'rows'=>2,'cols'=>26));?></td>
          </tr>
          <tr>
            <td><?php echo __('Active'); ?></td>
            <td colspan="2">
            <?php $status = array('N'=>'Not Active','Y'=>'Active');?>
            <?php echo $this->Form->select('is_active',$status,array('label'=>false,'default'=>'Y','disabled'=>true));?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2">
                <?php echo $this->Form->submit(__('Update.'),array('id'=>'btnZonesUpdateSubmit','name'=>'btnZonesUpdateSubmit','div'=>false)); ?>
                <?php echo $this->Form->submit(__('Cancel.'),array('id'=>'btnZonesUpdateCancelSubmit','name'=>'btnZonesUpdateCancelSubmit','div'=>false,'type'=>'button')); ?>
            </td>
          </tr>
        </table>
    <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">
$(function(){
	$("#btnZonesUpdateCancelSubmit").click(function(){
		location = '/zones/index/';	
		return false;
	});
});
</script>