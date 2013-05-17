<h1><?php echo __('Product Info'); ?></h1><br />

<?php
    echo $this->Form->create('Pm',array('url'=>array('controller'=>'ProductMasters','action'=>'index')));
    echo $this->Form->input('key',array('label'=>'SKU,BARCODE,STYLE:' , 'id'=>'PmKey'));
    echo $this->Form->submit('Search',array("div"=>false,'onClick' => "return check();"));
    echo $this->Form->end();
?>
<?php 
    echo $this->Html->link('(1)',array('url'=>array('controller'=>'ProductMasters','action'=>'view')));
    echo" ";
    echo $this->Html->link('(2)',array('url'=>array('controller'=>'ProductMasters','action'=>'viewdata')));
?>
<?php if(!empty($data)){
if(array_key_exists('barcode', $data)){?>
 <table border="1">
        <tr>  
            <th>barcode</th>
            <td> <?php echo $data['barcode']; ?>     </td>
        </tr>
        <tr>  
            <th>sku</th>
            <td> <?php echo $data['sku']; ?>     </td>
        </tr>  
        <tr>
            <th>style</th>
             <td>  <?php echo $data['style']; ?> </td>
        </tr>   
         <tr> 
             <th>short_name</th>
              <td><?php echo $data['short_name']; ?>   </td>
        </tr>
         <tr>
             <th>long_name</th>
              <td><?php echo $data['long_name']; ?>   </td>
        </tr>
         <tr>
             <th>eng_name</th>
              <td><?php echo $data['eng_name']; ?>   </td>
        </tr>
        <tr> 
             <th>is_consignment</th>
              <td><?php echo $data['is_consignment']; ?>   </td>
        </tr>
         <tr>
             <th>vat_rate</th>
              <td><?php echo $data['vat_rate']; ?>   </td>
        </tr>
         <tr>
             <th>current_cost</th>
              <td><?php echo $data['current_cost']; ?>   </td>
        </tr>
        <tr>
             <th>last_received_cost</th>
              <td><?php echo $data['last_received_cost']; ?>   </td>
        </tr>
        <tr>
             <th>local_first_cost</th>
              <td><?php echo $data['local_first_cost']; ?>   </td>
        </tr>
        <tr>
             <th>average_cost</th>
              <td><?php echo $data['average_cost']; ?>   </td>
        </tr>
   
         <tr>
             <th>vendors_id</th>
              <td><?php echo $data['vendors_id']; ?>   </td>
        </tr>
        <tr>
             <th>vendors_name</th>
              <td><?php echo $data['vendors_name']; ?>   </td>
        </tr>
        <tr>
             <th>color_name_id</th>
              <td><?php echo $data['color_name_id']; ?>   </td>
        </tr>
        <tr>
             <th>size_code</th>
              <td><?php echo $data['size_code']; ?>   </td>
        </tr>

     </table>

<?php }else{ ?>
Not Data
<?php } } ?>
<script>
function check(){
    
        if(document.getElementById('PmKey').value==''){
            alert('Not data');document.getElementById('PmKey').focus(); 
            return false;
        }
       
        
            return true;
        
}
</script>