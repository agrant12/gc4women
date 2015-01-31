<?php 

include_once('TwitterAPIExchange.php');

function get_timeline() {
	$settings = array(
		'oauth_access_token' => "129943342-PyiqIzZ34o315ZvhADLTjYaPHmdj47xSarzXArBL",
		'oauth_access_token_secret' => "CBGTRIdV7du0O4kfYE2lUm4LNkT3ryafvbX2A7Iqd0",
		'consumer_key' => "D58jrZsvlnoBT3WybeaTSA",
		'consumer_secret' => "8HF72PpXL2SeHqI5oKkX056WruYeo8RUGfutyoGg0"
	);

	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	$requestMethod = 'GET';
	$getfield = '?screen_name=agrantdesigns&count=1';

	$twitter = new TwitterAPIExchange($settings);

	$tweets = array();

	$tweets = json_decode($twitter->setGetfield($getfield)
					->buildOauth($url, $requestMethod)
					->performRequest()
				);
	
	foreach ($tweets as $tweet) {
		echo $tweet->text;
	}

}

?>