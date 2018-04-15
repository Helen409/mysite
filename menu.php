<?php
function drawMenu($menu, $vertical=true){
			echo "<ul>\n";
			foreach ($menu as $value){
				echo "<li><a href='".
				      $value['href'].
					 "' >".$value['link']."</a></li>\n";
			}
			echo "</ul>\n";
		}		
?>
	<div id="nav">
	<h2>Навигация по сайту</h2>
<?php
		drawMenu($menu, true);
?>
</div>			