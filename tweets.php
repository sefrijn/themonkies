<?php
	require('../../../wp-blog-header.php');
	require_once("lib/twitter/autoload.php"); 
	// require_once("lib/twitter/src/TwitterOAuth.php"); 
	// require_once("lib/twitter/src/Util/JsonDecoder.php");
	require("lib/settings.php");
	use Abraham\TwitterOAuth\TwitterOAuth;
	$connection = new TwitterOAuth($twpublic, $twsecret);
	$content = $connection->get("statuses/user_timeline", array("screen_name" => "sefrijn", "exclude_replies" => true, "count" => 15));

	$content = json_encode($content);

	print_r($content);

?>