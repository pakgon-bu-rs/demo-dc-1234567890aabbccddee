<h1>Configurations</h1><br />
<table width="100%" style="border: 0;border-color: window;">
    <tr><th>Master Data</th></tr>
    <tr><td><?= " - ".$this->Html->link('Zone Management', array('controller' => 'Zones', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Location Type Management', array('controller' => 'LocationsTypes', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Loaction Management', array('controller' => 'Locations', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Dock Type Management', array('controller' => 'DocksTypes', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Dock Management', array('controller' => 'Docks', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Vehicle Type Management', array('controller' => 'VehicleTypes', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Reason Management', array('controller' => 'ReasonCodes', 'action' => 'index')) ?></td></tr>
    <tr><th>User Management</th></tr>
    <tr><td><?= " - ".$this->Html->link('User', array('controller' => 'GlobalUsers', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Stakeholder', array('controller' => 'StakeholderMenuManagement', 'action' => 'index')) ?></td></tr>
    <tr><td><?= " - ".$this->Html->link('Menu', array('controller' => 'MenuManagement', 'action' => 'index')) ?></td></tr>
    
</table>
