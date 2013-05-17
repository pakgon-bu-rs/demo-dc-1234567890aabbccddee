<div class="productMasters view">
<h2><?php  echo __('Product Master'); ?></h2>
	<dl>
		<dt><?php echo __('Style'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['style']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Site Num'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['site_num']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Name'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['short_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Long Name'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['long_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eng Name'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['eng_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cate1'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['cate1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cate2'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['cate2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cate3'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['cate3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cate4'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['cate4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cate5'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['cate5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Vatable'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['is_vatable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vat Rate'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['vat_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Consignment'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['is_consignment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consigment Percent'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['consigment_percent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local First Cost'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['local_first_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Received Cost'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['last_received_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Average Cost'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['average_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Cost'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['current_cost']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendors Id'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['vendors_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Can Rtv'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['is_can_rtv']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Sales By Weight'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['is_sales_by_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Package Names Id'); ?></dt>
		<dd>
			<?php echo h($productMaster['ProductMaster']['package_names_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product Master'), array('action' => 'edit', $productMaster['ProductMaster']['style'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product Master'), array('action' => 'delete', $productMaster['ProductMaster']['style']), null, __('Are you sure you want to delete # %s?', $productMaster['ProductMaster']['style'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Masters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Master'), array('action' => 'add')); ?> </li>
	</ul>
</div>
