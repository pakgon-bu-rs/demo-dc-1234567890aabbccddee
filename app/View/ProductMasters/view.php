<h1><?php echo __('Product Info'); ?></h1><br />
 <a href ="/ProductMasters/index/<?php echo $id;?>">(General)</a>
 <a href ="/ProductMasters/viewdata/<?php echo $id;?>">(2)</a>
 <table border="1">
  
        <tr>  
            <th>Last_date_received_po</th>
            <td> <?php echo $data['last_date_received_po']; ?></td>
        </tr>
        
        <tr>  
            <th>Long_name</th>
            <td> <?php echo $data['long_name']; ?>     </td>
        </tr>  
        
        <tr>
            <th>Po_num</th>
             <td>  <?php echo $data['po_num']; ?> </td>
        </tr>  
        
         <tr> 
             <th>Po_date</th>
              <td><?php echo $data['po_date']; ?>   </td>
        </tr>
        
         <tr>
             <th>order_qty</th>
              <td><?php echo $data['order_qty']; ?>   </td>
        </tr>
        
         <tr>
             <th>Po_type_name</th>
              <td><?php echo $data['po_type_name']; ?>   </td>
        </tr>
        
     </table>

