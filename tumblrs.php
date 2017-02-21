<?php
	require('../../../wp-blog-header.php');
	require_once("lib/tumblr/OAuth.php");
	require_once("lib/tumblr/tumblrPHP.php"); 
	require("lib/settings.php");
	$client = new Tumblr($tupublic, $tusecret);
	$content = $client->get("/blog/modderpoel.tumblr.com/posts", array("type" => "photo", "limit" => 50));	

	$content = json_encode($content);

	print_r($content);

?>