<?php
	ini_set('display_errors',0);
	?>



				<table class="content">
					<tr>
						<td>
							<div >
								<h3>Задание 1
								<p>Возвести в степень</p>
								</h3>
								<table border="0">
									<tr>
										<td><form method="POST" action="">

	
										<br>Введите число :<input type="text" name="a" required value= ""><br>

										<br>Введите степень :<input type="text" name="b" required value= ""><br>

										<input type="submit" name="button" value="Отправить">
								<?php	
									function myDegree($a, $b){
									if($b == 0){
									return 1;
									}
									if($b < 0){
									return myDegree( 1/$a, -$b); // -$b значит смену знака с отрицательного на положительный
									}
									return $a * myDegree($a, $b-1); // вызов функции внутри функции
									}

									$a = $_POST['a'];

									$b = $_POST['b'];

									if ($_POST['button'])

									{
									$c = $a * myDegree($a, $b-1); echo "Число" ."  " .$a. "  в степени   "  .$b.  "   равно   " . $c;
									}
	
	
									?>
									
								<br><hr>
								<h3>Задание 2</h3>
								<table border="1">
<tr>
<td>
<p>Список серверных переменных:</p>
<?php
echo "<pre>" ;
print_r($GLOBALS);
echo "</pre>";
?>
						
							</div>
						</td>
						</td>
						</tr>
					</tr>
				</table>
