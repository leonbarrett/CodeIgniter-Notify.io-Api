<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Notifyio_API {
  
  var $CI;
  
  function Notifyio_API()
  {
    
    $this->CI =& get_instance();
    
    $this->CI->load->config('notifyio_config');
        
    $this->api_key = $this->CI->config->item('notifyio_api_key');
  
  }
  
  function send_notification($data){
  
  	$fields_string = '';
  	
  	$email = md5($data['email']);
  	
  	$url = 'http://api.notify.io/v1/notify/'.$email;
	
	unset($data['email']);

	$data['api_key']=$this->api_key;
	
	foreach($data as $key=>$value){ 
		$fields_string .= $key.'='.$value.'&'; 
	}
	rtrim($fields_string,'&');
	
	$ch = curl_init();
	
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($data));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
	
	curl_exec($ch);
	
	curl_close($ch);
  	
  }  
}
?>