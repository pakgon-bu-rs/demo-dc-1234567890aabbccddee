<h1><?php echo __('Product Info'); ?></h1><br />
 <a href ="/ProductMasters/index/<?php echo $id;?>">(General)</a>
 <a href ="/ProductMasters/view/<?php echo $id;?>">(1)</a>

<?php if(!empty($data)){ ?>
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
            foreach ($data as $d) { $i++;?>
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
                      <td colspan ='10'><B>Not fail Data</B></td>
                  </tr>
             </table>
      <?php  }
?>
