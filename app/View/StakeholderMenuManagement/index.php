<h1><?php echo __('Stakeholder Management'); ?></h1>
<br />

<?php echo $this->Form->button(' + New Stakeholder ', array('onclick' => "window.location='/StakeholderMenuManagement/add'",'div'=>false,'label'=>false,'width'=>'5px')); ?>
<table width="98%">
    <tr>
        <th>#</th>
        <th>Stakeholder Name</th>
        <th>Active</th>
        <th>Menu</th>
        <th>Action</th>
    </tr>
    <?php 
        foreach($data as $i => $d){
            $d = $d['Stakeholder'];
    ?>
        <tr>
            <td><?php echo ++$i ; ?></td>
            <td><?php echo $d['name']; ?></td>
            <td><?php echo $d['is_active']; ?></td>
            <td><a href="/StakeholderMenuManagement/menu/<?php echo $d['id']; ?>"> Menu </a></td>
            <td>
                <a href="/StakeholderMenuManagement/edit/<?php echo $d['id']; ?>"> Edit </a>
                <a href="/StakeholderMenuManagement/deleteStakeholder/<?php echo $d['id']; ?>" onclick="return confirm('Confirm to delete \'<?php echo $d['name']; ?>\'')"> Delete </a>
            </td>
        </tr>
    <?php } ?>
</table>