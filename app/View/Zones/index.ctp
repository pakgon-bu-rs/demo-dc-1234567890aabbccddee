<div class="ui-pakgon-form">
    <h1><?= __('Zone Management') ?></h1>

    <fieldset class="search">
        <?= $this->Form->create('Search',array('url'=>array('controller'=>'Zones','action'=>'index'))); ?>
        <table class="no-border">
            <tr>
                <td><?= $this->Form->input('keyword',array('label'=>FALSE ,"div"=>false , 'class' => 'first-input')); ?></td>
                <td><?= $this->Form->input('is_active',array('label'=>FALSE ,"div"=>false,'options'=>array('Y'=>'Active','N'=>'Inactive','A'=> 'All'))); ?></td>
                <td><?= $this->Form->submit('Search',array("div"=>false)); ?></td>
                <td><?= $this->Form->submit('Add', array('type' => 'button' , 'onclick'=>"window.location='/Zones/add';")); ?></td>
            </tr>
        </table>
    </fieldset>

    <table class="table-short-information">
        <tr>
<!--            <th class="nindex"><?= __('#'); ?></th>-->
            <th class="sid"><?= $this->DisplayFormat->pagination_sort('id',__('Zone ID')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name' , __('Name')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name_eng' , __('Name (EN)')); ?></th>         
            <th class="bool"><?= $this->DisplayFormat->pagination_sort('is_active' , __('Active')); ?></th>   
            <th class="datetime"><?= $this->DisplayFormat->pagination_sort('modified' , __('Modified')); ?></th>
            <th class="actions">Action</th>         
        </tr>
    <?php
    if(!empty($zones['data'])){
        foreach ($zones['data'] as $data) {
    ?>
        <tr>
            <!--<td class="nindex"><?= $this->DisplayFormat->pagination_record_num($zones['page'] , $zones['limit']); ?></td>-->
            <td class="sid"><?= $data['id']; ?></td>
            <td><?= $data['name']; ?></td>
            <td><?= $data['name_eng']; ?></td>
            <td class="bool"><?= $this->DisplayFormat->bool($data['is_active']); ?></td>
            <td class="datetime"><?= $this->DisplayFormat->datetime_iso($data['modified']); ?></td>
            <td class="actions"> 
                <?= $this->DisplayFormat->link_view("/Zones/view/".$data['id']); ?>
                <?= $this->DisplayFormat->link_edit("/Zones/edit/".$data['id']); ?>
                <?= $this->DisplayFormat->link_del("/Zones/delete/".$data['id']); ?>
            </td>
        </tr>   
    <?php 
        }
    }else{
        echo "<td colspan ='6'>".__('No data')."</td>";
    }
    ?>
    </table>
    <?php $this->DisplayFormat->pagination_page($zones); ?>
</div>