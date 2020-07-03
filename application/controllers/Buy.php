<?php
class Buy extends CI_Controller {

        public function index($peerID, $slug)
        {
	        $this->load->view('header');
	        $this->load->view('buy', []);
        }
        
        public function item($peerID, $slug) {
            // Record click in the search database
            $cfduid = (isset($_COOKIE["__cfduid"])) ? $_COOKIE["__cfduid"] : "";
            @loadFile("https://search.ob1.io/click/listing/".$peerID."/".$slug."?__cfduid=$cfduid");

	        $this->load->view('header');
            $this->load->view('buy', array('peerID'=>$peerID, 'slug'=>$slug));
			$this->load->view('footer');
        }
        
        public function follow($peerID) {
	        $this->load->view('header');
            $this->load->view('follow_modal', array('peerID'=>$peerID));
			$this->load->view('footer');
        }

        public function survey() {
            setcookie("survey", true, time() + (86400 * 30 * 5000), "/");
        }

}