<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
	<?
		$file = file("input.txt");
		foreach ($file as $key => $value) {
			$splitLines[$key] = explode(",", $line);

			$everything[$key][0] = $splitLines[$key][0];
	  		$everything[$key][1] = $splitLines[$key][1];
	  		$everything[$key][2] = $splitLines[$key][2];
	  		$everything[$key][3] = $splitLines[$key][3];

	  		$colum[0][$key] = $splitLines[$key][0];
	  		$colum[1][$key] = $splitLines[$key][1];
	  		$colum[2][$key] = strtotime($splitLines[$key][2]);
	  		$colum[3][$key] = $splitLines[$key][3];
		}

	?>


<body> 


</body>
<style type="text/css">	

</style>
</html>