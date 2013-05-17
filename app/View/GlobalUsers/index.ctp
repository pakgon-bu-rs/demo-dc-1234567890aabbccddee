<div class="globalUsers index">6666666666666666666666
<h1><?php __('Global Users (H.Q.) ');?></h1>
<br>
    <style>
        table th a{
            color: white; 
            text-decoration: none;
        }
    }
    </style>
    <? echo $form->create('GlobalUser', array('action'=>'index'));?>
    <table class="nostyle">
        <tr>
            <td>Search : </td>
            <td><?=$form->input('txtSearch',array('label'=>false));?></td>
            <td><?=$form->submit('Search'); ?></td>
            <td><?=$form->button('Add',array("onClick"=>"window.location='/GlobalUsers/add';")); ?></td>
            <td></td>
        </tr>
    </table>
    <? echo $form->end(); ?>
    <br>
<table cellpadding="0" cellspacing="0" width="98%">
<tr>
              <th>#</th>
	<th><?php echo $paginator->sort('Emp ID','ref3');?></th>
	<th><?php echo $paginator->sort('display');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('Name (CN)', 'pre_name');?></th>
	<th><?php echo $paginator->sort('Name (EN)','pre_name_eng');?></th>

	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><center><?php __('Actions');?></center></th>
</tr>
<?php
$i = -1;
foreach ($globalUsers as $globalUser):
	$class = null;
           $offset = ($this->params['paging']['GlobalUser']['options']['limit'] * ($paginator->counter(array('format'=>'%page%')) - 1)) + 1;
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
          		<?php echo $html->link(__('Edit', true), array('action' => 'edit', $globalUser['GlobalUser']['id'])); ?>
			| <?php echo $html->link(__('Deactivate', true), array('action' => 'delete', $globalUser['GlobalUser']['id']), null, sprintf(__('Are you sure you want to deactivate %s?', true), $globalUser['GlobalUser']['display'])); ?>
      </center>
	
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
