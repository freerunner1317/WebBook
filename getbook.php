<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
	<?
		$columsName = array('Название книги','Автор','Тип книги','Научность', 'Красивость обложки', 'Запрещенность в России', 'Фотка');
		$symbol = array("🠑","", "🠓");
		$file = file("book.txt");
		setlocale(LC_ALL, 'ru_RU.UTF-8');
		foreach ($file as $key => $line) {
			$splitLines[$key] = explode(",", $line);

			$everything[$key][0] = $splitLines[$key][0];
	  		$everything[$key][1] = $splitLines[$key][1];
	  		$everything[$key][2] = $splitLines[$key][2];
	  		$everything[$key][3] = $splitLines[$key][3];
	  		$everything[$key][4] = $splitLines[$key][4];
	  		$everything[$key][5] = $splitLines[$key][5];
	  		$everything[$key][6] = $splitLines[$key][6];

	  		$colums[0][$key] = $splitLines[$key][0];
	  		$colums[1][$key] = $splitLines[$key][1];
	  		$colums[2][$key] = $splitLines[$key][2];
		}

		if(isset($_GET['sorting']))
			$sorting = $_GET['sorting'];

		if(isset($_GET['colum']))
			$colum = $_GET['colum'];

		if($sorting)
			array_multisort($colums[$colum],(($sorting == 2) ? SORT_ASC : SORT_DESC), SORT_LOCALE_STRING, $everything);
		if($sorting == 2)
			$sorting = 0;
		else
			$sorting++;
	

		if(isset($_GET['sort'])){
				$nextSort = (($_GET['sort'] == ASC) ? DESC : ASC);
			}    
?>
<body> 
	<table class='table'>
		<thead id="tHead">
			<tr>
			<?			
			  	foreach ($columsName as $key => $value) {
			   		echo "<th>";
			   		if($key < 3){
			   			echo "<a href='getbook.php?sorting=$sorting&colum=$key'>$value";
			   			if ($key == $colum)
			   				echo $symbol[$sorting];
			   			echo "</a>";	
			   		}
			   		else{
			   			echo $value;		
			   		}
			   		echo "</th>";
				}
			?>	
				
			</tr>
		
		</thead>
		<tbody id="tBody">
		<?
			foreach ($everything as $line) {
				echo "<tr>";
				foreach ($line as $key => $line_split_values) {
					if ($key == 6)
						echo "<td><img src='/img/$line_split_values' height='150px'></td>";
					else
						echo "<td>".$line_split_values."</td>";
				}
				echo "</tr>";
			}
		?>		
		</tbody>

	</table>
	<a href="index.php">Добавить книгу</a>
</body>
<style type="text/css">	

</style>
</html>