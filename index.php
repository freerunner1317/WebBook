<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
	<?
		if(isset($_GET["nameBook"])){
			$nameBook = $_GET["nameBook"];
			$nameAuthor = $_GET["nameAuthor"];
			$bookType = $_GET["bookType"];

			$science = $_GET["science"];
			$look = $_GET["look"];
			$forbidden = $_GET["forbidden"];
			if(!$science)
				$science = "Нет";
			if(!$look)
				$look = "Нет";
			if(!$forbidden)
				$forbidden = "Нет";
			
			$fd = fopen("book.txt", 'a') or die("не удалось создать файл");
			$str = "$nameBook,$nameAuthor,$bookType,$science,$look,$forbidden\n";
			fwrite($fd, $str);
			fclose($fd);
		}		

	?>


<body> 
	<form method="GET" action="index.php">
		<div class="book">
			<p>Название книги
			<input type="text" name="nameBook" required>	
			Имя автора	
			<input type="text" name="nameAuthor" required>			
			<select name="bookType">
				<option value="бумажная">бумажная</option>
				<option value="электронная">электронная</option>
				<option value="аудио">аудио</option>
			</select>
			</p>

			<p>Дополнительные параметры</p>
		   <p><input type="checkbox" name="science" value="Да"> Научная?</p>
		   <p><input type="checkbox" name="look" value="Да"> Красивая обложка?</p>
		   <p><input type="checkbox" name="forbidden" value="Да" checked> Запрещенная в России?</p>
		   <p><input type="submit" value="Отправить"></p>
		</div>
	</form>	
	<a href="getbook.php">Таблица с книгами</a>
</body>
<style type="text/css">	

</style>
</html>