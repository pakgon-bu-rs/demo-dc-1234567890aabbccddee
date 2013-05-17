<?php
  class CommonComponent extends Component {
    /*
     * Change Log 2013-04-30
     * Change schema of stakeholders and menus from schema "CORE" to "PORTAL"
     */
      var $uses = array('GlobalUser'); 
      //.....................................................................
      function dateDisplay($selectedDate){
          if(strlen($selectedDate)!=6){
              return  ("Date Input is not valid !"); 
          }
          else {
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
      function getMenuByStakeholder($stakeholderId){
          $tableMenu = ''; 
          if(empty($_SESSION['GlobalUser']['stakeholder_id'])){
              return "- Please login - ";
          }
          else {    
              $stakeholder_id =($_SESSION['GlobalUser']['stakeholder_id']); 
              //$stakeholder_id  = '2d7c1580-1c34-11e2-892e-0800200c9a66'; 
              $sql = "SELECT m.* FROM portal.stakeholders_menus shm
                        LEFT JOIN portal.menus m ON m.id = shm.menu_id
                        WHERE shm.stakeholder_id = '$stakeholder_id' and m.is_active = 'Y'
                        Order by seq_no
              ";
	  $data = pg_query($sql); 
              
              $tableMenu .="<ul class=box>"; 
              $rowCount  =0;  
              while($row = pg_fetch_assoc($data)){
                  //print_r($row); 
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
