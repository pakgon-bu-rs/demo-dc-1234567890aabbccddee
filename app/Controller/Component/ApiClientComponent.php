<?php
define('TOKEN' , 7074); 
define('SERVER_URL' , "http://192.168.10.12:18803/api-server/");
App::uses('Component', 'Controller');

class ApiClientComponent extends Component {
    
    public function CallFunction($function = '', $params = array(), $debug = FALSE) {
        $BatchArray = array(
            'token'  => TOKEN,
            'func'   => $function,
            'params' => $params
        );

        $curlHandler = curl_init();
        $curlOptions = array(
                CURLOPT_URL => SERVER_URL,
                CURLINFO_CONTENT_TYPE => "application/json",
                CURLOPT_POST => TRUE,
                CURLOPT_POSTFIELDS => json_encode($BatchArray),
                CURLOPT_RETURNTRANSFER => TRUE
        );
        curl_setopt_array($curlHandler,$curlOptions);
        $response = curl_exec($curlHandler);
        curl_close($curlHandler);
        
        if($response === FALSE){
            echo "<script>alert('Cannot connect API server!')</script>";
        }
        //============== RESULT =================
        $response_arr = explode("\n" , $response);
        $result = array();
	
	
        foreach($response_arr as $line => $result_json){
            if($result_json == "")continue;

            $encode = json_decode($result_json,TRUE);
	    if($encode != null)
            foreach($encode as $k => $json_value){
                    $value_arr = json_decode($json_value,TRUE);
                    foreach($value_arr as $k_value => $value){
                            $result[$k][$k_value] = $value;
                    }
            }
        }

        if($debug){
                debug($result);
        }
        if(array_key_exists('ERROR' , $result)){
            //debug($result['ERROR']);die();
            //echo "<script>alert('". $result['ERROR'][0] ."')</script>";die();
            return $result['ERROR'][0];
        }else{
            return (array_key_exists('RESULT' , $result)) ? $result['RESULT'] : array();
        }
        

    }

    public function DebugFunction($function = '', $params = array()) {
        return $this->CallFunction($function, $params, $debug = TRUE);
    }
}
?>
