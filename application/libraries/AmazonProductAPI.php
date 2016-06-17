<?php

   // require_once 'aws_signed_request.php';
   
    class AmazonProductAPI
    {    
       	private $public_key = 'AKIAJAEBK24RL75QBJ2Q';
       	private $private_key = 'KlOjhZ1hIM2TaJ/cwbX4hHJkIr+GW3NrZJssr/oh';
        
        /**
         * Constants for product types
         * @access public
         * @var string
         */
        
        /*
            Only three categories are listed here. 
            More categories can be found here:
            http://docs.amazonwebservices.com/AWSECommerceService/latest/DG/APPNDX_SearchIndexValues.html
            
            There are more Types too!
            http://docs.amazonwebservices.com/AWSECommerceService/2010-09-01/DG/
        */

        const TYPE_UPC = "UPC";
        const TYPE_TITLE = "Title";
        const TYPE_ARTIST = "Artist";
        const TYPE_KEYWORDS = "Keywords";
		const CATEGORY_MUSIC = "Music";
		const CATEGORY_DVD = "DVD";
		const CATEGORY_BOOKS = "Books";
		const CATEGORY_VIDEO_GAMES = "VideoGames";
		const CATEGORY_MP3_DOWNLOADS = "MP3Downloads"; // not well documented
		const CATEGORY_MUSIC_TRACKS = "MusicTracks"; // even less well documented
		const RESPONSE_GROUP_SMALL = "Small";
		const RESPONSE_GROUP_MEDIUM = "Medium";
		const RESPONSE_GROUP_LARGE = "Large";
		const RESPONSE_GROUP_RELATED_ITEMS = "RelatedItems";
		const RESPONSE_GROUP_IMAGES = "Images";
		const RESPONSE_GROUP_ITEM_ATTRIBUTES = "ItemAttributes";
		const RESPONSE_GROUP_TRACKS = "Tracks";
        
        

        function __construct() 
        {
       		// Nothing to see here now
   		}
        
        
        
        /**
         * Check if the xml received from Amazon is valid
         * 
         * @param mixed $response xml response to check
         * @return bool false if the xml is invalid
         * @return mixed the xml response if it is valid
         * @return exception if we could not connect to Amazon
         */
        private function verifyXmlResponse($response)
        {
            if ($response === False)
            {
                throw new Exception("Could not connect to Amazon");
            }
            else
            {
                if (isset($response->Items->Item->ItemAttributes->Title))
                {
                    return ($response);
                }
                else
                {
                    throw new Exception("Invalid xml response, but why?");  // This happens as the original author's method ie this one, only considers one ResponseGroup, I need to use different ones...
                    // So I don't call this method much as it throws an error and this method doesn't do much anyway.
                }
            }
        }
        
        
        
        /**
         * Query Amazon with the issued parameters
         * 
         * @param array $parameters parameters to query around
         * @return simpleXmlObject xml query response
         */
        private function queryAmazon($parameters)
        {
        	// Since I querry amazon always with this, I should put in the associate tag here, now that it is required.
        	// I bet Amazon did this just to see who is paying attention while using their old product API...
        	$parameters["AssociateTag"] = 'sineco-21';
        	/*
        	print("<pre>");
        	print_r("About to querry Amazon with the following parameters: ");
        	print_r($parameters);
        	print("</pre>");
        	*/
        	$obj = new Aws_signed_request();
            return $obj->aws_signed_request("in", $parameters, $this->public_key, $this->private_key);
        }
        
        
        
        /**
         * Return details of products searched by various types
         * 
         * @param string $searchTerm search term
         * @param string $category search category         
         * @param string $searchType type of search
         * @return mixed simpleXML object
         */
        public function searchProducts($searchTerm, $category, $searchType , $responseGroup , $BrowseNode , $ItemPage)
        {
			
            switch($searchType) 
            {
               	case "Keywords" :  $parameters = array("Operation"   => "ItemSearch",
                                                    	"Keywords"     => $searchTerm,
                                                    	"SearchIndex"   => $category,
                                                    	"ResponseGroup" => $responseGroup);
                                break;
                case "Artist" :  $parameters = array("Operation"     => "ItemSearch",
                                                    "Artist"         => $searchTerm,
                                                    "SearchIndex"   => $category,
                                                    "ResponseGroup" => $responseGroup);  
                                break;
                case "UPC" :    $parameters = array("Operation"     => "ItemLookup",
                                                    "ItemId"        => $searchTerm,
                                                    "SearchIndex"   => $category,
                                                    "IdType"        => AmazonProductAPI::TYPE_UPC,
                                                    "ResponseGroup" => $responseGroup);
                                break;
                
                case "TITLE" :  $parameters = array("Operation"     => "ItemSearch",
                                                    "Title"         => $searchTerm,
                                                    "SearchIndex"   => $category,
													"BrowseNode"	=> $BrowseNode,
													"ItemPage"		=> $ItemPage,
                                                    "ResponseGroup" => $responseGroup);
                                break;
            
            }
            
            $xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;  // I don't trust his verify code much...

        }
        
        
        /**
         * Return details of a product searched by UPC
         * 
         * @param int $upc_code UPC code of the product to search
         * @param string $product_type type of the product
         * @return mixed simpleXML object
         */
        public function getItemByUpc($upc_code, $product_type)
        {
            $parameters = array("Operation"     => "ItemLookup",
                                "ItemId"        => $upc_code,
                                "SearchIndex"   => $product_type,
                                "IdType"        => AmazonProductAPI::TYPE_UPC,
                                "ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_MEDIUM);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $this->verifyXmlResponse($xml_response);

        }
        
        
        /**
         * Return details of a product searched by ASIN
         * 
         * @param int $asin_code ASIN code of the product to search
         * @return mixed simpleXML object
         */
        public function getItemByAsin($asin_code)
        {
            $parameters = array("Operation"     => "ItemLookup",
                                "ItemId"        => $asin_code,
                                "ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_MEDIUM);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $this->verifyXmlResponse($xml_response);
        }
        
		public function getItemByAsinNode($asin_code)
        {
            $parameters = array("Operation"     => "BrowseNodeLookup ",
                                "ItemId"        => $asin_code,
                                "ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_MEDIUM);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $this->verifyXmlResponse($xml_response);
        }
        
        
        /**
         * Return more item attributes of a product looked up by ASIN
         * 
         * @param int $asin_code ASIN code of the product to search
         * @return mixed simpleXML object
         */
        public function getItemAttributesByAsin($asin_code)
        {
            $parameters = array("Operation"     => "ItemLookup",
                                "ItemId"        => $asin_code,
                                "ResponseGroup" => 'ItemAttributes,Images');
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;//$this->verifyXmlResponse($xml_response);
        }
        
        
        
        /**
         * Return details of related items to the one whose ASIN is passed in
         * 
         * @param int $asin_code ASIN code of the product to look for related items too
         * @return mixed simpleXML object
         */
        public function getRelatedItemsByAsin($asin_code)
        {
			$parameters = array("Operation"     => "ItemLookup",
								"ItemId"        => $asin_code,
								"ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_RELATED_ITEMS,
								"RelationshipType" => "AuthorityTitle");
							
			$xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;
        }
        
        
        
        /**
         * Returns the tracks for the product whose ASIN is passed in, could very well return nothing or throw an error...
         * 
         * @param int $asin_code ASIN code of the product to look for related items too
         * @return mixed simpleXML object
         */
        public function getRelatedTracksToAsin($asin_code)
        {
			$parameters = array("Operation"     => "ItemLookup",
								"ItemId"        => $asin_code,
								"ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_RELATED_ITEMS,
								"RelationshipType" => "Tracks");
							
			$xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;
        }
        
        
        /**
         * Return details of a product searched by keyword
         * 
         * @param string $keyword keyword to search
         * @param string $product_type type of the product
         * @return mixed simpleXML object
         */
        public function getItemByKeyword($keyword, $product_type)
        {
            $parameters = array("Operation"   => "ItemSearch",
                                "Keywords"    => $keyword,
                                "SearchIndex" => $product_type);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $this->verifyXmlResponse($xml_response);
        }
        
        
        
        /**
         * Return the tracks found on an album, have to page to get them all which this method doesn't do.
         * 
         * @param string $albumTitle 
         * @param string $artist
         * @return mixed simpleXML object
         */
        public function getMP3sForAlbumByArtist($albumTitle, $artist)
        {
        	$searchTerm = $albumTitle . ' ' . $artist;
            $parameters = array("Operation"   => "ItemSearch",
                                "Keywords"    => $searchTerm,
                                "SearchIndex" => AmazonProductAPI::CATEGORY_MP3_DOWNLOADS,
                                "ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_TRACKS);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;
        }
        
        
        
        /**
         * Return the tracks found on a song title and artist
         * 
         * @param string $songTitle 
         * @param string $artist
         * @return mixed simpleXML object
         */
        public function getMP3ForSongByArtist($songTitle, $artist)
        {
        	$searchTerm = $songTitle . ' ' . $artist;
            $parameters = array("Operation"   => "ItemSearch",
                                "Keywords"    => $searchTerm,
                                "SearchIndex" => AmazonProductAPI::CATEGORY_MP3_DOWNLOADS,
                                "ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_TRACKS);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;
        }
        
        
        
        /**
         * Return details of a product searched by keyword, I limit my search to Books, I use Image Response Group, because I'm used to it.
         * 
         * @param string $keyword keyword to search
         * @return mixed simpleXML object
         */
        public function getBookForKeyword($keyword)
        {
            $parameters = array("Operation"   => "ItemSearch",
                                "Keywords"    => $keyword,
                                "SearchIndex" => AmazonProductAPI::CATEGORY_BOOKS,
                                "ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_IMAGES);
                                
            $xml_response = $this->queryAmazon($parameters);
            
            return $xml_response;
        }
        
        
        
         /**
         * Return details of a product searched by artist and title
         * 
         * @param string $artist responsible
         * @param string $title of album
         * @return mixed simpleXML object
         */
         public function getAlbumCoverByArtistAndTitle($artist, $title)
         {
         	// I'm thinking of adding the keyword CD to the search...  It changes the results but not necessarily for the better...
         	$parameters = array("Operation" => "ItemSearch",
         						"Title" => $title,
         						"Artist" => $artist,
         						"SearchIndex" => AmazonProductAPI::CATEGORY_MUSIC,
         						"ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_IMAGES);
         						
         	$xml_response = $this->queryAmazon($parameters);
         	
			// print_r($xml_response);
            
            return $xml_response;
         }
         
         
    	/**
         * Return details of a product searched by artist (songwriter), IE their most popular album
         * 
         * @param string $artist responsible
         * @return mixed simpleXML object
         */
         public function getInfoForSongwriter($artist)
         {
         	$parameters = array("Operation" => "ItemSearch",
         						"Artist" => $artist,
         						"SearchIndex" => AmazonProductAPI::CATEGORY_MUSIC,
         						"ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_IMAGES);
         						
         	$xml_response = $this->queryAmazon($parameters);
         	
			// print_r($xml_response);
            
            return $xml_response;
         }
         
         
        /**
         * Return details of a product searched by DVD title
         * 
         * @param string $title of film
         * @return mixed simpleXML object
         */
         public function getDVDCoverByTitle($title)
         {
         	$parameters = array("Operation" => "ItemSearch",
         						"Title" => $title,
         						"SearchIndex" => AmazonProductAPI::CATEGORY_DVD,
         						"ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_IMAGES);
         						
         	$xml_response = $this->queryAmazon($parameters);
         	
			// print_r($xml_response);		
            
            return $xml_response;
         }
        
        
        
    	/**
         * Return details of a product searched by DVD title and director
         * 
         * @param string $title of film
         * @param string $director of film
         * @return mixed simpleXML object
         */
         public function getDVDCoverByTitleAndDirector($title, $director)
         {
         	$parameters = array("Operation" => "ItemSearch",
         						"Title" => $title,
         						"Director" => $director,
         						"SearchIndex" => AmazonProductAPI::CATEGORY_DVD,
         						"ResponseGroup" => AmazonProductAPI::RESPONSE_GROUP_IMAGES);
         						
         	$xml_response = $this->queryAmazon($parameters);
         	
			// print_r($xml_response);
            
            return $xml_response;
         }

    }

?>
