<?php

class Demo extends Controller {

	function Demo()
	{
		parent::Controller();	
	}
		
	function index(){
		
		$this->load->library('notifyio_api');
		
		$data = array(
		'email'=>'hello@example.com', //required, must be an email registered with Notify.io
		'text'=>'Your Message', //required
		'title'=>'Your Title', //optional
		'link'=>'http://example.com', //optional, will be called when the notification is clicked
		'icon'=>'http://example.com/yourimage.png' //optional, 128x128 transparent png works best		
		);
		
		$this->notifyio_api->send_notification($data);
		
	}
	
}

/* End of file demo.php */
/* Location: ./system/application/controllers/demo.php */