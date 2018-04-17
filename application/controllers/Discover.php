<?php
class Discover extends CI_Controller {

        public function index()
        {
	        	$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	$search_string = "https://search.ob1.io/search/listings?q=*&network=mainnet&p=0&ps=64&moderators=all_listings&sortBy=rating&nsfw=false&acceptedCurrencies=BTC";
	        	
	        	$search_hash = hash('ripemd160', $search_string);
	        	$search_load = $this->cache->get('search_'.$search_hash);
	        	if($search_load == "") {
		        	$search_load = file_get_contents($search_string);	
		        	$this->cache->file->save('search_'.$search_hash, $search_load, 900); // 15 minutes cache
	        	}
	        	
	        	$search_results_json = json_decode($search_load);
	        	
/*
	        	$search_load = file_get_contents("https://search.ob1.io/search/listings?q=*&network=mainnet&p=0&ps=64&moderators=all_listings&sortBy=rating&nsfw=false&acceptedCurrencies=BTC");
				$search_results_json = json_decode($search_load);
*/
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$page = 0;
				$page_count = ceil($result_count / 64);
				
				$pagination_url = "/discover/p";
				
				// Get Verified Mods
				$verified_mods = json_decode(file_get_contents("https://search.ob1.io/verified_moderators"));
				
				
				$data = array('listings' => $results, 'total' => $result_count, 'term'=> '', 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators);
				
				foreach($results as $listing) {
					//print_r($listing->data->thumbnail->small);
				}
				
				$this->load->view('header');
                $this->load->view('discover', $data);
                $this->load->view('footer');
        }
        
        public function results($term="*", $page=0)
        {
	        $term = $term ? $term : "*";	        
	        
	        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        	$search_string = "https://search.ob1.io/search/listings?q=".$term."&network=mainnet&p=".$page."&ps=64&moderators=all_listings&&nsfw=false&acceptedCurrencies=BTC";
        	
        	$search_hash = hash('ripemd160', $search_string);
        	$search_load = $this->cache->get('search_'.$search_hash);
        	if($search_load == "") {
	        	$search_load = file_get_contents($search_string);	
	        	$this->cache->file->save('search_'.$search_hash, $search_load, 900); // 15 minutes cache
        	}

			$search_results_json = json_decode($search_load);
			
			$results = $search_results_json->results->results;
			$result_count = $search_results_json->results->total;
			
			
			$page_count = ceil($result_count / 64);
			
			$pagination_url = "/results/".$term."/p";
			
			// Get Verified Mods
			$verified_mods = json_decode(file_get_contents("https://search.ob1.io/verified_moderators"));
				
			$data = array('listings' => $results, 'total' => $result_count, 'term' => $term, 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators);

			
			foreach($results as $listing) {
				//print_r($listing->data->thumbnail->small);
			}

	        $this->load->view('header');
	        $this->load->view('discover', $data);
                $this->load->view('footer');	        
        }
        
        public function p($page=0)
        {
	        	$search_load = file_get_contents("https://search.ob1.io/search/listings?q=*&network=mainnet&p=".$page."&ps=64&moderators=all_listings&nsfw=false&acceptedCurrencies=BTC");
				$search_results_json = json_decode($search_load);
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$page_count = ceil($result_count / 64);
				
				$pagination_url = "/discover/p";
				
				// Get Verified Mods
				$verified_mods = json_decode(file_get_contents("https://search.ob1.io/verified_moderators"));
				
				$data = array('listings' => $results, 'total' => $result_count, 'term'=> '', 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators);
				
				foreach($results as $listing) {
					//print_r($listing->data->thumbnail->small);
				}
				
				$this->load->view('header');
                $this->load->view('discover', $data);
                                $this->load->view('footer');
        }
}