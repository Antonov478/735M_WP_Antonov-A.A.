<?php   
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
	if (!empty($_POST['type'])&& !empty($_POST['proba'])&& !empty($_POST['ves']) && !empty($_POST['price']) && !empty($_POST['description']))
	{	
		
		$ves = clearData($_POST['ves']);
		$type = clearData($_POST['type']);
		$proba= clearData($_POST['proba']);
		$price = clearData($_POST['price']);
		$description = clearData($_POST['description']);
		$cheakID = getOne("SELECT id FROM tovar WHERE type = '$type' ");				
		if (count($cheakID) == 0)
		{
			if ($_FILES['uploadfile']['tmp_name']) 
			{			
				$a = loadImage("add"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{
					$image = $a['src'];
					executeQuery("INSERT INTO tovar (type,price,description,image,ves,proba) VALUES ('$type','$price','$description','$image','$ves','$proba')");
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
				$image = "";
				executeQuery("INSERT INTO tovar (type,price,description,image,ves,proba) VALUES ('$type','$price','$description','$image','$ves','$proba')");	
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else echo  '<font color="red">Запись с таким названием уже существует!</font>';
	}
	else 
		echo '<font color="red">Заполните все поля!</font>';	
}
?>

<center><h2>Добавить продукцию</h2></center>
<div>
	<form method='POST' action='index.php?page=add' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Вид изделия:</th> 
				<td style="width:100%">
					<select size="1" name="type">
						<option disabled>Выберите вид изделия</option>
						<option value="Слиток золота">Слиток золота</option>
						<option value="Слиток серебра">Слиток серебра</option>
						<option value="Слиток платины">Слиток платины</option>
						<option value="Слиток платиновой группы">Слиток платиновой группы</option>
					</select>
				</td>
				
			</tr>
			<tr>
				<th>Вес изделия:</th>
				<td style="width:100%">
					<select size="1" name="ves">
						<option disabled>Выберите вес изделия</option>
						<option value="5 грамм">5 грамм</option>
						<option value="25 грамм">25 грамм</option>
						<option value="50 грамм">50 грамм</option>
						<option value="100 грамм">100 грамм</option>
						<option value="200 грамм">200 грамм</option>
						<option value="500 грамм">500 грамм</option>
						<option value="1000 грамм">1000 грамм</option>
						<option value="11000 грамм">11000 грамм</option>
						<option value="13000 грамм">13000 грамм</option>
					</select>
				</td>
			</tr>		
<tr>
				<th>Проба изделия:</th>
				<td style="width:100%">
					<select size="1" name="proba">
						<option disabled>Выберите пробу изделия</option>
						<option value="99,90">99,90%</option>
						<option value="99,95">99,95%</option>
						<option value="П">Для слитков платиновой группы 80,00% - 99,95%</option>
					</select>
				</td>
			</tr>					
			<tr>
				<th>Цена:</th>
				<td><input type='text' name='price' size='10'>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' style="resize:none; width:90%"></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' accept='image/jpeg'></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Добавить' name='add'></p></center>
	</form>
</div>