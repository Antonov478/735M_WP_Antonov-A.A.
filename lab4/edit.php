<?php
	$id = clearData($_GET['id']);	
	$row = getOne("SELECT * FROM tovar WHERE id = '$id'");  // получаем всю информацию из tovar по данному id
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		if (!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['price']) && !empty($_POST['description']))
		{	
			$title = clearData($_POST['title']);
			$type = clearData($_POST['type']);
			$price = clearData($_POST['price']);
			$description = clearData($_POST['description']);
			if ($_FILES['uploadfile']['tmp_name']) 
			{				
				$a = loadImage("edit"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{				
					$image = $a['src'];
					executeQuery("UPDATE tovar SET title = '$title', type = '$type', price = '$price', description = '$description', image ='$image' WHERE id = '$id'");		
					header("Location: index.php?page=catalog");
					exit;
				}
				else
				{ 
					echo $a['mess'];
				}
			}
			else 
			{						
				executeQuery("UPDATE tovar SET title = '$title', type = '$type', price = '$price', description = '$description' WHERE id = '$id'");								
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<font color="red">Заполните все поля!</font>';		
	}
?>
	
<center><h2>Редактирование товара</h2></center>
<div>
	<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Название:</th>
				<td><input type='text' name='title' value='<?=$row['title']?>' size="60"></td>
			</tr>
			<tr>
				<th>Категория:</th> 
				<td>
					<select size="1" name="type">
						<option disabled>Выберите категорию товара</option>
						<option value="Слиток золота" <?php if ($row['type'] == "Слиток золота") echo "selected" ?> >Слиток золота</option>
						<option value="Слиток серебра" <?php if ($row['type'] == "Слиток серебра") echo "selected" ?>>Слиток серебра</option>
						<option value="Слиток платины" <?php if ($row['type'] == "Слиток платины") echo "selected" ?>>Слиток платины</option>
						<option value="Слиток платиновой группы" <?php if ($row['type'] == "Слиток платиновой группы") echo "selected" ?>>Слиток платиновой группы</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Цена:</th>
				<td><input type='text' name='price' value='<?=$row['price']?>' size='10'>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' cols='50' style="resize:none;" ><?=$row['description']?></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' "></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Сохранить'></p></center>
	</form>
</div>