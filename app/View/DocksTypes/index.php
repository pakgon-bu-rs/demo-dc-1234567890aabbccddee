<div class="ui-pakgon-form">
    <h1><?= __('Dock Type Management') ?></h1>

    <fieldset class="search">
        <?= $this->Form->create('Search',array('url'=>array('controller'=>'DocksTypes','action'=>'index'))); ?>
        <table class="no-border">
            <tr>
                <td><?= $this->Form->input('keyword',array('label'=>FALSE ,"div"=>false , 'class' => 'first-input')); ?></td>
                <td><?= $this->Form->input('is_active',array('label'=>FALSE ,"div"=>false,'options'=>array('Y'=>'Active','N'=>'Inactive','A'=> 'All'))); ?></td>
                <td><?= $this->Form->submit('Search',array("div"=>false)); ?></td>
                <td><?= $this->Form->button('Add',array("div"=>false, 'type'=>'button','onclick'=>"window.location='/DocksTypes/add';")); ?></td>
            </tr>
        </table>
    </fieldset>

    <table class="table-short-information">
        <tr>
            <th class="nindex"><?= __('#'); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name' , __('Name')); ?></th>
            <th><?= $this->DisplayFormat->pagination_sort('name_eng' , __('Name (EN)')); ?></th>      
            <th class="bool"><?= $this->DisplayFormat->pagination_sort('is_active' , __('Active')); ?></th>      
            <th class="datetime"><?= $this->DisplayFormat->pagination_sort('modified' , __('Modified')); ?></th>
            <th class="actions">Action</th>         
        </tr>  
        
    <?php
    if(!empty($datas['data'])){
        foreach ($datas['data'] as $data) {
    ?>
        <tr>
            <td class="nindex"><?= $this->DisplayFormat->pagination_record_num($datas['page'] , $datas['limit']); ?></td>
            <td><?= $data['name']; ?></td>
            <td><?= $data['name_eng']; ?></td>
            <td class="bool"><?= $this->DisplayFormat->bool($data['is_active']); ?></td>
            <td class="datetime"><?= $this->DisplayFormat->datetime_iso($data['modified']); ?></td>
            <td class="actions"> 
                <?= $this->DisplayFormat->link_view("/DocksTypes/view/".$data['id']); ?>
                <?= $this->DisplayFormat->link_edit("/DocksTypes/edit/".$data['id']); ?>
                <?= $this->DisplayFormat->link_del("/DocksTypes/delete/".$data['id']); ?>
            </td>
        </tr>   
    <?php 
        }
    }else{
        echo "<td colspan ='6'>".__('No data')."</td>";
    }
    ?>
    </table>
    <?php $this->DisplayFormat->pagination_page($datas); ?>
</div>