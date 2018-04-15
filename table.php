
			<!-- Область основного контента -->
			<form action='index.php?id=table' method='POST'>
				<label>Количество колонок: </label><br />
				<input name='cols' type='text' value="" /><br />
				<label>Количество строк: </label><br />
				<input name='rows' type='text' value="" /><br />
				<label>Цвет: </label><br />
				<input name='color' type='text' value="" /><br /><br />
				<input type='submit' value='Создать' />
			</form>
			<!-- Таблица -->
			<?php
			if($_SERVER['REQUEST_METHOD'] == "POST") {
			$cols=ABS((int)$_POST['cols']);
			$rows=abs((int)$_POST['rows']);
			$color=trim(strip_tags($_POST['color']));
			include 'draw_table.php';
			drawtable($cols,$rows,$color,2);
			}
			?>
				
			
			<!-- Таблица -->
			<!-- Область основного контента -->