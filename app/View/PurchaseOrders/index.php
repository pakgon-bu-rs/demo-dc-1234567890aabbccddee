<div class="ui-pakgon-form">
<h1><?php echo __('P/O Info'); ?></h1><br />

<fieldset class="search">
    <?php  echo $this->Form->create('Po',array('url'=>array('controller'=>'PurchaseOrders','action'=>'index'))); ?>
    <table class="no-border">
       <tr>
            <td><?=  $this->Form->input('key',array('label'=>'Po NO:' , 'id'=>'PoKey',"div"=>false)); ?></td>
            <td> <?=  $this->Form->submit('Search',array("div"=>false,'onClick' => "return check();")); ?></td>
        </tr>
     </table>
</fieldset>

<table  class="table-short-information">
     <tr>
            <th class="nindex"><?= __('#'); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('id' , __('Name')); ?></th>        
            <th><?= $this->DisplayFormat->pagination_sort('po_type_name' , __('Type')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('vendor_id'-'vendor_name', __('Vendor ID-Name')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('start_date' , __('Start Date')); ?></th>        
            <th><?= $this->DisplayFormat->pagination_sort('expiry_date' , __('Expity Date')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('deliver_date' , __('Deilver Date')); ?></th>        
            <th><?= $this->DisplayFormat->pagination_sort('status' , __('Status')); ?></th>
            <th class="actions">Action</th>         
     </tr>

<?php 
if(!empty($result['data'])){
            foreach ($result['data'] as $data) { ?>
                <tr>
                    <td class="nindex"><?= $this->DisplayFormat->pagination_record_num($result['page'] , $result['limit']); ?></td>
                    <td>PO-<?php echo $data['id']?></td>
                    <td><?php echo $data['po_type_name']; ?></td>
                    <td><?php echo $data['vendor_id']; ?>-<?php echo $data['vendor_name']; ?></td>
                    <td class="datetime"><?php echo $this->DisplayFormat->datetime_iso( $data['start_date']); ?></td>
                    <td class="datetime"><?php echo $this->DisplayFormat->datetime_iso($data['expiry_date']); ?></td>
                    <td><?php echo $data['deliver_date']; ?></td>  
                    <td class="bool"><?php echo $this->DisplayFormat->bool($data['status']); ?></td> 
                    <td class="actions"> 
                            <?= $this->DisplayFormat->link_view("/PurchaseOrders/view/".$data['id']); ?>
                    </td>
                </tr>   
   <?php 
         } 

        }else {
                 echo "<td colspan ='10'>".__('No data')."</td>";
              }?>
</table>

<?php $this->DisplayFormat->pagination_page($result); ?>
</div>
               
<script>
function check(){
    
        if(document.getElementById('PoKey').value==''){
            alert('Not data');document.getElementById('PoKey').focus(); 
            return false;
        }
       
        
            return true;
        
}
</script>