<?php
App::uses('Component', 'Controller');
  class CommonComponent extends Object {
      public $uses = array('GlobalUser'); 
      //.....................................................................
      function dateDisplay($selectedDate){
          if(strlen($selectedDate)!=6){
              return  ("Date Input is not valid !"); 
          }else {
              return substr($selectedDate,4,2)."/".substr($selectedDate,2,2)."/".substr($selectedDate,0,2);
          }
      }
      
      //......................................................................
      function getPriorityList(){
          $options  = array(
            "LOW"=>"Low",
	"MED"=>"Medium", 
	"HIG"=>"High",
	"CRI"=>"Critical"
         );
          return $options ;  
      }
        
      //.......................................................................
      function getTaskStatusList(){
          $options = array(
                "PED"=>"Pending",
                "ACK"=>"Acknowledge",
                "CHK"=>"Checking", 
                "FED"=>"Feedback",
                "TET"=>"Testing after feedback", 
                "REJ"=>"Reject the feedback", 
                "COM"=>"Complete"
          );
          return $options ; 
      }
      
      //.....................................................................
      public function getMenuByStakeholder(){
          $GlobalUser = ClassRegistry::init('GlobalUser');
          $tableMenu = ''; 
          if(empty($_SESSION['GlobalUser']['stakeholder_id'])){
              return "- Please login - ";
          }
          else {    
              $stakeholder_id = $_SESSION['GlobalUser']['stakeholder_id'];
              $sql = "SELECT m.* FROM core.stakeholders_menus shm
                        LEFT JOIN core.menus m ON m.id = shm.menu_id
                        WHERE shm.stakeholder_id = '$stakeholder_id' and m.is_active = 'Y'
                        Order by seq_no
              ";
            $data = $GlobalUser->query($sql); 
              $tableMenu .= "<ul class=box>"; 
              $rowCount  = 0;  
              foreach($data as $i => $row){
                  $row = $row[0];
                  $domain = trim($row["domain"]);
                  $ports = trim($row["ports"]); 
                  $name = trim($row["name"]); 
                  $url   = trim($row["url"]); 
                
                  if($name !=''){
                     $tableMenu .="<li><a href=\"http://$domain:$ports$url\">$name</a></li>";  
                  }
                     
              }
               $tableMenu .="</ul>"; 
          }
          return $tableMenu;  
      }

   }
?>
