<div class="ui-pakgon-form">
<h1><?php echo __('Product Info'); ?></h1><br />
<fieldset class="search">
    <?php  echo $this->Form->create('Pm',array('url'=>array('controller'=>'ProductMasters','action'=>'index'))); ?>
    <table class="no-border">
       <tr>
            <td><?=  $this->Form->input('key',array('label'=>'SKU,BARCODE,STYLE: ' ,"div"=>false)); ?></td>
            <td> <?=  $this->Form->submit('Search',array("div"=>false,'onClick' => "return check();")); ?></td>
        </tr>
     </table>
</fieldset>
 
</br>
  <script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">General</a></li>
    <li><a href="#tabs-2">1</a></li>
  <!--  <li><a href="#tabs-3">2</a></li> -->
    
  </ul>
    
  <div id="tabs-1">
   <?php if(!empty($data)){?>
      
   <table  class="table-short-information">
             <tr>
                <td><?php echo __('Style'); ?></td>
                <td><?php echo $data['style']; ?> </td>
            </tr> 
            <tr>  
                <td><?php echo __('SKU'); ?></td>
                <td> <?php echo $data['sku']; ?>  </td>
            </tr>
            <tr>  
                <td><?php echo __('Barcode'); ?></td>
                <td> <?php echo $data['barcode']; ?>     </td>
                   
            </tr>

             <tr>
                 <td><?php echo __('Name'); ?></td>
                  <td><?php echo $data['long_name']; ?>   </td>
            </tr>
            
             <tr>
                 <td><?php echo __('Name(EN)'); ?></td>
                  <td><?php echo $data['eng_name']; ?>   </td>
            </tr>
            
            <tr> 
                 <td><?php echo __('Consignment'); ?></td>
                  <td><?php echo $this->DisplayFormat->bool($data['is_consignment']); ?>   </td>
            </tr>
            
             <tr>
                 <td><?php echo __('Vat'); ?></td>
                  <td><?php echo $data['vat_rate']; ?>   </td>
            </tr>
            
             <tr>
                 <td><?php echo __('Cost'); ?></td>
                  <td><?php echo $data['current_cost']; ?>   </td>
            </tr>
            
            <tr>
                 <td><?php echo __('Last received cost'); ?></td>
                  <td><?php echo $data['last_received_cost']; ?>   </td>
            </tr>
          
            <tr>
                 <td><?php echo __('Average cost'); ?></td>
                  <td><?php echo $data['average_cost']; ?>   </td>
            </tr>

             <tr>
                 <td><?php echo __('Vendor (id - name)'); ?> </td>
                  <td><?php echo $data['vendors_id']; ?> - <?php echo $data['vendors_name']; ?> </td>
            </tr>
            
            <tr>
                 <td><?php echo __('Size'); ?></td>
                  <td><?php echo $data['size_code']; ?>   </td>
            </tr>
            
            <tr>
                 <td><?php echo __('Color'); ?></td>
                  <td><?php echo $data['color_name']; ?>   </td>
            </tr>
            
            <tr>
                 <td><?php echo __('Size color'); ?></td>
                  <td></td>
           </tr>
            <tr>
                 <td><?php echo __('Normal stock '); ?></td>
                  <td> </td>
            </tr>
            <tr>
                 <td><?php echo __('Claim stock'); ?> </td>
                  <td> </td>
            </tr>
         </table>
      
      <br/>
   
      
   <?php 
       }else{
              echo "<td colspan ='17'>".__('No data')."</td>"; }?>
  </div>
    
  <div id="tabs-2">
        <?php if(!empty($datas)){?>
        <table border="1">
         <tr>  
             <td><?php echo __('Last Received PO'); ?></td>
             <td> <?php echo $datas['last_date_received_po']; ?></td>
         </tr>

         <tr>  
             <td><?php echo __('Name'); ?></td>
             <td> <?php echo $datas['long_name']; ?>     </td>
         </tr>  

         <tr>
             <td><?php echo __('Po Num'); ?></td>
             <td>  <?php echo $datas['po_num']; ?> </td>
         </tr>  

          <tr> 
              <td><?php echo __('Po Date'); ?></td>
              <td><?php echo $datas['po_date']; ?>   </td>
         </tr>

          <tr>
              <td><?php echo __('Order Qty'); ?></td>
              <td><?php echo $datas['order_qty']; ?>   </td>
         </tr>

          <tr>
              <td><?php echo __('Po Type Name'); ?></td>
              <td><?php echo $datas['po_type_name']; ?>   </td>
         </tr>

      </table>
     <?php 
       }else{
              echo "<td colspan ='17'>".__('No data')."</td>"; }?>
  </div>
 <!--   
  <div id="tabs-3">
      <?php if(!empty($result)){ ?>
        <table border='1'>
            <tr>
                <th>#</th>
                <th>Location</th>
                <th>SKU</th>
                <th>Item Qty.</th>
                <th>Inner Pack Qty.</th>
                <th>Outter Pack Qty.</th>
                <th>Last Receive Date</th> 
            </tr>
            <?php 
                    $i=0;
                    foreach ($result as $d) { $i++;?>
                        <tr>
                            <td><?php echo $i; ?></td>                
                            <td><?php echo $d['']; ?></td>
                            <td><?php echo $d['']; ?></td>
                            <td><?php echo $d['']; ?></td>
                            <td><?php echo $d['']; ?></td>  
                            <td><?php echo $d['']; ?></td>  
                            <td><?php echo $d['']; ?></td>
                        </tr>   
                <?php } ?>

        </table>

        <?php }
                else { ?>
                     <br /><br />
                     <table>
                         <tr>
                            <th>#</th>
                            <th>Location</th>
                            <th>SKU</th>
                            <th>Item Qty.</th>
                            <th>Inner Pack Qty.</th>
                            <th>Outter Pack Qty.</th>
                            <th>Last Receive Date</th> 
                         </tr>
                          <tr>
                              <td colspan ='10'><B>Not found data!!!</B></td>
                          </tr>
                     </table>
              <?php  }
        ?>
  </div>
</div>
<br/>
-->
</div>
<script>
function check(){
    
        if(document.getElementById('PmKey').value==''){
            alert('No data');document.getElementById('PmKey').focus(); 
            return false;
        }
       
        
            return true;
        
}
</script>