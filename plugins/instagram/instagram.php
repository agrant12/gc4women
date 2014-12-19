<?php 
	/*
	Plugin Name: Instagram Photos
	Version: 1.0
	Plugin URI: http://gc4women.org
	Description: Pull Images from Instagram API
	Author: Alvin Grant
	Author URI: http://alvingrant.com
	*/

	function instagram() {

		//Instagram credentials
		$clientID = '3e616eaf353748e49375fb4b1569cd51';
		$apiHost = 'https://api.instagram.com';

		//Search Tag needs to be moved to admin
		$tag = 'dog';

		//Construct url to retrieve data from Instagram API
		$url = $apiHost . '/v1/tags/' . $tag . '/media/recent?callback=?&client_id=' . $clientID;

		//Get API contents then decode results
		$json = file_get_contents($url);
		$obj = json_decode($json);

		//Assign data from API to variable
		$instagram_photos = $obj->data;

		//echo "<pre>";
		//var_dump($instagram_photos);
	?>
	<section>
		<?php foreach ($instagram_photos as $key => $photo) : ?>
			<a href="<?php echo $photo->link; ?>"><img src="<?php echo $photo->images->low_resolution->url; ?>" /></a>
			<span><?php echo $photo->likes->count; ?></span>
			<span><img src="<?php echo $photo->user->profile_picture; ?>" /></span>
		<?php endforeach; ?>
	</section>
<? }