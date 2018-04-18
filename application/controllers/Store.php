<?php
class Store extends CI_Controller {

        public function index()
        {
/*
	        	$search_load = file_get_contents("https://search.ob1.io/search/listings?q=*&network=mainnet&p=0&ps=64&nsfw=false&acceptedCurrencies=BTC");
				$search_results_json = json_decode($search_load);
				
				$results = $search_results_json->results->results;
				$result_count = $search_results_json->results->total;
				
				$data = array('listings' => $results, 'total' => $result_count, 'term'=> '');

				
		        $this->load->view('header');
                $this->load->view('discover', $data);
*/
        }
        
        public function listing($peerID, $slug) {
	        	
	        	$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	
	        	$profile_load = $this->cache->get('profile_'.$peerID);
	        	if($profile_load == "") {
		        	$profile_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/profile.json");	
		        	$this->cache->file->save('profile_'.$peerID, $profile_load, 900); // 15 minutes cache
	        	}
	        	
	        	$profile = json_decode($profile_load);
	        	
	        	$listing_load = $this->cache->get('listing_'.$slug);
	        	if($listing_load == "") {
	        		$listing_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/listings/".$slug.".json");
	        		$this->cache->file->save('listing_'.$slug, $listing_load, 5400); // 60 minutes cache
				}
				$listing = json_decode($listing_load);
				
				$rating = 0;
				$rating_count = 0;
				
				$listing_ratings = array();
				
				
				try {
					$ratings_load = @file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/ratings.json");
					
					if($ratings_load !== FALSE) {
						$ratings = json_decode($ratings_load);
						
						foreach($ratings as $r) {
							if($r->slug == $listing->listing->slug) {
								$rating = $r->average;
								$rating_count = $r->count;
								$listing_ratings = $r->ratings;
							}
						}
					}
				} catch(Exception $e) {
					
				}
				
				// Grab ratings data files
				$reviews = array();
				foreach($listing_ratings as $r) {
					$review_load = file_get_contents("https://gateway.ob1.io/ipfs/".$r);
					$review_json = json_decode($review_load);
					array_push($reviews, $review_json);
				}
				
				
				$data = array('profile' => $profile, 'listing' => $listing->listing, 'rating'=>$rating, 'ratings'=>$rating_count, 'reviews'=>$reviews);
				
				
		        $this->load->view('header', array('page_title'=>$listing->listing->item->title.' - '.$profile->name.' - '));
                $this->load->view('store_listing', $data);
                $this->load->view('footer');

        }
        
        public function listings($peerID) {
	        
	        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	
        	$profile_load = $this->cache->get('profile_'.$peerID);
        	if($profile_load == "") {
	        	$profile_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/profile.json");	
	        	$this->cache->file->save('profile_'.$peerID, $profile_load, 900); // 15 minutes cache
        	}
        	
        	$profile = json_decode($profile_load);
        	
        	$header_image = isset($profile->headerHashes);
        	
        	$listings_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/listings.json");
			$listings = json_decode($listings_load);
			
			$categories = array();
			foreach($listings as $listing) {
				foreach($listing->categories as $category) {
					array_push($categories, $category);
				}
			}
			$categories = array_unique($categories);
        	
	        
	        $data = array('profile' => $profile, 'header_image'=> $header_image, 'listings'=>$listings, 'categories'=>$categories);
	        
	        $this->load->view('header', array('page_title'=>$profile->name.' - Store - '));
	        $this->load->view('store_meta', $data);
	        $this->load->view('store_listings', $data);
	        $this->load->view('footer');
        }
        
        public function home($peerID) {
	        
	        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	
        	$profile_load = $this->cache->get('profile_'.$peerID);
        	if($profile_load == "") {
	        	$profile_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/profile.json");	
	        	$this->cache->file->save('profile_'.$peerID, $profile_load, 900); // 15 minutes cache
        	}
        	
        	$profile = json_decode($profile_load);
        	
        	$header_image = isset($profile->headerHashes);
        	        	
        	
	        $data = array('profile' => $profile, 'header_image'=> $header_image);
	        
	        $this->load->view('header');
	        $this->load->view('store_meta', $data);
	        $this->load->view('store_home', $data);
	        $this->load->view('footer');
        }
        
        public function followers($peerID) {
	        
	        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	        	
        	$profile_load = $this->cache->get('profile_'.$peerID);
        	if($profile_load == "") {
	        	$profile_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/profile.json");	
	        	$this->cache->file->save('profile_'.$peerID, $profile_load, 900); // 15 minutes cache
        	}
        	
        	$profile = json_decode($profile_load);
        	
        	$header_image = isset($profile->headerHashes);

	        $followers_load = file_get_contents("https://gateway.ob1.io/ipns/".$peerID."/followers.json");
        	$followers = json_decode($followers_load);        	        	
        	
	        $data = array('profile' => $profile, 'header_image'=> $header_image, 'followers'=>$followers);
	        
	        $this->load->view('header');
	        $this->load->view('store_meta', $data);
	        $this->load->view('store_followers', $data);
			$this->load->view('footer');
        }
        
}