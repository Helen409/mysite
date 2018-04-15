<?php
function drawtable($rows, $cols, $color, $border){
echo "<table border=$border width='200'>\n";
			for ($i=1;$i<=$rows;$i++){
				echo '<tr style="';
				if ($i==1) {
						echo "color:$color;font-weight:bold;";
					} 
				echo 'text-align:center; ">';

				for ($j=1;$j<=$cols;$j++){
					echo '<td style="';
					if ($j==1) {
						echo "color:$color;font-weight:bold;";
					} 
					echo 'text-align:center; ">';
					echo $i*$j;
					echo "</td>\n";
					
				}
				echo "</tr>\n";
			}
			echo '</table>';	
}
?>