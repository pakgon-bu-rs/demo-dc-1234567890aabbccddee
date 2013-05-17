<div class="locations form">
<?php echo $this->Form->create('Location'); ?>
	<fieldset>
		<legend><?php echo __('Edit Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('zones_id');
		echo $this->Form->input('locations_types_id');
		echo $this->Form->input('x_axis');
		echo $this->Form->input('y_axis');
		echo $this->Form->input('z_axis');
		echo $this->Form->input('note');
		echo $this->Form->input('status');
		echo $this->Form->input('create_by');
		echo $this->Form->input('update_by');
		echo $this->Form->input('_version_');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Location.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Location.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?></li>
	</ul>
</div>
