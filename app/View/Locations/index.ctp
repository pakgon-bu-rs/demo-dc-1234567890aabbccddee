<div class="ui-pakgon-form">
	<h1><?php echo __('Location Management'); ?></h1>
    
       <fieldset class="search">
        <?= $this->Form->create('Search',array('url'=>array('controller'=>'Locations','action'=>'index'))); ?>
        <table class="no-border">
            <tr>
                <td><?= $this->Form->input('keyword',array('label'=>FALSE ,"div"=>false , 'class' => 'first-input')); ?></td>
                <td><?= $this->Form->input('is_active',array('label'=>FALSE ,"div"=>false,'options'=>array('Y'=>'Active','N'=>'Inactive','A'=> 'All'))); ?></td>
                <td><?= $this->Form->submit('Search',array("div"=>false)); ?></td>
                <td><?= $this->Form->submit('Add', array('type' => 'button' , 'onclick'=>"window.location='/Locations/add';")); ?></td>
            </tr>
        </table>
    </fieldset>
    
	<table cellpadding="0" cellspacing="0" class="table-short-information">
	<tr>
			<th><?php echo $this->DisplayFormat->pagination_sort('id',__('Location ID')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('zones_id',__('Zone ID')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('locations_types_id',__('LT ID')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('column_num',__('Column Number')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('row_num',__('Row Number')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('level_num',__('Level Number')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('note',__('Description')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('status',__('Status')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('create_by',__('Create By')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('update_by',__('Update By')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('created',__('Created')); ?></th>
			<th><?php echo $this->DisplayFormat->pagination_sort('modified',__('Modified')); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    
    <?php
    if(!empty($locations['data'])){
        foreach ($locations['data'] as $data) {
    ?>
    	<tr>
		<td><?php echo h($data['id']); ?></td>
		<td><?php echo h($data['zones_id']); ?></td>
		<td><?php echo h($data['locations_types_id']); ?></td>
		<td><?php echo h($data['x_axis']); ?></td>
		<td><?php echo h($data['y_axis']); ?></td>
		<td><?php echo h($data['z_axis']); ?></td>
		<td><?php echo h($data['note']); ?></td>
		<td><?php echo h($data['status']); ?></td>
		<td><?php echo h($data['create_by']); ?></td>
		<td><?php echo h($data['update_by']); ?></td>
		<td><?php echo h($data['created']); ?></td>
		<td><?php echo h($data['modified']); ?></td>
        <td class="actions">
            <?php echo $this->DisplayFormat->link_view("/Locations/view/{$location['id']}");?>
            <?php echo $this->DisplayFormat->link_edit("/Locations/edit/{$location['id']}");?>
            <?php echo $this->DisplayFormat->link_del("/Locations/delete/{$location['id']}","Are you sure for delete Location items has ID {$location['id']} ?");?>  
        </td>
	</tr>
     <?php 
        }
    }else{
        echo "<td colspan ='6'>".__('No data')."</td>";
    }
    ?>
	</table>
    
     <?php echo $this->Form->end(); ?>
     <?php $this->DisplayFormat->pagination_page($locations); ?>  
</div>

<script type="text/javascript">
var items_event;
$(function(){
	$("#btnLocationsSearchSubmit").button();
	$("#btnLocationsAddSubmit").button();
	$("#btnLocationsAddSubmit").click(function(){
		location = '/Locations/add/';	
		return false;
	});		
});	
</script>
