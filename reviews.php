<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Reviews</title>
</head>
<body>

<form action="review_get.php" method="get">
	<h2>Filter reviews</h2>
	<h4>Order by rating:</h4>
  	<select name="byRating" id="byRating">
    	<option value="highest">Highest first</option>
    	<option value="lowest">Lowest first</option>
  	</select>
	<br>
	<h4>Minimum rating:</h4>
  	<select name="minRating" id="minRating">
    	<option value="1st">1</option>
    	<option value="2nd">2</option>
    	<option value="3rd">3</option>
    	<option value="4th">4</option>
    	<option value="5th">5</option>
  	</select>
	<br>
	<h4>Order by date:</h4>
  	<select name="byDate" id="byDate">
    	<option value="newest">Newest first</option>
    	<option value="oldest">Oldest first</option>
  	</select>
  	<br>
  	<h4>Prioritize by text:</h4>
  	<select name="byText" id="byText">
    	<option value="yes">Yes</option>
    	<option value="no">No</option>
  	</select>
  	<br>
  	<br>
	<input type="submit">
</form>

<?php
$data = file_get_contents('reviews.json');
  
// Decode the JSON file
$review_data = json_decode($data,true);
  
// Display data
var_dump($review_data);
?>

</body>
</html>