<?php
class Follow extends CI_Controller {

        public function index($peerID)
        {	        					
			$this->load->view('header');
            $this->load->view('follow_modal', array('peerID'=>$peerID));
			$this->load->view('footer');
        }
        
        public function store($peerID)
        {	        					
			$this->load->view('header');
            $this->load->view('follow_modal', array('peerID'=>$peerID));
			$this->load->view('footer');
        }
        
        public function card($peerID) {
	        $profile = get_profile($peerID);
	        $this->load->view('profile_card', array('profile'=>$profile));
        }

}