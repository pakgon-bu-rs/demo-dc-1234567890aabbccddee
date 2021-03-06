<?php
class DepartmentMastersController extends AppController {
      var $name = 'DepartmentMasters';
      var $helpers = array('Html', 'Form','DisplayFormat');
      var $components = array('ApiClient');
      
  function index($cate1=0,$cate2=0,$cate3=0,$cate4=0,$cate5=0) {
         
      if($cate1==0){
                 
                  $datas = $this->ApiClient->CallFunction('general_info.department_search' , 
                                                             array( ));
     
                   $this->set('datas',$datas);
                   $this->set('title','Cate1');
                   $this->set('cate','cate1');
                   $this->set('name','name1');
                  
          }
          elseif($cate2==0){
                  $datas = $this->ApiClient->CallFunction('general_info.department_search' , 
                                                             array('cate1'=>$cate1));
                     
                   $this->set('datas',$datas);
                   $this->set('title','Cate2');
                   $this->set('cate','cate2');
                   $this->set('name','name2');
            }
             elseif($cate3==0){
           
                   $datas = $this->ApiClient->CallFunction('general_info.department_search' , 
                                                             array('cate1'=>$cate1,'cate2'=>$cate2));
                   $this->set('datas',$datas);
                   $this->set('title','Cate3');
                   $this->set('cate','cate3');
                   $this->set('name','name3');
            }
             elseif($cate4==0){

                  $datas = $this->ApiClient->CallFunction('general_info.department_search' , 
                                                             array('cate1'=>$cate1,'cate2'=>$cate2,'cate3'=>$cate3));
                  $this->set('datas',$datas);
                  $this->set('title','Cate4');
                  $this->set('cate','cate4');
                  $this->set('name','name4');
            }
             elseif($cate5==0){
                  $datas = $this->ApiClient->CallFunction('general_info.department_search' , 
                                                             array('cate1'=>$cate1,'cate2'=>$cate2,'cate3'=>$cate3,'cate4'=>$cate4));
                  $this->set('datas',$datas);

                  $this->set('title','Cate5');
                  $this->set('cate','cate5');
                  $this->set('name','name5');
            }

                  $this->set('cate1', $cate1);
                  $this->set('cate2', $cate2);
                  $this->set('cate3', $cate3);
                  $this->set('cate4', $cate4);
                  $this->set('cate5', $cate5);
  }
  function view($cate5=null){
      
  }
  
  
  
}
?>