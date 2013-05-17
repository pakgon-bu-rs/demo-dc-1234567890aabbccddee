<h1>Confirm Appointments > Confirm</h1><br />

  <script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1"><?php echo __('Confirm Appointments'); ?></a></li>
    <li><a href="#tabs-2"><?php echo __('Adjust'); ?></a></li>  
  </ul>
  <div id="tabs-1">
      <?php  echo $this->Form->create('Co',array('url'=>array('controller'=>'ConfirmAppointments','action'=>'index')));?>
      <table  class="table-short-information">
             <tr>
                <td><?php echo __('PO Number'); ?></td>
                <td><?php echo $data['']; ?> </td>
            </tr> 
            <tr>  
                <td><?php echo __('DC Name'); ?></td>
                <td> <?php echo $data['']; ?>  </td>
            </tr>
            <tr>  
                <td><?php echo __('Vendor Information'); ?></td>
                <td> <?php echo $data['']; ?>     </td>
                   
            </tr>

             <tr>
                 <td><?php echo __('PO Duration Date'); ?></td>
                  <td><?php echo $data['']; ?>   </td>
            </tr>
            
             <tr>
                 <td><?php echo __('Deliver Date'); ?></td>
                  <td><?php echo $data['']; ?>   </td>
            </tr>
            
            <tr> 
                 <td><?php echo __('Deliver Time'); ?></td>
                  <td><?php echo $data['']; ?></td>
            </tr>
            
             <tr>
                 <td><?php echo __('Vahicle'); ?></td>
                  <td><?php echo $data['']; ?>   </td>
            </tr>
            
             <tr>
                 <td><?php echo __('Dock Number'); ?></td>
                  <td><?php echo $data['']; ?>   </td>
            </tr>
            
            <tr>
                 <td><?php echo __('Man Power'); ?></td>
                  <td><?php echo $data['']; ?> Persons  </td>
            </tr>
          
            <tr>
                 <td><?php echo __('Confirm Status'); ?></td>
                  <td> <?php $options = array('Y' => 'Yes','N' => 'No');
                             $attributes = array('legend' => false);
                     echo $this->Form->radio('status',$options,$attributes,array('label'=>'false'));  ?> 
                  </td>
            </tr>
              
            <tr>
                 <td></td>
                  <td> <?php echo $this->Form->submit(' Confirm',array("div"=>false)); ?> 
                  </td>
            </tr>
   <?php echo $this->Form->end();?>           
 </div>
    
    <div id="tabs-2">
        
    </div>