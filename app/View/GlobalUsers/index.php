<div class="ui-pakgon-form">
    <h1><?php echo __('Global Users Management'); ?></h1>
<fieldset class="search">
    <?php echo $this->Form->create('GlobalUser', array('url'=>'/GlobalUsers'));?>
    <table class="no-border">
        <tr>
            <td>Search : </td>
            <td><?=$this->Form->input('txtSearch',array('label'=>false, 'class' => 'first-input'));?></td>
            <td><?=$this->Form->submit('Search'); ?></td>
            <td><?=$this->Form->button('Add', array('type'=>'button', "onClick"=>"window.location='/GlobalUsers/add'")); ?></td>
            <td></td>
        </tr>
    </table>
    <?php echo $this->Form->end(); ?>
    <br>
</fieldset>

 <table  class="table-short-information">
<tr>
         <th class="record-num">#</th>
	<th><?php echo $this->Paginator->sort('Emp ID','ref3');?></th>
	<th><?php echo $this->Paginator->sort('display');?></th>
	<th><?php echo $this->Paginator->sort('email');?></th>
	<th><?php echo $this->Paginator->sort('Name (CN)', 'pre_name');?></th>
	<th><?php echo $this->Paginator->sort('Name (EN)','pre_name_eng');?></th>

	<th class="datetime"><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><center><?php __('Actions');?></center></th>
</tr>
<?php
$i = -1;
foreach ($globalUsers as $globalUser):
	$class = null;
           $offset = (@$this->params['paging']['GlobalUser']['options']['limit'] * (@$this->Paginator->counter(array('format'=>'%page%')) - 1)) + 1;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $offset + $i ; ?>
		</td>
		<td>
			<?php if($globalUser["GlobalUser"]["ref3"]=='') echo "-"; else echo $globalUser['GlobalUser']['ref3']; ?>
		</td>
		<td>
			<?php echo $globalUser['GlobalUser']['display']; ?>
		</td>
		<td>
			<?php echo $globalUser['GlobalUser']['email']; ?>
		</td>
		<td>
			<?php echo $globalUser['GlobalUser']['pre_name']; ?>
			<?php echo $globalUser['GlobalUser']['first_name']; ?>
			<?php echo $globalUser['GlobalUser']['last_name']; ?>
		</td>
		<td>
			<?php echo $globalUser['GlobalUser']['pre_name_eng']; ?>
			<?php echo $globalUser['GlobalUser']['first_name_eng']; ?>
			<?php echo $globalUser['GlobalUser']['last_name_eng']; ?>
		</td>

		<td>
			<?php echo $globalUser['GlobalUser']['modified']; ?>
		</td>
		<td class="actions">
      <center>
          		<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $globalUser['GlobalUser']['id'])); ?>
			| <?php echo $this->Html->link(__('Deactivate', true), array('action' => 'delete', $globalUser['GlobalUser']['id']), null, sprintf(__('Are you sure you want to deactivate %s?', true), $globalUser['GlobalUser']['display'])); ?>
      </center>
	
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
	<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
