<?php
/*
grabs the title and URL from the top entries in the given subreddit and returns them in array format:
array[key] ( "title" => title, "url" => url )
*/
function reddit($subreddit)
{
if ($subreddit==''){$subreddit='pics';}; //if not given a subreddit defaults to /r/pics
$feedJSON=file_get_contents('http://www.reddit.com/r/'.$subreddit.'/top/.json'); //grabs the top items in JSON form from reddit
$feed=json_decode($feedJSON,true); //decodes the json into an array
$x=0; //sets x as 0
foreach ($feed["data"]["children"] as $entry) // for each entry 
{
	$item=$entry["data"]; //assign the data from the entry to a variable
	$items[$x][0]=str_replace('"', "'", $item["title"]); // these two lines assign the data we really need (title and url) to an array
	$items[$x][1]=$item["url"];
	$x++; //increment x
}
return($items); //this then returns the array we created earlier of the title and URL from the top entries in the desired subreddit
}
?>