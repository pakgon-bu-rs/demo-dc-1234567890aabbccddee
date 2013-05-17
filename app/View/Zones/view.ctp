<div class="ui-pakgon-form">
<h1><?php echo __('Zone Management  > View'); ?></h1>
<table border="1">

        <tr>     
            <td><?php echo __('ID'); ?></td>
             <td><?php echo $result['id']; ?></td>
        </tr> 
        <tr>     
            <td><?php echo __('Name'); ?></td>
             <td><?php echo $result['name']; ?></td>
        </tr> 
        <tr>     
            <td><?php echo __('Name (EN)'); ?></td>
             <td><?php echo $result['name_eng']; ?></td>
        </tr>
        <tr>  
            <td valign="top"><?php echo __('Note'); ?></td>
            <td><?php echo $result['note']; ?></td>  
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
<?= $this->Form->button('Back',array("div"=>false, 'type'=>'button','onclick'=>"window.location='/Zones/index';")); ?>
</div>