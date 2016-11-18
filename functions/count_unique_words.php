<?php
function count_unique_words($myarray)
{
  $myarray = array_map('strtolower', array_map('trim', $myarray));
  
  //remove symbols and numbers
  $myarray = preg_replace("/[^a-zA-Z]+/", "", $myarray );
  
  $result = array_count_values($myarray);
  arsort($result);
  
  $irrelevant_words = array("", "di", "ke", "dari", "ini", "itu", "dan", "tak", "yang", "jadi", "untuk",
							"dengan");
  foreach($result as $word => $count)
	{	
		if(!in_array($word, $irrelevant_words)){
			echo $word." was found ".$count." time(s)<br/>";
		}
	}
}
?>