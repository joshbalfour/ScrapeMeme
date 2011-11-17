<?php
function reddit($subreddit)
{
if ($subreddit==''){$subreddit='pics';};
$feedJSON=file_get_contents('http://www.reddit.com/r/'.$subreddit.'/top/.json');
$feed=json_decode($feedJSON,true);
$x=0;
foreach ($feed["data"]["children"] as $entry)
{
	$item=$entry["data"];
	$singleitem[$x][0]=str_replace('"', "'", $item["title"]);
	$singleitem[$x][1]=$item["url"];
	$x++;
}
return($singleitem);
}
?>