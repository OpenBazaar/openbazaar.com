<?php
class Social extends CI_Controller {

        public function index()
        {	        					
			$this->load->view('header');
            //$this->load->view('follow_modal', array('peerID'=>$peerID));
            
            $posts = get_social_posts();
            $results = $posts->results->results;
            
            print_r("<h1 style='margin:20px 10px;'>Social</h1>");
            
            foreach($posts->results->results as $post) {
	            $data = $post->data;
	            
	            $this->load->view('social_post', array('data'=>$data));
	            
	            
            }
            
			$this->load->view('footer');
        }
        
        public function store($peerID)
        {	        					
			$this->load->view('header');
            
			$this->load->view('footer');
        }
        
        public function card($peerID) {
	        
	        $profile = get_profile($peerID);
	        
	        $this->load->view('profile_card', array('profile'=>$profile));
	        
        }
        
        	       
}