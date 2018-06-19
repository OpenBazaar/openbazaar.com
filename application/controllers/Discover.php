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
				$featured_store_ids = array(
					'QmcUDmZK8PsPYWw5FRHKNZFjszm2K6e68BQSTpnJYUsML7', // OpenBazaar Store
					'QmaNKgLff6gqs5tSFxbsKhuGrLwhAW74MMUuoLeTNgPmnp', // The Queendoms of Plameo
					'QmbmytVomWgsBW74QgyPdh17adoPBJeo2g7scihNPAjMmy', // Crypto Greeting Cards
					'QmU5ZSKVz2GhsqE6EmBGVCtrui4YhUXny6rbvsSf5h2xvH', // Crypto Republic - BCH
					'QmTmCkNLUcPGvf3mSYDme4UQudgn9oCVqE13GHnrF6sjLj', // LickyGiraffe's D&D Store
					'QmZZHp2P4zj71p1qhCZKVfrmGKBfvuQfCWfG4ujFgC3pTc', // Efilenka [BCH store]
					'QmeSyTRaNZMD8ajcfbhC8eYibWgnSZtSGUp3Vn59bCnPWC', // Matthew Zipkin
					'QmdZAYUqCD8KnmN1grkS9nLVmkYc8FXNygH2c4zCqpyp4X', // BananaLotus Creations - BTC
					'QmVqt2oBKQ67RhmwejX67D49VFXmPy3SwyRYNMQ5WDmFVM', // mazaclub - BTC
					'QmTHCE9EEcDi9mZqdp2JF61n4fkYRjSJbRxYwtoY7ofjJp'  // The Store @ Bitcoin.com
				);
				shuffle($featured_store_ids);
				$featured_store_ids = array_slice($featured_store_ids, 0, 2);	
				array_unshift($featured_store_ids, 'Qmd9hFFuueFrSR7YwUuAfirXXJ7ANZAMc5sx4HFxn7mPkc');		
				
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
			$decoded_term = filter_var($decoded_term, FILTER_SANITIZE_STRING);
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
	        	$_GET['acceptedCurrencies'] = filter_var($_GET['acceptedCurrencies'], FILTER_SANITIZE_STRING);
	        		        	
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
        
        public function manage() {

			// If login form submitted hash the password for authentication	        
	        $form_hash = (isset($_POST['password'])) ? hash("sha256", $_POST['password']) : "";	  
	          
	        if((isset($_SESSION['authenticated']) && $_SESSION['authenticated'] ==1) || strtoupper($form_hash) == WIDGET_PASS) {
		        
		        $_SESSION['authenticated'] = true;
		        
		        $sql = "SELECT * FROM codes";
				$result = $this->db->query($sql);
		        
		        $this->load->view('header', array('page_title'=>'Manage Giveaway - '));
	        	$this->load->view('manage', array('codes'=>$result->result_array()));
	        	$this->load->view('footer');
	        } else {
		        $this->load->view('header', array('page_title'=>'Login - '));
				$this->load->view('login');
	        	$this->load->view('footer');
	        }
        }     
        
        public function togglecode() {
	        if(!isset($_SESSION['authenticated'])) {
		        return;
	        } else {
				
		        $claimed = ($_GET['claimed'] == "true") ? 1 : 0;
		        $code = $_GET['code'];
		        
		        $sql = "UPDATE codes SET claimed = ? WHERE code = ?";

				$this->db->query($sql, array($claimed, $code));
	        }
        }   

        // for special offer promotions e.g. bitcoin $10 give away
        public function promotion(){
        	$this->load->helper('string');
        	
        	$code = $this->base62hash(hash("sha512", $this->getUserIP()));
        	
        	$sql = "SELECT * FROM codes WHERE code = '$code'";
	        $result = $this->db->query($sql);
        	        	
        	if($result->result_id->num_rows == 0) {
	        	$sql = "INSERT INTO codes (code, timestamp) VALUES (?, ?)";				
			}
        	
        	$data = array('code'=>$code);
        	$this->load->view('header', array('page_title'=>'Get $10 towards your first purchase on ', 'body_class' => 'promotion'));
        	$this->load->view('promotion', $data);
        	$this->load->view('footer');
        }
        
        public function hidebanner() {
	        $_SESSION['hidebanner'] = true;
	        return;
        }
        
        private function base62hash($source) {
		    return gmp_strval(gmp_init(md5($source), 16), 62);
		}
        
        public function stats() {
	        
	        $data = array();

			$db = $this->load->database('stats', TRUE);
			
			$listings_count = json_decode(file_get_contents("https://search.ob1.io/search/listings?q=*&network=mainnet&p=0&ps=24&acceptedCurrencies="));
			$listings_count = $listings_count->results->total;
			
			$sql = "SELECT count(*) as c FROM nodes";
	        $result = $db->query($sql);	
	        $results = $result->result_array();
	        $total_nodes = $results[0]['c'];
	        
	        $sql = "select count(*) as c from nodes WHERE first_seen >= now() - INTERVAL 1 DAY;";
	        $result = $db->query($sql);
	        $results = $result->result_array();
	        $nodes_in_24 = $results[0]['c'];
	        
	        $sql = "select count(*) as c from nodes WHERE vendor = 1;";
	        $result = $db->query($sql);
	        $results = $result->result_array();
	        $vendors = $results[0]['c'];
	        
			
			// Nodes
			$sql = "SELECT DATE_FORMAT(first_seen, '%M %Y') as month, count(*) as c FROM nodes GROUP BY DATE_FORMAT(first_seen, '%Y%m')";
	        $result = $db->query($sql);	
	        $results = $result->result_array();
	        
	        $nodes_x = array();
			$nodes_y = array();
	        foreach($results as $month) {
		        array_push($nodes_x, $month['month']);
		        array_push($nodes_y, $month['c']);
	        }
	        
	        $sql = "SELECT DATE_FORMAT(last_seen, '%M %Y') as month, count(*) as c FROM nodes GROUP BY DATE_FORMAT(last_seen, '%Y%m')";
	        $result = $db->query($sql);	
	        $results = $result->result_array();
	        
	        $lastnodes_x = array();
			$lastnodes_y = array();
	        foreach($results as $month) {
		        array_push($lastnodes_x, $month['month']);
		        array_push($lastnodes_y, $month['c']);
	        }
	        
	        $sql = "SELECT DATE_FORMAT(first_seen, '%M %Y') as month, count(*) as c FROM nodes
	        	GROUP BY DATE_FORMAT(first_seen, '%Y%m')";
	        $result = $db->query($sql);	
	        $results = $result->result_array();
	        
	        $lastnodes_x2 = array();
			$lastnodes_y2 = array();
	        foreach($results as $month) {
		        array_push($lastnodes_x2, $month['month']);
		        array_push($lastnodes_y2, $month['c']);
	        }
	        $lastnodes_x2 = array_slice($lastnodes_x2, -8);
			$lastnodes_y2 = array_slice($lastnodes_y2, -8);
			
			// Vendors
			$sql = "SELECT DATE_FORMAT(last_seen, '%M %Y') as month, count(*) as c FROM nodes WHERE vendor=1 GROUP BY DATE_FORMAT(last_seen, '%Y%m')";
	        $result = $db->query($sql);		        	        
	        $results = $result->result_array();

			$vendors_x = array();
			$vendors_y = array();
	        foreach($results as $month) {
		        array_push($vendors_x, $month['month']);
		        array_push($vendors_y, $month['c']);
	        }
	        
	        // Non-Vendors
			$sql = "SELECT DATE_FORMAT(last_seen, '%M %Y') as month, count(*) as c FROM nodes WHERE vendor <> 1 GROUP BY DATE_FORMAT(last_seen, '%Y%m')";
	        $result = $db->query($sql);		        	        
	        $results = $result->result_array();
	        	        	        
			$nonvendors_x = array();
			$nonvendors_y = array();
	        foreach($results as $month) {
		        array_push($nonvendors_x, $month['month']);
		        array_push($nonvendors_y, $month['c']);
	        }
	        
	        // Search queries
			$sql = "SELECT DATE_FORMAT(created_at, '%M %Y') as month, count(*) as c FROM search_requests WHERE query_terms <> '*' GROUP BY DATE_FORMAT(created_at, '%Y%m')";
	        $result = $db->query($sql);		        	        
	        $results = $result->result_array();
	        	        	        
			$search_x = array();
			$search_y = array();
	        foreach($results as $month) {
		        array_push($search_x, $month['month']);
		        array_push($search_y, $month['c']);
	        }


	        
	        $data = array_merge($data, array('totallistings'=>$listings_count, 'vendors'=>$vendors, 'nodes24'=>$nodes_in_24, 'totalnodes'=>$total_nodes, 'lastnodes_x'=>$lastnodes_x, 'lastnodes_y'=>$lastnodes_y,'lastnodes_x2'=>$lastnodes_x2, 'lastnodes_y2'=>$lastnodes_y2, 'nodes_x'=>$nodes_x, 'nodes_y'=>$nodes_y, 'vendors_x'=>$vendors_x, 'vendors_y'=>$vendors_y,'nonvendors_x'=>$nonvendors_x, 'nonvendors_y'=>$nonvendors_y, 'search_x'=>$search_x, 'search_y'=>$search_y));
	        
	        $this->load->view('header', array('page_title'=>'Network Statistics - '));
        	$this->load->view('stats', $data);
        	$this->load->view('footer');
        }
        
        public function storeindex() {
	        
	        $data = array();
	        
        	$sql = "SELECT DISTINCT name, guid, profile, id, created FROM stores ORDER BY created DESC";
	        $result = $this->db->query($sql);	        
			
			$data = array_merge($data, array('stores'=>$result->result_array()));
	        
	        $this->load->view('header', array('page_title'=>'Merchant Directory - '));
        	$this->load->view('merchant_directory', $data);
        	$this->load->view('footer');
        }        
        
        private function getUserIP() {
		    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
		        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
		            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
		            return trim($addr[0]);
		        } else {
		            return $_SERVER['HTTP_X_FORWARDED_FOR'];
		        }
		    }
		    else {
		        return $_SERVER['REMOTE_ADDR'];
		    }
		}  
}
