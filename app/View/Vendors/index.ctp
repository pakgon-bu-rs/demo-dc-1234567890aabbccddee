<div class="vendors index">
<div class="top-caption-index-list">
	<p><?php echo __('Vendors Info.'); ?></p>
</div>
    <?php echo $this->Form->create('Vendor',array('class'=>'form-top-fillter')); ?>
    <table cellpadding="0" cellspacing="0" class="table-top-fillter">
         <tr>
			<?php echo $this->Form->input('keyword',array('label'=>false,'type'=>'text','size'=>'35','div'=>false));?>&nbsp;
            <?php echo $this->Form->submit(__('Search.'),array('id'=>'btnVendorFindSubmit','name'=>'btnVendorFindSubmit','div'=>false)); ?>
          </tr>
    </table>
	
    
    <br/><hr/><br/>
    
	<table cellpadding="0" cellspacing="0" class="table-short-information">
	<tr>
        <th><?php echo __('#'); ?></th>
        <th><?php echo $this->DisplayFormat->pagination_sort('id',__('Vendor ID: ')); ?></th>
        <th><?php echo $this->DisplayFormat->pagination_sort('name',__('Vendor Name')); ?></th>
        <th><?php echo __('Address'); ?></th>
        <th><?php echo $this->DisplayFormat->pagination_sort('phone1',__('Phone')); ?></th>
        <th><?php echo $this->DisplayFormat->pagination_sort('fax',__('Fax')); ?></th>
        <th><?php echo $this->DisplayFormat->pagination_sort('contact1',__('Contact')); ?></th>
	  	<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    <?php if(count($vendors['data']) > 0):?>
    <?php $strAddress = '';?>
		<?php foreach ($vendors['data'] as $k=>$vendor): ?>
        <?php $strAddress = $vendor['address1'] . '  ' . $vendor['city'] . '  ' . $vendor['state'] . '  ' . $vendor['country'] . '  ' . $vendor['postcode'] ?>
            <tr>
            	<td><?php echo h($k+1); ?></td>
                <td><?php echo h($vendor['id']); ?></td>
                <td><?php echo h($vendor['name']); ?></td>
                <td><?php echo h($strAddress); ?></td>
                <td><?php echo h($vendor['phone1']); ?></td>
                <td><?php echo h($vendor['fax']); ?></td>
                <td><?php echo h($vendor['contact1']); ?></td>
        
                <td class="actions">
                	<?php echo $this->DisplayFormat->link_view("/Vendors/view/{$vendor['id']}");?>
                </td>
            </tr>
    	<?php endforeach; ?>
    <?php else :?>
    	<tr>
        	<td colspan="8"><center><?php echo __('No Data');?></center></td>
        </tr>
	<?php endif;?>
	</table>
    
    <?php $this->DisplayFormat->pagination_page($vendors); ?>
	<?php echo $this->Form->end(); ?>    
</div>

<script type="text/javascript">
$(function(){
	$("#btnVendorFindSubmit").button();
});
</script>