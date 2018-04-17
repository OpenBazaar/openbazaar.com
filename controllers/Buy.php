<?php
class Buy extends CI_Controller {

        public function index($peerID, $slug)
        {
	        					
				$this->load->view('header');
                $this->load->view('buy', []);
        }
        
        public function item($peerID, $slug) {
	        $this->load->view('header');
            $this->load->view('buy', array('peerID'=>$peerID, 'slug'=>$slug));
			$this->load->view('footer');
        }
        
}