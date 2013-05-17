<h1><?php  echo __('Menu Management : View');?></h1>
<br /><br />
	<table><?php $i = 0; $class = ' class="altrow"';?>
        <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['name']; ?>
			&nbsp;
		</td>
        </tr>
        <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name Cn'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['name_cn']; ?>
			&nbsp;
		</td>
        </tr>
             <tr>   
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name Th'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['name_th']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Domain'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['domain']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Ports'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['ports']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Methods'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['methods']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Seq No'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['seq_no']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['created']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
		<td<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></td>
		<td<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menu['Menu']['modified']; ?>
			&nbsp;
		</td>
             </tr>
             <tr>
                 <td>
                    &nbsp; 
                 </td>
                 <td>
                     <?echo $this->Form->button('Back',array('onclick'=>"history.go(-1)"));?>
                 </td>
             </tr>
	</table>