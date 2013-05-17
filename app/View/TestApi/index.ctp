<h1>Test API</h1>
<p>
    <?php echo $this->Form->create('Input',array('url'=>'/TestApi','div'=>false,'label'=>false));?>
 <table class="nostyle">
     <tr>
         <td>Function : </td>
         <td><?= $this->Form->input('function',array('div'=>false,'label'=>false,'value'=>@$function)); ?></td>
     </tr>
     <tr>
         <td>Params : </td>
         <td><?= $this->Form->input('key_param',array('id'=>'key_param', 'div'=>false,'label'=>false , 'value' => "")) . " => " . $this->Form->input('value_param',array('id'=>'value_param', 'div'=>false,'label'=>false , 'value' => "")) . " "; ?><INPUT type="button" value="Add Param" onclick="addRow('param_list')" />
             <br/><br/><hr/><br/>
             
             <table id="param_list">
                 <tr><th>Key</th><th>Value</th><th>Delete</th></tr>
                 <?php
                 if(!empty($params))
                 foreach($params as $k => $v){
                     echo "<tr id='P_{$k}'>";
                     echo "<td>{$k}</td>";
                     echo "<td>{$v}</td>";
                 ?>
                 
                 <td>
                     <INPUT type="button" value="Delete" onclick="deleteRow('param_list','<?= $k ?>')" />
                     <?= $this->Form->hidden("Input.params.{$k}", array('value'=>$v)); ?>
                 </td>
                 </tr>
                 <?php } ?>                 
             </table>
         </td>
     </tr>
     <tr>
         <td colspan="3"><?= $this->Form->submit('Call',array('div'=>FALSE,'name'=>"call")) . " " . $this->Form->submit('Debug',array('div'=>FALSE,'name'=>"debug")); ?></td>
     </tr>
 </table>
    <?php echo $this->Form->end();?>
</p>
<hr/>
<?php if(isset($result)){
    echo "RESULT<br>";
echo "<pre>";
print_r($result);
echo "</pre>";
} ?>

<SCRIPT>
    function addRow(tableID) {
        var key = document.getElementById('key_param').value;
        var value = document.getElementById('value_param').value;
        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        row.id = "P_" + key;
        var cell1 = row.insertCell(0);
        
        cell1.innerHTML = key;
        
        var cell2 = row.insertCell(1);
        cell2.innerHTML = value;
        
        var element1 = document.createElement("input");
        element1.type = "hidden";
        element1.name = "data[Input][params][" + key + "]";
        element1.value = value;
        
        var element2 = document.createElement("input");
        element2.type = "button";
        element2.value = "Delete";
        element2.onclick = function() { deleteRow('param_list' , "P_" + key); };
        
        var cell3 = row.insertCell(2);
        cell3.appendChild(element1);
        cell3.appendChild(element2);
        
        document.getElementById('key_param').value = "";
        document.getElementById('value_param').value = "";
    }

    function deleteRow(tableID , key){
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        for(var i=1; i<rowCount; i++) {
            var row = table.rows[i];
            if(row.id == key) {
                table.deleteRow(i);
                break;
            }
        }
    }
</SCRIPT>