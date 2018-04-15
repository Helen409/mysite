		<?php
			setlocale(LC_ALL, 'russian');
	ini_set('display_errors',1);
	ini_set('error_reporting', E_ALL);
			$day=strftime('%d');
			$mon=(int)strftime('%m');
			$year=strftime('%Y');
			$hour=strftime('%H');
			$min=strftime('%M');
			$welcome='';
			$month='';
			switch ($mon){
				case 1: $month='января';break;
				case 2: $month='февраля';break;
				case 3: $month='марта';break;
				case 4: $month='апреля';break;
				case 5: $month='мая';break;
				case 6: $month='июня';break;
				case 7: $month='июля';break;
				case 8: $month='августа';break;
				case 9: $month='сентября';break;
				case 10: $month='октября';break;
				case 11: $month='ноября';break;
				case 12: $month='декабря';break;
			}
			if ($hour>0 and $hour<6) $welcome='Доброй ночи';
			elseif ($hour>=6 and $hour<12) $welcome='Доброе утро';
			elseif ($hour>=12 and $hour<18) $welcome='Доброго дня';
			elseif ($hour>=18 and $hour<23) $welcome='Доброго вечера';
			else $welcome='Доброй ночи';			
			$menu=array(
				array('link'=>'Домой',             'href'=>'index.php'),
				array('link'=>'О нас',             'href'=>'index.php?id=about'),
				array('link'=>'Контакты',          'href'=>'index.php?id=contact'),
				array('link'=>'Таблица умножения', 'href'=>'index.php?id=table'),
				array('link'=>'Калькулятор',       'href'=>'index.php?id=calc'),
				array('link'=>'Тест',       'href'=>'test/index.php'),
			);
		?>