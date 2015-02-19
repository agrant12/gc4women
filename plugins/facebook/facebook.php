<?php
/**
* Facebook client to retrieve GC4W timeline
*/

// Skip these two lines if you're using Composer
define('FACEBOOK_SDK_V4_SRC_DIR', '/facebook-php-sdk-v4/src/Facebook/');
require __DIR__ . '/facebook-php-sdk-v4/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('369808103183839','42874825214206b4c6e56ef7a2dbb669');

// Use one of the helper classes to get a FacebookSession object.
//   FacebookRedirectLoginHelper
//   FacebookCanvasLoginHelper
//   FacebookJavaScriptLoginHelper
// or create a FacebookSession with a valid access token:
$session = new FacebookSession('access-token-here');

// Get the GraphUser object for the current user:
function get_facebook_timeline() {
	try {
		$me = (new FacebookRequest(
			$session, 'GET', '/me'
		))->execute()->getGraphObject(GraphUser::className());
		echo $me->getName();
	} catch (FacebookRequestException $e) {
		// The Graph API returned an error
	} catch (\Exception $e) {
		// Some other error occurred
	}
}

?>