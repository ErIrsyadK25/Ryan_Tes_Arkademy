<?php
function sort_array(array $sort){
	for ($row = 0; $row < count($sort); $row++) {
  echo "<ul>";
  for ($col = 0; $col < count($sort[$row]); $col++) {
    echo "<li>".$sort[$row][$col]."</li>";

  }
  echo "</ul>";
}
}
	
	$data=array(
		array("a","c","b","e","d"),
		array("g","e","f")
	);
	sort_array($data);
?>
<script>
	var arrs = ['d','a','b','c'],
				['d','a','b','c'];
	arrs.sort();
	console.log(arrs);
</script>