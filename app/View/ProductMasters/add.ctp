<div class="productMasters form">
<?php echo $this->Form->create('ProductMaster'); ?>
	<fieldset>
		<legend><?php echo __('Add Product Master'); ?></legend>
	<?php
		echo $this->Form->input('site_num');
		echo $this->Form->input('short_name');
		echo $this->Form->input('long_name');
		echo $this->Form->input('eng_name');
		echo $this->Form->input('cate1');
		echo $this->Form->input('cate2');
		echo $this->Form->input('cate3');
		echo $this->Form->input('cate4');
		echo $this->Form->input('cate5');
		echo $this->Form->input('is_vatable');
		echo $this->Form->input('vat_rate');
		echo $this->Form->input('is_consignment');
		echo $this->Form->input('consigment_percent');
		echo $this->Form->input('local_first_cost');
		echo $this->Form->input('last_received_cost');
		echo $this->Form->input('average_cost');
		echo $this->Form->input('current_cost');
		echo $this->Form->input('vendors_id');
		echo $this->Form->input('is_can_rtv');
		echo $this->Form->input('is_sales_by_weight');
		echo $this->Form->input('package_names_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Product Masters'), array('action' => 'index')); ?></li>
	</ul>
</div>
