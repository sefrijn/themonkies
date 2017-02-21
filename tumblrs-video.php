<?php
	require('../../../wp-blog-header.php');
	require_once("lib/tumblr/OAuth.php");
	require_once("lib/tumblr/tumblrPHP.php"); 
	require("lib/settings.php");
	$client = new Tumblr($tupublic, $tusecret);
	$content = $client->get("/blog/modderpoel.tumblr.com/posts", array("type" => "video", "limit" => 10));	

	$content = json_encode($content);

	print_r($content);

?>