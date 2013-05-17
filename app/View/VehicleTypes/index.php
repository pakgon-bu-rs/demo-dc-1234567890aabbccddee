<div class="ui-pakgon-form">
    <h1><?php echo __('Vehicle Type Management'); ?></h1>
    <fieldset class="search">
        <?php echo $this->Form->create('Vt',array('url'=>array('controller'=>'VehicleTypes','action'=>'index'))); ?>
         <table class="no-border">
            <tr>
                <td><?= $this->Form->input('key',array('label'=>FALSE,"div"=>false,'class' => 'first-input')); ?></td>
                <td><?= $this->Form->input('is_active',array('label'=>FALSE ,"div"=>false,'options'=>array('Y'=>'Active','N'=>'Inactive','A'=> 'All'))); ?></td>
                <td><?= $this->Form->submit('Search',array('div'=>false));?></td>
                <td><?= $this->Form->button('Add', array("div"=>false , 'type'=>'button','onclick'=>"window.location='/VehicleTypes/add';")); ?></td>
            </tr>
        </table>
   </fieldset>
    <table class="table-short-information">
        <tr>
            <th class="record-num"><?= __('#'); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name' , 'Name'); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name_eng' , 'Name (EN)'); ?></th>    
            <th class="bool"><?= $this->DisplayFormat->pagination_sort('is_active' , 'Active'); ?></th>
            <th class="datetime"><?= $this->DisplayFormat->pagination_sort('modified' , 'Modified'); ?></th>
            <th class="actions">Action</th>     
        </tr>  
        <?php 
            if(!empty($datas['data'])){ 
                    foreach ($datas['data'] as $data) { ?>
                <tr>
                    <td class="nindex"><?= $this->DisplayFormat->pagination_record_num($datas['page'] , $datas['limit']); ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['name_eng']; ?></td>  
                    <td class="bool"><?php echo $this->DisplayFormat->bool($data['is_active']); ?></td>
                    <td class="datetime"><?php echo $this->DisplayFormat->datetime_iso($data['modified']); ?></td>
                  
                    
                    <td class="actions"> 
                         <?= $this->DisplayFormat->link_view("/VehicleTypes/view/".$data['id']); ?>
                         <?= $this->DisplayFormat->link_edit("/VehicleTypes/edit/".$data['id']); ?>
                         <?= $this->DisplayFormat->link_del("/VehicleTypes/delete/".$data['id']); ?>
                    </td>
                </tr>   
        <?php }
                }else {
                        echo "<td colspan ='6'>".__('No data')."</td>";
                      } 
         ?>
         </table>
<?php $this->DisplayFormat->pagination_page($datas); ?>
</div>