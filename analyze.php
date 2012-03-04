<?php
function analyzeUrl($str)
{
	$parse = parse_url($str);
	$ex = explode("/",$parse['path']);
	$strquery = parse_str($parse['query'],$perma);
	foreach($ex AS $key => $value)
	{
		if($value == "pages" || $value == NULL)  unset($ex[$key]);
	}
	$ex = array_values($ex);
	$count = count($ex);
	if($count == 1)
	{
		if($ex[0] == "permalink.php") { echo "permalink: ".$perma['story_fbid']."_".$perma['id']; }
		elseif($ex[0] == "photo.php") { echo "photo: ".$strquery; }
		else { echo "profile/page: ".$ex[0]; }
	}
	elseif($count == 2)
	{
		if($ex[1] == "posts" || $ex[1] == "likes" || $ex[1] == "checkins" || $ex[1] == "comments") { return false; }
		else { if($ex[0] == "events") { echo "event: ".$ex[1]; } else { echo "profile/page: ".$ex[1]; } }
	}
	elseif($count == 3)
	{
		echo "post: ".$ex[2];
	}
	else
	{
		return false;
	}
}

$url = "http://www.facebook.com/permalink.php?story_fbid=346636665358822&id=268168996538923";
echo analyzeUrl($url);
?>