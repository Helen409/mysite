<?php 
	$result = 0;
	$answers = parse_ini_file('answers.ini');
	
	if(isset($_SESSION['test'])) {				
		foreach($_SESSION['test'] as $value){
			if(array_key_exists($value, $answers)){
				$result += $answers[$value];
			}
		}		
	}
	session_destroy();
?>
<table width="100%">
	<tr>
		<td align="left">
		<p>Ваш результат <?php echo $result; ?> из 30</p>
		</td>
	</tr>
</table>
<?php echo $q?>