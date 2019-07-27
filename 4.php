<?php
function countVowels($string){
		echo $count= substr_count($string, 'a')+substr_count($string, 'i')+substr_count($string, 'u')+substr_count($string, 'e')+substr_count($string, 'o');
	}
countVowels("programmer");
echo "<br />";
countVowels("hmm..");
?>
