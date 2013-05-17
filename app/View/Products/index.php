<h1>Product Info</h1><br />
<?php
echo $this->Form->create('Products',array('url'=>array('controller'=>'Products','action'=>'index')));
echo $this->Form->input('key',array('label'=>'SKU,BARCODE,STYLE:' , 'id'=>'PoKey'));
echo $this->Form->submit('Search',array("div"=>false,'onClick' => "return check();"));
echo $this->Form->end();
?>








<script>
function check(){
    
        if(document.getElementById('PoKey').value==''){
            alert('Not data');document.getElementById('PoKey').focus(); 
            return false;
        }
       
        
            return true;
        
}
</script>