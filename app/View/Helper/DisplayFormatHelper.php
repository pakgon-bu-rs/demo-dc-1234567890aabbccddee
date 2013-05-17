<?php
App::uses('AppHelper', 'View/Helper');

class DisplayFormatHelper extends AppHelper {
    public $helpers = array('Html' , 'Form');
    var $sort_hidden_exist = FALSE;
    var $record_num = 0;
    
    public function date_iso($date) { // Y-m-d
        if(strlen($date) <= 6){
            $date = sprintf("%06d" , $date);
            $date_iso = "20".substr ($date, 0, 2)."-".substr ($date, 2, 2)."-".substr ($date, 4, 2);
        }elseif(strlen($date) == 8){
            $date_iso = substr ($date, 0, 4)."-".substr ($date, 4, 2)."-".substr ($date, 6, 2);
        }else{
            $date_iso = substr ($date, 0,10);
        }
        return $date_iso;
    }
    
    public function datetime_iso($datetime) { // Y-m-d H:i:s
        if(strlen($datetime) <= 6){
            $datetime = sprintf("%06d" , $datetime);
            $datetime_iso = "20".substr ($datetime, 0, 2)."-".substr ($datetime, 2, 2)."-".substr ($datetime, 4, 2)." 00:00:00";
        }elseif(strlen($datetime) == 8){
            $datetime_iso = substr ($datetime, 0, 4)."-".substr ($datetime, 4, 2)."-".substr ($datetime, 6, 2)." 00:00:00";
        }else{
            $datetime_iso = substr ($datetime, 0,19);
        }
        return $datetime_iso;
    }
    
    public function date_int6($date) { // ymd
        if(strlen($date) <= 6){
            $date_int6 = sprintf("%06d" , $date);
        }elseif(strlen($date) == 8){
            $date_int6 = substr ($date, -6);
        }else{
            $date = str_replace("-", "", $date);
            $date_int6 = substr ($date, 2,6);
        }
        return $date_int6;
    }
    
    public function date_int8($date) { // Ymd
        if(strlen($date) <= 6){
            $date_int8 = "20".sprintf("%06d" , $date);
        }elseif(strlen($date) == 8){
            $date_int8 = $date;
        }else{
            $date = str_replace("-", "", $date);
            $date_int8 = substr ($date, 0,8);
        }
        return $date_int8;
    }
    
    public function bool($bool) {
        if($bool === TRUE || strtolower($bool) == 'y' || strtolower($bool) == 't' || strtolower($bool) == 'true' || strtolower($bool) == 'yes'){
            $bool = "Yes";
        }else{
            $bool = "No";
        }
        return $bool;
    }
    
    public function site_num($number){
        return sprintf("%03d", $number);
    }
    
    public function bol($number){
        return sprintf("%09d", $number);
    }
    
    public function container($number, $digit = 15){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function sku($number, $digit = 9){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function style($number, $digit = 8){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function cate1($number, $digit = 2){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function cate2($number, $digit = 2){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function cate3($number, $digit = 3){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function cate4($number, $digit = 4){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function cate5($number, $digit = 4){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function money($number , $thousands_sep = TRUE){
        $number = empty($number) ? 0 : round($number ,2);
        $number = ($thousands_sep) ? number_format($number,2,".",",") : number_format($number,2,".","");
        return $number;
    }
    
    public function qty($number){
        $qty = empty($number) ? 0 : round($number ,3);
        $qty = ($qty - (int)$qty != 0) ? $qty : (int)$qty;
        return $qty;
    }
    
    public function percent($number){
        $percent = empty($number) ? 0 : round($number ,2);
        $percent = ($percent - (int)$percent != 0) ? $percent : (int)$percent;
        return $percent."%";
    }
    
    public function vendor($number, $digit = 8){
        return sprintf("%0{$digit}d", $number);
    }
    
    public function location_status($key){
        switch($key){
            case 'A':$text = "Avialable";break;
            case 'U':$text = "Unavialable";break;
            case 'I':$text = "Inactive";break;
            case 'H':$text = "Holding";break;
            case 'D':$text = "Deleted";break;
            default : $text = "Unknown";
        }
        return sprintf("%0{$digit}d", $number);
    }
    
    public function link_view($url){
        return $this->Html->link(
                    $this->Html->image("search-32.png", array("alt" => "View" , 'height' => 24, 'width' => 24)),
                    $url,
                    array('class'=>'viewLink', 'escape' => false)
                );
    }
    
    public function link_edit($url){
        return $this->Html->link(
                    $this->Html->image("pencil.png", array("alt" => "Edit" , 'height' => 24, 'width' => 24)),
                    $url,
                    array('class'=>'editLink', 'escape' => false)
                );
    }
    
    public function link_del($url, $msg = "Do you want to delete?"){
        return $this->Html->link(
                    $this->Html->image("trash-32.png", array("alt" => "Delete" , 'height' => 24, 'width' => 24)),
                    $url,
                    array('class'=>'deleteLink', 'escape' => false),
                    $msg
                );
        return $this->Form->postLink(
                    $this->Html->image("trash-32.png", array("alt" => "Delete" , 'height' => 24, 'width' => 24)), 
                    $url, 
                    array('class'=>'deleteLink', 'escape' => false) , 
                    $msg
                );
    }
    
    public function pagination_page(&$data , $passArg = TRUE){
        $page = $data['page'];
        $total_page = $data['total_page'];
        $total_record = $data['total_record'];
        $record = count($data['data']);
        
        if($total_page > 1){
            echo "Page : ";
            $start_page = ($page < 5) ? 1 : $page - 4;
            $end_page = ($page > $total_page - 5) ? $total_page : $page + 4;
            echo $this->Form->hidden('Paginate.page',array('value'=>$page , 'id'=>'PaginatePage'));
            if($start_page != 1)
            echo $this->Form->submit('|<<',array("div"=>false,'class'=>'GoToFirstPage','name'=>'PaginateButton','onClick' => "document.getElementById('PaginatePage').value = 1"));
            for($run_page = $start_page ; $run_page <= $end_page ; $run_page++){
                if($run_page == $page){
                    echo $this->Form->submit($run_page,array("div"=>false,'name'=>'PaginateButton','class'=>"PageSelected",'onClick'=>"return false;"));
                }else{
                    echo $this->Form->submit($run_page,array("div"=>false,'name'=>'PaginateButton','class'=>"PageChoice",'onClick' => "document.getElementById('PaginatePage').value = {$run_page}"));
                }
            }
            if($end_page != $total_page)
            echo $this->Form->submit('>>|',array("div"=>false,'class'=>'GoToLastPage','name'=>'PaginateButton','onClick' => "document.getElementById('PaginatePage').value = {$total_page}"));
        }
    }
    
    public function pagination_sort($field , $text = ""){
        $text = !empty($text) ? $text : $field ;
        $value = (@$this->data['Paginate']['order'] == "{$field} ASC") ? "{$field} DESC" : "{$field} ASC";
        if(!$this->sort_hidden_exist){
            echo $this->Form->hidden('Paginate.order',array('value'=>$value , 'id' => 'PaginateSort' , 'class'=>'PaginateSort'));
            $this->sort_hidden_exist = TRUE;
        }
        return $this->Form->submit($text,array("div"=>false,'name'=>'PaginateButton', 'onClick' => "document.getElementById('PaginateSort').value = '{$value}';"));
    }
    
    public function pagination_record_num($page , $limit){
        $this->record_num++;
        return (($page-1) * $limit) + $this->record_num;
    }
}
?>
