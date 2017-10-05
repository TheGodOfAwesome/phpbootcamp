#!/usr/bin/php
<?PHP

function conv($fmon){
	$fmons = array("janvier", "février", "fevrier", "mars", "avril", "mai", 
			"juin", "juillet", "août", "aout", "septembre", "octobre", 
			"novembre", "décembre", "decembre");
	$emons = array("january", "february", "february", "march", "april", "may", 
			"june", "juillet", "august", "august", "september", "october", 
			"november", "december", "december");
	$i = 0;
	while($i < 15)
	{
		if ($fmons[$i] == strtolower($fmon))
		{	
			return($emons[$i]);
		}
		$i = $i + 1;
	}
	return("false");
}

if ($argc == 1)
{
	echo "\n";
}
else if ($argc != 2)
{
    echo "Wrong Format\n";
}
else
{
	date_default_timezone_set('Europe/Paris');
	$i = 1;
	$strs = explode(' ', $argv[1]);
	$date = "";
	$month = "";
	$year = "";
	$time = "";
	while ($i < count($strs))
	{
		if ($i == 1)
		{
			$date = $strs[$i]; 
		}
		if ($i == 2)
		{
			if (conv($strs[$i]) != "false")
			{
				$month = conv($strs[$i]);
			}
		}
		if ($i == 3)
		{
			$year = $strs[$i];
		}
		if ($i == 4)
        {
            $time = $strs[$i];
        }
		$i = $i + 1;
	} 
	$datestr = $date . " " . $month . " " . $year . " " . $time;
	if (($timestamp = strtotime($datestr)) == false) 
	{
    	echo "Wrong Format\n";
	} 
	else 
	{
		echo $timestamp;
		echo "\n";
	}
}

?>
