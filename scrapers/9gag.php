<?php
function ninegag(){
$feedJSON=file_get_contents('http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&q=http://feeds2.feedburner.com/9GAG');
$feed=json_decode($feedJSON,true);
$feedData=$feed["responseData"]["feed"]["entries"];
$x=0;
foreach ($feedData as $feedItem)
{
$feedItemNabbed[$x][0]=$feedItem["title"];
$pos1 = strpos($feedItem["content"], '<img src="') + strlen('<img src="');
$pos2 = strpos($feedItem["content"], '">', (strpos($feedItem["content"], '<img src="') + strlen('<img src="'))) - $pos1;
$feedItemNabbed[$x][1]= substr($feedItem["content"], $pos1, $pos2);
$x++;
}
return($feedItemNabbed);
}
 
function lolninegag($number)
{
if ($number==0){$number='';};
$str=file_get_contents('http://9gag.com/hot/'.$number);
$pos1 = strpos($str, '<ul id="entry-list-ul" class="col-1">') + strlen('<ul id="entry-list-ul" class="col-1">');
$pos2 = strpos($str, '<!--end entry-list-->', (strpos($str, '<ul id="entry-list-ul" class="col-1">') + strlen('<ul id="entry-list-ul" class="col-1">'))) - $pos1;
$str2=substr($str, $pos1, $pos2);
$x=0;
while ($x < 10)
	{
	$pos1 = strpos($str2, '<div class="img-wrap">') + strlen('<div class="img-wrap">');
	$pos2 = strpos($str2, '</div>', (strpos($str2, '<div class="img-wrap">') + strlen('<div class="img-wrap">'))) - $pos1;
	$imagediv=substr($str2, $pos1, $pos2);
	$stuffs[$x]=getStuffs($imagediv);
	//var_dump($str2);
	$wholething = '<div class="img-wrap">'.$imagediv.'</div>';
	$str2=str_replace($wholething,"",$str2);
	$x++;
	}
return($stuffs);
}

function getStuffs($imagediv){
// find image
$pos3 = strpos($imagediv, 'src="') + strlen('src="');
$pos4 = strpos($imagediv, '"', (strpos($imagediv, 'src="') + strlen('src="'))) - $pos3;
$image=substr($imagediv, $pos3, $pos4);


// find title
$pos5 = strpos($imagediv, 'alt="') + strlen('alt="');
$pos6 = strpos($imagediv, '"', (strpos($imagediv, 'alt="') + strlen('alt="'))) - $pos5;
$title=substr($imagediv, $pos5, $pos6);
return array ($title,$image);
}
?>