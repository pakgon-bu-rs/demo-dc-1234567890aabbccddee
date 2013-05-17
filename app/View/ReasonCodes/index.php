<div class="ui-pakgon-form">
    <h1><?php echo __('Reason Code Management'); ?></h1>
    
<fieldset class="search">
    <?php echo $this->Form->create('Re',array('url'=>array('controller'=>'ReasonCodes','action'=>'index'))); ?>
    <table class="no-border">
       <tr>
            <td><?= $this->Form->input('key',array('label'=>FALSE,"div"=>false, 'class' => 'first-input')); ?></td>
            <td><?= $this->Form->input('is_active',array('label'=>FALSE ,"div"=>false,'options'=>array('Y'=>'Active','N'=>'Inactive','A'=> 'All'))); ?></td>
            <td><?= $this->Form->input('type',array('label'=>FALSE ,"div"=>false,'options'=>array('A'=> 'All','INVADJ'=>'INVADJ'))); ?></td>
            <td><?= $this->Form->submit(' Search ',array("div"=>false));?></td>
        </tr>
     </table>
</fieldset>
    
 <table  class="table-short-information">
     <tr>
            <th class="nindex"><?= __('#'); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name' , __('Name')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name_eng' , __('Name (EN)')); ?></th>            
            <th><?= $this->DisplayFormat->pagination_sort('type_code' , __('Types')); ?></th>
            <th class="bool"><?= $this->DisplayFormat->pagination_sort('is_active' , 'Active'); ?></th>
            <th class="datetime"><?= $this->DisplayFormat->pagination_sort('modified' , 'Modified'); ?></th>
            <th class="actions">Action</th>         
     </tr>  

<?php 
if(!empty($result['data'])){ 
        foreach ($result['data'] as $data) { ?>
                <tr>
                    <td class="nindex"><?= $this->DisplayFormat->pagination_record_num($result['page'] , $result['limit']); ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['name_eng']; ?></td>
                    <td ><?php echo $data['type_code']; ?></td>
                    <td class="bool"><?php echo $this->DisplayFormat->bool($data['is_active']); ?></td>
                    <td class="datetime"><?php echo $this->DisplayFormat->datetime_iso($data['modified']); ?></td>
                    <td class="actions"> 
                        <?= $this->DisplayFormat->link_view("/ReasonCodes/view/".$data['id']); ?>
                        <?= $this->DisplayFormat->link_edit("/ReasonCodes/edit/".$data['id']); ?>
                    </td>
                </tr>   

 <?php 
        } 
     }else {
              echo "<td colspan ='7'>".__('No data')."</td>";
           }?>
</table>
<?php $this->DisplayFormat->pagination_page($result); ?>
</div>