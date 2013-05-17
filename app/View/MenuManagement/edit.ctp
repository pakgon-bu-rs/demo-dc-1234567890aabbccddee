<h1><?php echo __('Menu Management : Edit');?></h1>
<br /><br />
<?php echo $this->Form->create('Menu', array('url'=>'/MenuManagement/edit'));?>
<?php echo $this->Form->input('id',array('div'=>false,'label'=>false));?>
	<table>
            <tr>
                <td>Name</td>
                <td><?echo $this->Form->input('name',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Name Cn</td>
                <td><?echo $this->Form->input('name_cn',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Name Th</td>
                <td><?echo $this->Form->input('name_th',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Domain</td>
                <td><?echo $this->Form->input('domain',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Port</td>
                <td><?echo $this->Form->input('ports',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>URL</td>
                <td><?echo $this->Form->input('url',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Methods</td>
                <td><?echo $this->Form->input('methods',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Sequence No.</td>
                <td><?echo $this->Form->input('seq_no',array('div'=>false,'label'=>false));?></td>
            </tr>
            <tr>
                <td>Stakeholder</td>
                <td><?echo $this->Form->input('Stakeholder',array('div'=>false,'label'=>false, 'type'=>'select', 'options'=>$stakeholders));?></td>
            </tr>
			<tr>
                <td>&nbsp;</td>
                <td><?echo $this->Form->submit('Submit');?></td>
            </tr>
	
	</table>
<?php echo $this->Form->end();?>