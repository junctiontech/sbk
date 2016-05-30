	public function vcommission($value=false)
	{
		$json = "http://tools.vcommission.com/api/coupons.php?apikey=b7ea8d87c04b8ca5779acbabeee549dc8fe189a5ff5f1da61b004307efa06b3d";
		$response = file_get_contents($json);
		$mydecode = json_decode($response);
		print_r($mydecode);die;
		for ($i = 0; $i < 15; $i++) {
		$title = str_replace("&amp;", "&", $mydecode[$i]->coupon_title);
		$description = str_replace("&amp;", "&", $mydecode[$i]->coupon_description);
		$store_name = $mydecode[$i]->offer_name;
		$coupon_type = $mydecode[$i]->coupon_type;
		$coupon_code = $mydecode[$i]->coupon_code;
		$link = $mydecode[$i]->link;
		$expiry_date = $mydecode[$i]->coupon_expiry;
			if( $coupon_type === "Coupon" ) {
			// Check if already exists
			$get_page = get_page_by_title( $title );
			if ($get_page == NULL){
				// Insert post
				$new_post = array(
					'post_title' => $title,
					'post_content' => $description,
					'post_status' => 'draft',
					'post_author' => 1,
					'post_type' => 'coupon'
				);
				// Insert post
				$post_id = wp_insert_post($new_post);
				// Insert post meta if available  
				add_post_meta( $post_id, 'meta_key', 'meta_value' );  

				
			}
			}else{
				
				}
		}
		
	}
	
