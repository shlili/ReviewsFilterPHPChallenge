<html>

<body>

Order by rating: <?php echo $_GET["byRating"]; ?><br>
Minimum rating: <?php echo $_GET["minRating"]; ?><br>
Order by date: <?php echo $_GET["byDate"]; ?><br>
Prioritize by text: <?php echo $_GET["byText"]; ?><br>

<?php
$data = trim(file_get_contents('reviews.json'), "\xEF\xBB\xBF");
$review_data = json_decode($data, true);

$oldOrNew=$_GET["byDate"];
if(strcmp($oldOrNew, "oldest")==0){
	function date_compare($element1, $element2) {
    	$datetime1 = strtotime($element1['reviewCreatedOnDate']);
    	$datetime2 = strtotime($element2['reviewCreatedOnDate']);
    	return $datetime1 - $datetime2;
	} 
	usort($review_data, 'date_compare');

  	$min=$_GET["minRating"];
  	$helpAr=$review_data;
  	if($min==2){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1) {
        	unset($helpAr[$key]);
    	}
  	}}
  	if($min==3){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2) {
        	unset($helpAr[$key]);
    	}
  	}}
  	if($min==4){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3) {
        	unset($helpAr[$key]);
    	}
  	}}
  	if($min==5){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3 || $val['rating'] == 4) {
        	unset($helpAr[$key]);
    	}
  	}}

  	$HighOrLow=$_GET["byRating"];
	if(strcmp($HighOrLow, "highest")==0){
		$keys1 = array_column($helpAr, 'rating');
		array_multisort($keys1, SORT_DESC, $helpAr);
	}else{
		$keys1 = array_column($helpAr, 'rating');
		array_multisort($keys1, SORT_ASC, $helpAr);
	}

	$hasText=$_GET["byText"];
	$arrOne=array();
	$arrTwo=array();
	if(strcmp($hasText,"yes")==0){
		foreach($helpAr as $key => $val){
			if(strcmp($val['reviewText'], "")){
				$arrOne[$key]=$val;
			}
			else{
				$arrTwo[$key]=$val;
			}
		}
		var_dump($arrOne);
		var_dump($arrTwo);
	}else{
		var_dump($helpAr);
	}
}else{
	function date_compare($element1, $element2) {
    	$datetime1 = strtotime($element1['reviewCreatedOnDate']);
    	$datetime2 = strtotime($element2['reviewCreatedOnDate']);
    	return $datetime1 >= $datetime2;
	} 
	usort($review_data, 'date_compare');
	
  	$min=$_GET["minRating"];
  	$helpAr=$review_data;
  	if($min==2){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1) {
        	unset($helpAr[$key]);
    	}
  	}}
  	if($min==3){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2) {
        	unset($helpAr[$key]);
    	}
  	}}
  	if($min==4){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3) {
        	unset($helpAr[$key]);
    	}
  	}}
  	if($min==5){
  		foreach($helpAr as $key => $val) {
    		if($val['rating'] == 1 || $val['rating'] == 2 || $val['rating'] == 3 || $val['rating'] == 4) {
        	unset($helpAr[$key]);
    	}
  	}}

  	$HighOrLow=$_GET["byRating"];
	if(strcmp($HighOrLow, "highest")==0){
		$keys1 = array_column($helpAr, 'rating');
		array_multisort($keys1, SORT_DESC, $helpAr);
	}else{
		$keys1 = array_column($helpAr, 'rating');
		array_multisort($keys1, SORT_ASC, $helpAr);
	}

	$hasText=$_GET["byText"];
	$arrOne=array();
	$arrTwo=array();
	if(strcmp($hasText,"yes")==0){
		foreach($helpAr as $key => $val){
			if(strcmp($val['reviewText'], "")){
				$arrOne[$key]=$val;
			}
			else{
				$arrTwo[$key]=$val;
			}
		}
		var_dump($arrOne);
		var_dump($arrTwo);
	}else{
		var_dump($helpAr);
	}
}

?>


</body>
</html>