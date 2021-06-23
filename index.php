<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/style.css">
</head>
	<?
		if(isset($_POST["nameBook"])){
			$nameBook = $_POST["nameBook"];
			$nameAuthor = $_POST["nameAuthor"];
			$bookType = $_POST["bookType"];

			$science = $_POST["science"];
			$look = $_POST["look"];
			$forbidden = $_POST["forbidden"];
			if(!$science)
				$science = "Нет";
			if(!$look)
				$look = "Нет";
			if(!$forbidden)
				$forbidden = "Нет";

			if(isset($_FILES['img'])) {
		    	$file = $_FILES['img'];

				$name = mt_rand(0, 10000) . $file['name'];
				copy($file['tmp_name'], 'img/' . $name);

		    }
			
			$fd = fopen("book.txt", 'a') or die("не удалось создать файл");
			$str = "$nameBook,$nameAuthor,$bookType,$science,$look,$forbidden,$name\n";
			fwrite($fd, $str);
			fclose($fd);
		}	
    
   	

	?>


<body> 
	<form method="POST" action="index.php" enctype="multipart/form-data">
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
		   <p><input type="checkbox" name="forbidden" value="Да" checked> Запрещенная в России?
		   	</p>
		   <input type="file" name="img">
		   <p><input type="submit" value="Отправить"></p>
		</div>
	</form>	
	<a href="getbook.php">Таблица с книгами</a>
</body>
<style type="text/css">	

</style>
</html>