<div class="ui-pakgon-form">
<h1><?php echo __('Dock Management > View'); ?></h1></br>
<table border="1">
        
        <tr>     
            <td><?php echo __('Name'); ?></td>
             <td><?php echo $data['name']; ?></td>
        </tr> 
        <tr>     
            <td><?php echo __('Name (EN)'); ?></td>
             <td><?php echo $data['name_eng']; ?></td>
        </tr>
        
        <tr>     
            <td><?php echo __('Dock Type Name'); ?></td>
             <td><?php echo $data['dock_type_name']; ?></td>
        </tr>
        
        
        <tr>  
            <td><?php echo __('Description'); ?></td>
             <td><?php echo $data['description']; ?></td>
        </tr> 
        <tr>  
            <td><?php echo __('Active'); ?></td>
            <td><?php echo $this->DisplayFormat->bool($data['is_active']); ?></td>  
        </tr> 

         <tr>                 
            <td><?php echo __('Created'); ?></td>
            <td><?php echo $this->DisplayFormat->datetime_iso($data['created']); ?></td> 
         </tr> 
         <tr>  
            <td><?php echo __('Modified'); ?></td>
            <td><?php echo $this->DisplayFormat->datetime_iso($data['modified']); ?></td>  
        </tr> 

         <tr>                 
            <td><?php echo __('Update By'); ?></td>
            <td><?php echo $data['update_name']; ?></td> 
         </tr> 
     </table> </br>
<?= $this->Form->button('Back',array("div"=>false, 'type'=>'button','onclick'=>"window.location='/Docks/index';")); ?>
</div>