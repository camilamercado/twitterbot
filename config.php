
<?php
require_once('twitteroauth.php');

define('CONSUMER_KEY', 'v9pdqyAtmhV9rXwrMGsTvw');
define('CONSUMER_SECRET', 'GPcGiHPHEW7zUXl3kYcn3C6mzHcRbjEagJsqTCthwE');
define('ACCESS_TOKEN', '856935888-paVb8UN6nLMgSktoPFeAIaJF82ok0gU5wJY2So');
define('ACCESS_TOKEN_SECRET', 'IHPrKdiynH2F6IXSf6pFhNToCTs61VwXdfH51j7Ck');

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
$twitter->host = "http://search.twitter.com/";
$search = $twitter->get('search', array('q' => '@Give_Y_G', 'rpp' => 15));

$twitter->host = "https://api.twitter.com/1/";
foreach($search->results as $tweet) {
	$status = 'RT @'.$tweet->from_user.' '.$tweet->text;
	if(strlen($status) > 140) $status = substr($status, 0, 139);
	$twitter->post('statuses/update', array('status' => $status));
}

?>
