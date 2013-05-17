<h1><?php echo __('PO DETAIL LIST'); ?></h1><br />

  <table  class="table-short-information">
        <tr>
             <th><?php echo __('#'); ?></th>
             <th><?php echo __('SKU'); ?></th>
             <th><?php echo __('Style'); ?></th>
             <th><?php echo __('Product name'); ?></th>
             <th><?php echo __('Order Qty'); ?></th>
             <th><?php echo __('Actual Qty'); ?></th>
             <th><?php echo __('Received'); ?></th>
       </tr>
    <?php 
               $i=0;
               foreach ($datas as $data) { $i++;?>     
       <tr>
               <td><?php echo $i; ?></td>
               <td><?php echo $data['sku']; ?></td>
               <td><?php echo $data['style']; ?></td>
               <td><?php echo $data['long_name']; ?></td>
               <td><?php echo $data['order_qty']; ?></td>
               <td><?php echo $data['actual_qty']; ?></td>
               <td><?php echo $this->DisplayFormat->bool($data['is_received']);  ?></td>
        </tr>
     <?php } ?>
 </table>
<a href="/PurchaseOrders/index/" >Back</a>
 