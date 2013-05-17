<div class="ui-pakgon-form">
<h1><?php echo __('Department Management'); ?></h1><br />
<?php if(!empty($datas)){ 
    echo ($cate1 != 0) ? "Cate1 : {$cate1} <br>" : ""; //if else short
    echo ($cate2 != 0) ? "Cate2 : {$cate2} <br>" : "";
    echo ($cate3 != 0) ? "Cate3 : {$cate3} <br>" : "";
    echo ($cate4 != 0) ? "Cate4 : {$cate4} <br>" : "";
    echo ($cate5 != 0) ? "Cate5 : {$cate5} <br>" : "";
?>
<table  class="table-short-information"> 
        <tr>  
            <th><?php echo $title ;?></th>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Action'); ?></th>     
        </tr> 
        
        <?php 
            foreach ($datas as $data) { $$cate = $data[$cate];//$$ เอาตัวแปรเก็บค่าไว้ในตัวแปร?> 
        
                <tr>
                    <td><?php echo $data[$cate]; ?></td>
                    <td><?php echo $data[$name]; ?></td>
                    <td> <?php if($cate!=='cate5'){//เช็คคลิกlinkไปที่ละหน้า?>
                                <?= $this->DisplayFormat->link_view("/DepartmentMasters/index/".$cate1."/".$cate2."/".$cate3."/".$cate4."/".$cate5); ?>
                                    <?php }else{ 
                                                    $this->DisplayFormat->link_view("/DepartmentMasters/View/"."/".$cate5); 
                                                }?>
                        <?php }?>
                    </td>
                </tr>   
</table>

<?php }else { ?>
                    <br /><br />
                    <table  class="table-short-information">
                        <tr>
                            <th><?php echo __('Cate'); ?></th>
                            <th><?php echo __('Name'); ?></th>
                            <th><?php echo __('Action'); ?></th>
                        </tr>
                        <tr>
                            <td colspan ='3'><?php echo __('No data'); ?></td>
                        </tr>
                    </table>
      <?php  }
?>
</div>
<script>
    function check(){

            if(document.getElementById('DeKey').value==''){
                alert('Not data');document.getElementById('DeKey').focus(); 
                return false;
            }
                return true; 
    }
</script>