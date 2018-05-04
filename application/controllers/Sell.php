<?php
class Sell extends CI_Controller {

        public function index()
        {                   
            $this->load->view('header');
            $this->load->view('sell_modal');
            $this->load->view('footer');
        }                
}
?>