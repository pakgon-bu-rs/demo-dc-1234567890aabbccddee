<?php
App::uses('Component', 'Controller');

class DateTimeComponent extends Component {

    public function timestamp_to_idate($timestamp = FALSE){
        $timestamp = (($timestamp === FALSE) ? date('Y-m-d') : $timestamp );

        $date = substr($timestamp , 0 , 10);
        @list($Y , $m , $d) = explode('-' , $date , 3);
        $idate = (int)substr($Y , -2) . $m . $d;
        return $idate;
    }

    public function timestamp_to_i8date($timestamp = FALSE){
        $timestamp = (($timestamp === FALSE) ? date('Y-m-d') : $timestamp );

        $date = substr($timestamp , 0 , 10);
        return (int)str_replace('-' , '' ,$date );
    }

    public function idate_to_timestamp($idate = FALSE){
        $idate = (($idate === FALSE) ? date('ymd') : (int)$idate );
        
        $Y = (strlen($idate) == 5) ? substr($idate,0,1) : (int)substr($idate,0,2);
        $Y = $Y + 2000;
        $m = substr($idate, -4, 2);
        $d = substr($idate, -2);

        $timestamp = date("Y-m-d", mktime(0, 0, 0, $m, $d, $Y));

        return $timestamp;
    }

    public function idate_to_i8date($idate = FALSE){
        $idate = (($idate === FALSE) ? date('ymd') : $idate );
        $idate = (int)$idate;
        $idate = $idate + 2000;
        return $idate;
    }


    public function idate_next_day($idate = FALSE , $num_day = 1){
        $idate = (($idate === FALSE) ? date('ymd') : (int)$idate );

        $Y = (strlen($idate) == 5) ? substr($idate,0,1) : (int)substr($idate,0,2);
        $Y = $Y + 2000;
        $m = substr($idate, -4, 2);
        $d = substr($idate, -2);

        $idate = date("ymd", mktime(0, 0, 0, $m, $d + $num_day, $Y));
        return $idate;
    }

    public function i8date_next_day($i8date = FALSE , $num_day = 1){
        $i8date = (($i8date === FALSE) ? date('Ymd') : $i8date );

        $Y = substr($i8date, 0, 4);
        $m = substr($i8date, 4, 2);
        $d = substr($i8date, 6, 2);

        $idate = date("ymd", mktime(0, 0, 0, $m, $d + $num_day, $Y));
        return $idate;
    }

    public function timestamp_next_day($timestamp = FALSE , $num_day = 1){
        $timestamp = (($timestamp === FALSE) ? date('Y-m-d') : $timestamp );

        list($date , $time_input) = explode(' ' , $timestamp , 2);
        list($Y , $m , $d) = explode('-' , $date , 3);

        $timestamp = date("Y-m-d", mktime(0, 0, 0, $m, $d + $num_day, $Y));

        return $timestamp;
    }
}
?>