
<html>

<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "766433278224130048-H2Lmj1YB576QZaloIYMDYge0N0ZTqJi",
    'oauth_access_token_secret' => "		f0dr3ozaUBAOwlfGMGmxBATISPgMMu0IDmdNEa3Yoh2wZ",
    'consumer_key' => "	p59lOGqKXVIYU0lYaOxOf9weN",
    'consumer_secret' => "	RQkpACq4GIdFoME3brBPfHeLsxPCc86dTbfA8aPh3GHn9XsNZg
"
);
/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';
/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock',
    'skip_status' => '1'
);
/** Perform a POST request and echo the response **/
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

</html>
