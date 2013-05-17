<div class="ui-pakgon-form">
<h1><?php echo __('Location Type Management  > View'); ?></h1></br>
<table border="1">
         
        
        <tr>     
            <td><?php echo __('Name'); ?></td>
             <td><?php echo $result['name']; ?></td>
        </tr> 
        <tr>     
            <td><?php echo __('Name (EN)'); ?></td>
             <td><?php echo $result['name_eng']; ?></td>
        </tr>
           <tr>     
            <td><?php echo __('Column'); ?></td>
             <td><?php echo $result['max_column']; ?></td>
        </tr> 
        
        <tr>     
            <td><?php echo __('Row'); ?></td>
             <td><?php echo $result['max_row']; ?></td>
        </tr> 
        <tr>     
            <td><?php echo __('Level'); ?></td>
             <td><?php echo $result['max_level']; ?></td>
        </tr>
         <tr>     
            <td><?php echo __('Description'); ?></td>
             <td><?php echo $result['description']; ?></td>
        </tr>
        <tr>     
            <td><?php echo __('Capacity Limit'); ?></td>
             <td><?php echo $result['capacity_limit']; ?></td>
        </tr>
        <tr>  
            <td><?php echo __('Active'); ?></td>
            <td><?php echo $this->DisplayFormat->bool($result['is_active']); ?></td>  
        </tr> 

         <tr>                 
            <td><?php echo __('Created'); ?></td>
            <td><?php echo $this->DisplayFormat->datetime_iso($result['created']); ?></td> 
         </tr> 
         <tr>  
            <td><?php echo __('Modified'); ?></td>
            <td><?php echo $this->DisplayFormat->datetime_iso($result['modified']); ?></td>  
        </tr> 

         <tr>                 
            <td><?php echo __('Update By'); ?></td>
            <td><?php echo $result['update_name']; ?></td> 
         </tr> 
        

     </table></br>
 <?= $this->Form->button('Back',array("div"=>false, 'type'=>'button','onclick'=>"window.location='/LocationsTypes/index';")); ?>
</div>