<?php ?>
<div class="ui-pakgon-form">
    <h1><?= __('Location Type Management') ?></h1>

    <fieldset class="search">
        <?= $this->Form->create('Search',array('url'=>array('controller'=>'LocationsTypes','action'=>'index'))); ?>
        <table class="no-border">
            <tr>
                <td><?= $this->Form->input('keyword',array('label'=>FALSE ,"div"=>false , 'class' => 'first-input')); ?></td>
                <td><?= $this->Form->input('is_active',array('label'=>FALSE ,"div"=>false,'options'=>array('Y'=>'Active','N'=>'Inactive','A'=> 'All'))); ?></td>
                <td><?= $this->Form->submit('Search',array("div"=>false)); ?></td>
                <td><?= $this->Form->submit('Add', array('type' => 'button' , 'onclick'=>"window.location='/LocationsTypes/add';")); ?></td>
            </tr>
        </table>
    </fieldset>

    <table class="table-short-information">
        <tr>
            <th class="nindex"><?= __('#'); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name' , __('Name')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name_eng' , __('Name (EN)')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('capacity_limit' , __('Capacity Limit')); ?></th> 
            <th class="bool"><?= $this->DisplayFormat->pagination_sort('is_active' , __('Active')); ?></th>           
            <th class="datetime"><?= $this->DisplayFormat->pagination_sort('modified' , __('Modified')); ?></th>
            <th class="actions">Action</th>         
        </tr>  
    <?php
    if(!empty($LocationsTypes['data'])){
        foreach ($LocationsTypes['data'] as $data) {
    ?>
        <tr>
            <td class="nindex"><?= $this->DisplayFormat->pagination_record_num($LocationsTypes['page'] , $LocationsTypes['limit']); ?></td>
            <td><?= $data['name']; ?></td>
            <td><?= $data['name_eng']; ?></td>
            <td><?= (int)$data['capacity_limit']; ?></td>
            <td class="bool"><?= $this->DisplayFormat->bool($data['is_active']); ?></td>
            <td class="datetime"><?= $this->DisplayFormat->datetime_iso($data['modified']); ?></td>
            <td> 
                <?= $this->DisplayFormat->link_view("/LocationsTypes/view/".$data['id']); ?>
                <?= $this->DisplayFormat->link_edit("/LocationsTypes/edit/".$data['id']); ?>
                <?= $this->DisplayFormat->link_del("/LocationsTypes/delete/".$data['id']); ?>
            </td>
        </tr>   
    <?php 
        }
    }else{
        echo "<td colspan ='7'>".__('No data')."</td>";
    }
    ?>
    </table>
    <?php $this->DisplayFormat->pagination_page($LocationsTypes); ?>
</div>