<?php
function fourChan(){
$feedJSON=file_get_contents('http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&q=http://4chanarchive.org/brchive/rss/b.xml');
$feed=json_decode($feedJSON,true);
$feedData=$feed["responseData"]["feed"]["entries"];
$x=0;
foreach ($feedData as $entry)
{
$data[$x][0]=$entry["title"];
// $data[2]=$entry["content"];
$pos1 = strpos($entry["content"], '<img src="') + strlen('<img src="');
$pos2 = strpos($entry["content"], '"', (strpos($entry["content"], '<img src="') + strlen('<img src="'))) - $pos1;
$linky= substr($entry["content"], $pos1, $pos2);
$data[$x][1]="scrapers/image.php?img=".str_replace("/rc", "", $linky);
$data[$x][2]="pageloader.php?page=".$entry["link"];
$x++;
}

return $data;
}
?>
<?php 
// <img src="http://immediatenet.com/t/fs?Size=1280x1024&URL=$url"/>
?>