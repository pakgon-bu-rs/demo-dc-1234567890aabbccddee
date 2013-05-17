<div class="locations view">
<h2><?php  echo __('Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zones Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['zones_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Locations Types Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['locations_types_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('X Axis'); ?></dt>
		<dd>
			<?php echo h($location['Location']['x_axis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Y Axis'); ?></dt>
		<dd>
			<?php echo h($location['Location']['y_axis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Z Axis'); ?></dt>
		<dd>
			<?php echo h($location['Location']['z_axis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($location['Location']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($location['Location']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create By'); ?></dt>
		<dd>
			<?php echo h($location['Location']['create_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Update By'); ?></dt>
		<dd>
			<?php echo h($location['Location']['update_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($location['Location']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($location['Location']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __(' Version '); ?></dt>
		<dd>
			<?php echo h($location['Location']['_version_']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
	</ul>
</div>
