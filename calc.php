
			<!-- Область основного контента -->
			<form action='index.php?id=calc' method='post'>
				<label>Число 1:</label><br />
				<input name='num1' type='text'/><br />
				<label>Оператор: </label><br />
				<input name='operator' type='text'/><br />
				<label>Число 2: </label><br />
				<input name='num2' type='text'/><br /><br />
				<input type='submit' value='Считать'>
			</form>	
			<?php
			$x1=(int)$_POST['num1'];
			$x2=(int)$_POST['num2'];
			$op=trim(strip_tags($_POST['operator']));
			$result='';
			$stroka='';
			switch($op){
				case '+':
								$result=$x1+$x2;
								$stroka=$x1.'+'.$x2.'='.$result;
								break;
				case '-':
								$result=$x1-$x2;
								$stroka=$x1.'-'.$x2.'='.$result;
								break;
				case '*':
								$result=$x1*$x2;
								$stroka=$x1.'*'.$x2.'='.$result;
								break;
				case '/':
								if ($x2!=0)
								{$result=$x1/$x2;
								$stroka=$x1.'/'.$x2.'='.$result;}
								else $stroka='Ошибка! На ноль делить нельзя';
								break;
				default:$stroka='проверьте введенный оператор';				

								}
			echo $stroka;
			?>
			<!-- Область основного контента -->
	