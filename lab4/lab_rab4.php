<?php
	
	function get_column_names_with_meta ($conn_id)
	{
		$query = "SELECT * FROM provider,zakaz WHERE 1 = 0";
		if (!($result_id = mysqli_query ($conn_id,$query)))
			return (FALSE);
		echo "<table border='1' align='center'>";
		echo "<tr><th>Таблица</th><th>Поле</th><th>Тип</th><th>Длинна</th></tr>";
		for ($i = 0; $i < mysqli_num_fields ($result_id); $i++)
		{
			if ($field = mysqli_fetch_field ($result_id))
				echo "<tr>";
				echo "<td>".$field->table."</td>";
				echo "<td>".$field->name."</td>";
				echo "<td>".$field->type."</td>";
				echo "<td>".$field->length."</td>";
				echo "</tr>";
		}
		echo "</table>";
		mysqli_free_result ($result_id);
	}	
	
	
	function insertdata1AndView($connect)
	{
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('Polyus Gold','Красноярский край, г. Красноярск, ул. Цимлянская, 37','Золото','17000','8 (391) 268-31-03 ','http://polyus.com/ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('«Петропавловск»','Камчатский край, г. Петропавловск-Камчатский, ул. Ленинская, 59','Золото','18000','8 (415) 225-25-86 ','http://zolkam.ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('«Полиметалл»','Магаданская обл., г. Магадан,  ул. Транспортная, 1','Золото','12500','8 (413) 269-75-00 ','https://www.polymetalinternational.com/ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('Чукотская ГГК','Чукотский АО, г. Анюйск, Улица мира, 23','Золото','16800','(8453) 79-10-01 ','http://kinrossgold.ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('«Полиметалл»','Магаданская обл., г. Магадан,  ул. Транспортная, 1','Серебро','3600','8 (413) 269-75-00 ','https://www.polymetalinternational.com/ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('Highland Gold Mining','Московская обл., г. Москва, Смоленский бульвар, 4','Серебро','5400',' +7 (495) 424-95-21 ','https://www.russdragmet.ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('«Петропавловск»','Камчатский край, г. Петропавловск-Камчатский, ул. Ленинская, 59','Платина','34000','8 (415) 225-25-86 ','http://zolkam.ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('«Полиметалл»','Магаданская обл., г. Магадан,  ул. Транспортная, 1','Платина','35500','8 (413) 269-75-00 ','https://www.polymetalinternational.com/ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('Polyus Gold','Красноярский край, г. Красноярск, ул. Цимлянская, 37','Металлы платиновой группы','1700','8 (391) 268-31-03 ','http://polyus.com/ru/')");
		mysqli_query($connect,"INSERT INTO provider (name,address,product,price,telephone, website) values ('«Петропавловск»','Камчатский край, г. Петропавловск-Камчатский, ул. Ленинская, 59','Металлы платиновой группы','1800','8 (415) 225-25-86 ','http://zolkam.ru/')");
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM provider ORDER BY id ASC"));			
		echo "<center><br>Таблица provider:<br></center>";		
		echo "<table border='1' align='center' width='1000'>";
		echo "<tr><th>ID</th><th>Поставщик</th><th>Адрес</th><th>Продукция</th><th>Цена (руб/кг)</th><th>Номер</th><th>Веб сайт</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id']."</td>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['address']."</td>";
			echo "<td>".$item['product']."</td>";
			echo "<td>".$item['price']."</td>";
			echo "<td>".$item['telephone']."</td>";
			echo "<td>".$item['website']."</td>";
			
			echo "</tr>";
		}
		echo "</table><br>";
		
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('1','Золото','4440','75480000','2018.11.10','1242050')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('2','Золото','14440','259920000','2018.11.20','1241050')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('7','Платина','31000','253280000','2018.11.20','1523050')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('10','Металлы платиновой группы','90000','2123800','2018.11.20','125320')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('3','Золото','3940','63480000','2018.11.08','2145120')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('4','Золото','4680','54600000','2018.11.12','1242050')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('5','Серебро','13140','43380000','2018.11.15','7688050')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('6','Серебро','41230','7480000','2018.11.15','4545454')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('8','Платина','12240','991480000','2018.12.01','868555')");
		mysqli_query($connect,"INSERT INTO zakaz (id_provider,product,ves,price1,data1,order1) values ('9','Металлы платиновой группы','110011','3180000','2018.12.04','1870050')");
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM zakaz ORDER BY id ASC"));			
		echo "<center><br>Таблица zakaz:<br></center>";		
		echo "<table border='1' align='center' width='800'>";
		echo "<tr><th>ID поставщика</th><th>Продукция</th><th>Вес (кг)</th><th>Цена</th><th>Дата поставки</th><th>Ордер</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id_provider']."</td>";
			echo "<td>".$item['product']."</td>";
			echo "<td>".$item['ves']."</td>";
			echo "<td>".$item['price1']."</td>";
			echo "<td>".$item['data1']."</td>";
			echo "<td>".$item['order1']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
	function query1($connect)
	{ 
		echo "<br><center><b>Запрос №1:</b> Вывести все поставки , совершенные на сумму больше 120235200 руб. и отсортировать по дате по возрастанию<br></center>";
		$rows = resultSetArray(mysqli_query($connect,"SELECT name,ves,data1,price1,order1 FROM zakaz LEFT JOIN provider on provider.id = zakaz.id_provider WHERE ves>8000 and price1>120235200 ORDER BY data1 ASC"));			
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>Производитель</th><th>Вес поставленного металла (кг)</th><th>Дата</th><th>Цена</th><th>Ордер</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['ves']."</td>";
			echo "<td>".$item['data1']."</td>";
			echo "<td>".$item['price1']."</td>";
			echo "<td>".$item['order1']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}
	
	function query2($connect)
	{
		echo "<center><br><b>Запрос №2:</b> Вывести общую стоимость поставок по проставщикам<br></center>";		
		$rows = resultSetArray(mysqli_query($connect,"SELECT name,round(sum(price1),1) as 'summ' FROM zakaz,provider WHERE provider.id = zakaz.id_provider GROUP BY(zakaz.id_provider) 
													  order BY name ASC"));			
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>Производитель</th><th>Сумма</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['summ']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	
	function delDB($connect){
		$query = 'DROP DATABASE lab4';
		if (mysqli_query($connect,$query)) {
			echo "<center><br>База lab4 успешно удалена\n</center>";
		} else {
			echo 'Ошибка при удалении базы данных: ' . mysqli_error() . "\n";
		}		
		mysqli_close($connect);
	}
	
	
	$host = "localhost";
	$users = "root";
	$password = "";
	$DATABASE = "lab4";	
	$connect = mysqli_connect($host, $user, $password);	
	if (!$connect) {
		die('Ошибка соединения: ' . mysqli_error($connect));
	}	
	
	
	
	$query = "CREATE DATABASE IF NOT EXISTS lab4 ";
	if (mysqli_query($connect,$query)) {
		echo "<center>База '$DATABASE' успешно создана <br></center>";
	} else {
		echo 'Ошибка при создании базы данных: ' . mysqli_error($connect) . "\n";
	}
	
	mysqli_select_db($connect,$DATABASE);
	
	$query = "CREATE TABLE IF NOT EXISTS provider (
        id integer not null auto_increment primary key,
        name varchar(65) not null,
        address varchar(75) not null,
		product varchar(75) not null,
		price varchar(75) not null,
        telephone varchar(20))";
	
	if (mysqli_query($connect,$query)) {
		echo "<center><br>Таблица provider успешно создана </br></center>";
	} else {
		echo 'Ошибка при создании таблицы provider: ' . mysqli_error($connect) . "\n";
	}
	
	$query = "CREATE TABLE IF NOT EXISTS zakaz (
        id integer not null auto_increment primary key,
		id_provider integer not null,
        product varchar(75) not null,
        ves integer not null,
		data1 date not null,
		price1 varchar(75) not null,
		order1 integer not null)";
	
	if (mysqli_query($connect,$query)) {
		echo "<center><br>Таблица zakaz успешно создана </br></center>";
	} else {
		echo 'Ошибка при создании таблицы zakaz: ' . mysqli_error($connect) . "\n";
	}	
	
	echo "<center><br>Структура базы данных:</br></center><br>";
	get_column_names_with_meta($connect);    // выводим структуру БД до изменения
	echo "<br><br>";
	
	$query = "ALTER TABLE provider ADD website varchar(50)";	
	if (mysqli_query($connect,$query)) {
		echo "<center><br>Структура таблицы provider успешно изменена\n</br></center>";
	} else {
		echo 'Ошибка при изменении таблицы provider: ' . mysqli_error($connect) . "\n";
	}	
	echo "<br><br>";
	
	
	
	echo "<center><br><br>Измененная структура базы данных</center>";
	get_column_names_with_meta($connect);	         // выводим структуру БД после изменения
	insertdata1AndView($connect);                     // заполняем таблицы и выводим их
	query1($connect);                                // запрос №1
	query2($connect);                                // запрос №2
	
	///mysqli_query($connect,"DROP TABLE IF EXISTS provider, zakaz");
	//mysqli_close($connect);
	delDB($connect);                                         //удаляем базу данных lab4


?>
