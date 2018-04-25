<?php
class Message extends CI_Controller {

        public function index($peerID)
        {	        					
			$this->load->view('header');
            $this->load->view('message_modal', array('peerID'=>$peerID));
			$this->load->view('footer');
        }
        
        public function store($peerID)
        {	        					
			$this->load->view('header');
            $this->load->view('message_modal', array('peerID'=>$peerID));
			$this->load->view('footer');
        }
        
        	       
}