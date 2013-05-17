<h1>Confirm Appointments</h1><br />
<?php
    echo $this->Form->create('Co',array('url'=>array('controller'=>'ConfirmAppointments','action'=>'index')));
    echo $this->Form->input('from_date',array('label'=>'From :' ,"div"=>false, 'id'=>'Cofrom_date'));
    echo " ";
    echo $this->Form->input('to_date',array('label'=>'To :' ,"div"=>false, 'id'=>'Coto_date'));
    echo "<br/><br/>";
    echo $this->Form->input('po',array('label'=>'P/O # :' ,"div"=>false, 'id'=>'Copo'));
         $options = array('pending' => 'Pending','done' => 'Done','all' => 'All');
  
    echo $this->Form->radio('status', $options,array('legend' =>'status' ,"div"=>false));
    echo '<br/>';
    echo $this->Form->submit(' Search ',array("div"=>false,'onClick' => "return check();"));
    echo $this->Form->end();
?>
</br>
<?php 
if(!empty($datas)){ ?>
      <table  class="table-short-information">
        <tr>     
            <th>#</th>
            <th>PO No.</th>
            <th>PO Date</th>
            <th>Vendor ID/Name</th>
            <th>PO Type</th>
             <th>Need RTV</th>
            <th>Status</th>         
        </tr>  
        <?php  
            $i=0;
            foreach ($datas as $data) { $i++;?>
                <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['']; ?></td>
                    <td><?php echo $data['']; ?></td>
                    <td><?php echo $data['']; ?></td>
                    <td><?php echo $data['']; ?></td>
                    <td><?php echo $data['']; ?></td>
                </tr>   
        <?php } ?>
     </table>

<?php }
        else { ?>
                <br /><br />
                <table  class="table-short-information">
                     <tr>     
                            <th>#</th>
                            <th>PO No.</th>
                            <th>PO Date</th>
                            <th>Vendor ID/Name</th>
                            <th>PO Type</th>
                            <th>Need RTV</th>
                            <th>Status</th>           
                     </tr>
                    <tr>
                        <td colspan ='7'><B>Not found data!!!</B></td>
                    </tr>
                </table>
      <?php  }
?>
<script>
function check(){
    
        if(document.getElementById('Cofrom_date').value==''){
            alert('Not data From Date');document.getElementById('Cofrom_date').focus(); 
            return false;
        }   if(document.getElementById('Coto_date').value==''){
            alert('Not data To Date');document.getElementById('Coto_date').focus(); 
            return false;
        }
            if(document.getElementById('Copo').value==''){
            alert('Not data PO');document.getElementById('Copo').focus(); 
            return false;
        }
        
            return true;
        
}
</script>