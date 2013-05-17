<div class="ui-pakgon-cp-form">

	<h1><?php echo __('Location Type Management > Add'); ?></h1></br>
	<?php echo $this->Form->create('LocationsType'); ?>
        <table>
          <tr>
            <td><?php echo __('Name Local');?></td>
            <td><?php echo $this->Form->input('name',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Name English');?></td>
            <td><?php echo $this->Form->input('name_eng',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required'));?></td>
          </tr>
          <tr>
            <td><?php echo __('Column');?></td>
            <td><?php echo $this->Form->input('max_column',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required digits','min'=>1));?></td>
          </tr>
          <tr>
            <td><?php echo __('Level');?></td>
            <td><?php echo $this->Form->input('max_row',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required digits','min'=>1));?></td>
          </tr>
          <tr>
            <td><?php echo __('Row');?></td>
            <td ><?php echo $this->Form->input('max_level',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required digits','min'=>1));?></td>
          </tr>
          <tr>
            <td><?php echo __('Capacity Limit');?></td>
            <td ><?php echo $this->Form->input('capacity_limit',array('type'=>'text','label'=>false,'size'=>35,'class'=>'required number'));?></td>
          </tr>
          <tr>
            <td ><?php echo __('Description');?></td>
            <td ><?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'rows'=>2,'cols'=>26));?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td >
                <?php echo $this->Form->submit(__('Add'),array('id'=>'btnLocationsTypesAddSubmit','name'=>'btnLocationsTypesAddSubmit','div'=>false)); ?>
                <?php echo $this->Form->submit(__('Cancel'),array('id'=>'btnLocationsTypesAddCancelSubmit','name'=>'btnLocationsTypesAddCancelSubmit','div'=>false,'type'=>'button')); ?>
            </td>
          </tr>
        </table></div>
    <?php echo $this->Form->end(); ?>
 </br>
<?= $this->Form->button('Back',array("div"=>false, 'type'=>'button','onclick'=>"window.location='/LocationsType/index';")); ?>


<script type="text/javascript">
$(function(){
	$("#btnLocationsTypesAddSubmit").button();
	$("#btnLocationsTypesAddCancelSubmit").button();
	$("#btnLocationsTypesAddCancelSubmit").click(function(){
		location = '/LocationsTypes/index/';	
		return false;
	});
});
</script>