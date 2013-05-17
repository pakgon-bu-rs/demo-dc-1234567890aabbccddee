<table cellpadding="0" cellspacing="0" class="table-view-dialog" width="100%">
  <tr>
    <td style="width:20%;padding-right:10px;"><?php echo __('Name: ');?></td>
    <td><?php echo h($vendor['data'][0]['name']); ?></td>
  </tr>
  <tr>
    <td style="width:20%;padding-right:10px;"><?php echo __('Phone: ');?></td>
    <td><?php echo h($vendor['data'][0]['phone1']); ?></td>
  </tr>
  <tr>
    <td style="width:20%;padding-right:10px;"><?php echo __('Address: ')?></td>
    <td>
    	<?php $vendorAddress = $vendor['data'][0]['address1'] . ' ' . $vendor['data'][0]['city'] . ' ' . $vendor['data'][0]['state'] . ' ' . $vendor['data'][0]['country'] . ' ' . $vendor['data'][0]['postcode'] . __(' Phone ') . $vendor['data'][0]['phone1'] . __(' Fax ') . $vendor['data'][0]['fax'];?>
		<?php echo h($vendorAddress); ?>
    </td>
  </tr>
</table>

<div class="top-caption-index-list-dialog">
	<p><?php echo __('Product List.'); ?></p>
</div>
<div class="table-dialog-list">
    <table cellpadding="0" cellspacing="0" class="table-view-dialog-list" width="100%">
      <tr style="background-color:#0085CC;">
        <th style="text-align:center;"><?php echo __('Barcode');?></th>
        <th style="text-align:center;"><?php echo __('SKU');?></th>
        <th style="text-align:center;"><?php echo __('Style');?></th>
        <th style="text-align:center;"><?php echo __('short Name');?></th>
        <th style="text-align:center;"><?php echo __('Long Name');?></th>
        <th style="text-align:center;"><?php echo __('Eng Name');?></th>
        <th style="text-align:center;"><?php echo __('Local Name');?></th>
        <th style="text-align:center;"><?php echo __('Name Eng');?></th>
      </tr>
      <?php if(!empty($vendor['data'][0]['barcode'])): ?>
      <?php foreach($vendor['data'] as $k=>$v) : ?>
      <tr>
            <td style="text-align:center;"><?php echo h($v['barcode']); ?>
            <td style="text-align:center;"><?php echo h($v['sku']); ?>
            <td style="text-align:center;"><?php echo h($v['style']); ?>
            <td style="text-align:center;"><?php echo h($v['short_name']); ?>
            <td style="text-align:center;"><?php echo h($v['long_name']); ?>
            <td style="text-align:center;"><?php echo h($v['eng_name']); ?>
            <td style="text-align:center;"><?php echo h($v['name_local']); ?>
            <td style="text-align:center;"><?php echo h($v['name_eng']); ?> 
      </tr>
      <?php endforeach;?>
      <?php else:?>
      <tr>
      		<td colspan="8"><center><?php echo __('No Data');?></center></td>
      </tr>
      <?php endif;?>
    </table>
</div>

