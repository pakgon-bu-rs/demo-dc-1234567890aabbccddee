<style>
    .paginater a {
        color: #fff;  
    }
</style>
<h1>Menu Management</h1>
<p>
    <?php echo $this->Form->create('Menu',array('url'=>'/MenuManagement','div'=>false,'label'=>false));?>
 <table class="nostyle">
     <tr>
         <td width='10px'><b>Search</b></td>
         <td><?echo $this->Form->input('search',array('div'=>false,'label'=>false,'width'=>'20px'));?></td>
         <td><?echo $this->Form->submit('Search',array('div'=>false,'label'=>false));?>&nbsp;
             <?php echo $this->Form->button('Add Menu', array('type'=>'button', 'onclick' => "window.location='/MenuManagement/add'",'div'=>false,'label'=>false,'width'=>'5px')); ?></td>
     </tr>
 </table>
    <?php echo $this->Form->end();?>
</p>
<table cellpadding="0" cellspacing="0">
<tr>
        <th class="paginater"><?php echo $this->Paginator->sort('name');?></th>
	<th class="paginater"><?php echo $this->Paginator->sort('name_cn');?></th>
        <th class="paginater"><?php echo $this->Paginator->sort('name_th');?></th>
	<th class="paginater"><?php echo $this->Paginator->sort('domain');?></th>
	<th class="paginater"><?php echo $this->Paginator->sort('ports');?></th>
	<th class="paginater"><?php echo $this->Paginator->sort('methods');?></th>
	<th class="paginater"><?php echo $this->Paginator->sort('seq_no');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($menus as $menu):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $menu['Menu']['name']; ?>
		</td>
		<td>
			<?php echo $menu['Menu']['name_cn']; ?>
		</td>
		<td>
			<?php echo $menu['Menu']['name_th']; ?>
		</td>
		<td>
			<?php echo $menu['Menu']['domain']; ?>
		</td>
		<td>
			<?php echo $menu['Menu']['ports']; ?>
		</td>
		<td>
			<?php echo $menu['Menu']['methods']; ?>
		</td>
		<td>
			<?php echo $menu['Menu']['seq_no']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $menu['Menu']['id']), null, sprintf(__('Are you sure you want to delete "%s"?', true), $menu['Menu']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<!--<div class="actions">
	<ul>
		<li></li>
		<li><?php echo $this->Html->link(__('List Stakeholders', true), array('controller' => 'stakeholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stakeholder', true), array('controller' => 'stakeholders', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
