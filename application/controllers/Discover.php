<?php
class Discover extends CI_Controller {

        public function index()
        {
	        	$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	$search_string = SEARCH_ENGINE_URI . "/search/listings?q=*&network=mainnet&p=0&ps=66&moderators=all_listings&sortBy=rating&nsfw=false&acceptedCurrencies=BTC";
	        	
	        	$search_hash = hash('ripemd160', $search_string);
	        	$search_load = $this->cache->get('search_'.$search_hash);
	        	if($search_load == "") {
		        	$search_load = loadFile($search_string);	
		        	$this->cache->file->save('search_'.$search_hash, $search_load, 900); // 15 minutes cache
	        	}
	        	
	        	$search_results_json = json_decode($search_load);
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$page = 0;
				$page_count = ceil($result_count / 66);
				
				$pagination_url = "/discover/p";
				
				// Get Verified Mods
				$verified_mods = json_decode(loadFile(SEARCH_ENGINE_URI . "/verified_moderators"));
				
				$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
				
				
				$data = array('listings' => $results, 'total' => $result_count, 'q'=> '', 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);
				
				foreach($results as $listing) {
					//print_r($listing->data->thumbnail->small);
				}
				
				$this->load->view('header', array('body_class' => 'search'));
                $this->load->view('discover', $data);
                $this->load->view('footer');
        }
        
        public function categories()
        {
	        	$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	
	        	$categories = array('electronics', 'books', 'art', 'clothing', 'bitcoin', 'handmade', 'health', 'toys', 'crypto', 'games', 'music');
	        	shuffle($categories);
	        	
	        	$search_results = array();
	        	        		        		        	
	        	foreach($categories as $category) {
	        		$search_string = SEARCH_ENGINE_URI . "/listings/random?q=$category&size=8";
		        	$search_hash = hash('ripemd160', $search_string);
		        	$search_load = $this->cache->get('search_'.$search_hash);
		        	if($search_load == "") {
			        	$search_load = loadFile($search_string);	
			        	$this->cache->file->save('search_'.$search_hash, $search_load, 3600); // 60 minutes cache
		        	}
		        	
		        	$search_results[$category] = json_decode($search_load)->results->results;
		        	shuffle($search_results[$category]);
	        	}
	        		        					
				// Get Verified Mods
				$verified_mods = json_decode(loadFile(SEARCH_ENGINE_URI . "/verified_moderators"));
				
				// Featured Stores
				$featured_store_ids = array('QmNXuCT38vxa3dsows3tVcgxPod4DbLksh2czaPPHwmo9u',
					'QmcUDmZK8PsPYWw5FRHKNZFjszm2K6e68BQSTpnJYUsML7',
					'QmaNKgLff6gqs5tSFxbsKhuGrLwhAW74MMUuoLeTNgPmnp',
					'QmbmytVomWgsBW74QgyPdh17adoPBJeo2g7scihNPAjMmy', 
					'QmU5ZSKVz2GhsqE6EmBGVCtrui4YhUXny6rbvsSf5h2xvH', 
					'QmTmCkNLUcPGvf3mSYDme4UQudgn9oCVqE13GHnrF6sjLj', 
					'QmZZHp2P4zj71p1qhCZKVfrmGKBfvuQfCWfG4ujFgC3pTc', 
					'Qmc8UtpPxWD51TSVEi5Pnb6jjJSVBmi93oevL4EyUbEBLf', 
					'QmXjNwM5yxWcCzvyEn9LdNwY6a66XQSzGUK1q5jaj9tZR2',
					'QmTHCE9EEcDi9mZqdp2JF61n4fkYRjSJbRxYwtoY7ofjJp');
				shuffle($featured_store_ids);
				$featured_store_ids = array_slice($featured_store_ids, 0, 3);			
				
				$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
								
				$crypto_listings = get_crypto_listings();
				$crypto_listings = $crypto_listings->results->results;
								
				$data = array('featured_stores'=>$featured_store_ids, 'crypto_listings'=>$crypto_listings, 'categories'=>$categories, 'search_results' => $search_results,  'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);

				
				$this->load->view('header', array('body_class' => 'discover'));
                $this->load->view('discover_categories', $data);
                $this->load->view('footer');
        }
        
        public function results($page=0)
        {				
			$decoded_term = isset($_GET['q']) ? $_GET['q'] : "";	
			parse_str($_SERVER['QUERY_STRING'], $query_string);			
			
			if(!isset($query_string['q']) || $query_string['q'] == "") {
				$query_string['q'] = "*";
				$q = "";
			} else {
				$q = urlencode($decoded_term);	
			}
			$query_string['p'] = $page;
			$query_string['ps'] = "66";
			
			$new_query_string = http_build_query($query_string);
					        
	        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

			$search_string = SEARCH_ENGINE_URI . "/search/listings?".$new_query_string;

        	$search_hash = hash('ripemd160', $search_string);
        	$search_load = $this->cache->get('search_'.$search_hash);
        	if($search_load == "") {
	        	$search_load = loadFile($search_string);	
	        	$this->cache->file->save('search_'.$search_hash, $search_load, 900); // 15 minutes cache
        	}

			$search_results_json = json_decode($search_load);
			$search_options = $search_results_json->options;
			$search_sorts = $search_results_json->sortBy;
			
			$results = $search_results_json->results->results;
			$result_count = $search_results_json->results->total;
			
			
			$page_count = ceil($result_count / 66);
			
			$pagination_url = "/results/";
			
			// Get Verified Mods
			$verified_mods = json_decode(loadFile(SEARCH_ENGINE_URI . "/verified_moderators"));
			
			$countries = file_get_contents(asset_url().'js/countries.json');
	        $countries = json_decode($countries, true);	    
	        
			$data = array('search_options'=>$search_options, 'search_sorts'=>$search_sorts, 'listings' => $results, 'total' => $result_count, 'q' => $decoded_term, 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries, 'query_string'=>$query_string);


	        $this->load->view('header', array('page_title'=>$decoded_term.' - ', 'body_class' => 'search'));
	        $this->load->view('discover', $data);
                $this->load->view('footer');	        
        }
        
        public function p($page=0)
        {
	        	$acceptedCurrencies = (isset($_GET['acceptedCurrencies'])) ? $_GET['acceptedCurrencies'] : "BTC";
	        	$search_load = loadFile(SEARCH_ENGINE_URI . "/search/listings?q=*&network=mainnet&p=".$page."&ps=66&moderators=all_listings&nsfw=false&acceptedCurrencies=BTC");
				$search_results_json = json_decode($search_load);
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$page_count = ceil($result_count / 66);
				
				$pagination_url = "/discover/p";
				
				// Get Verified Mods
				$verified_mods = json_decode(loadFile(SEARCH_ENGINE_URI . "/verified_moderators"));
				
				$countries = file_get_contents(asset_url().'js/countries.json');
	        	$countries = json_decode($countries, true);
				
				$data = array('accepted_currencies'=>$acceptedCurrencies, 'listings' => $results, 'total' => $result_count, 'q'=> '', 'page'=>$page, 'page_count'=>$page_count, 'pagination_url'=>$pagination_url, 'verified_mods'=>$verified_mods->moderators, 'countries'=>$countries);				
				
				$this->load->view('header', array('body_class' => 'listings'));
                $this->load->view('discover', $data);
                                $this->load->view('footer');
        }

        // when someone visits OpenBazaar.com/trade redirect to the cryptocurrency listings 
        public function trade(){
        	redirect('discover/results/?type=cryptocurrency', 'refresh');
        }

        // when someone visits OpenBazaar.com/trade/[coin] redirect to [coin] cryptocurrency listings 
        public function cryptocurrency($coin){
        	redirect('discover/results/?type=cryptocurrency&b0_coinType='. $coin .'', 'refresh');
        }
}