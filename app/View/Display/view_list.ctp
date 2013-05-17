<h1>View List Style</h1><br />

<?php
    echo $this->Form->create('De',array('url'=>array('controller'=>'DepartmentMasters','action'=>'index')));
    echo $this->Form->input('key',array('label'=>'' , 'id'=>'DeKey',"div"=>false));
    echo $this->Form->submit('Search',array("div"=>false,'onClick' => "return check();"));
    echo $this->Form->end();
?>

<?php if(!empty($datas)){ ?>

      <table  class="table-short-information">
          
        <tr>  
            <th><?php echo $title ;?></th>
            <th>Name</th>
            <th>Action</th>     
        </tr> 
        
        <?php 
            foreach ($datas as $data) { $$cate = $data[$cate];?>
        
                <tr>
                    <td><?php echo $data[$cate]; ?></td>
                    <td><?php echo $data[$name]; ?></td>
                    <td> <?php if($cate!=='cate5'){?>
                                <?= $this->DisplayFormat->link_view("/DepartmentMasters/index/".$cate1."/".$cate2."/".$cate3."/".$cate4."/".$cate5); ?>
                        <?php }?>
                    </td>
                </tr>   
        <?php } ?>
     </table>

<?php }
        else { ?>
                <br /><br />
                <table  class="table-short-information">
                    <tr>
                        <th>Cate</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td colspan ='10'><B>Not found data!!!</B></td>
                    </tr>
                </table>
      <?php  }
?>

<script>
function check(){
    
        if(document.getElementById('DeKey').value==''){
            alert('Not data');document.getElementById('DeKey').focus(); 
            return false;
        }
       
        
            return true;
        
}
</script>