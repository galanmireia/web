<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
echo '<link rel="stylesheet" type="text/css" href="../styles/table.css">';
$assessmentItems = simplexml_load_file('../xml/Questions.xml');
	 echo "<table>
			<tr>
			  <td><strong>Numero total de preguntas</strong></td>
			  <td><strong>Numero total de preguntas realizadas</strong></td>
		</tr>";
		$autor=$_SESSION['email'];
		$cuantos=0;
		$totales=0;
foreach($assessmentItems as $assessmentItem){
	$autor2=$assessmentItem['author'];
		if($autor==$autor2){
			$cuantos=$cuantos+1;
		}
		$totales=$totales+1;
}
	echo'
		<tr>
		<td>'.$totales.'</td>
		<td>'.$cuantos.'</td>
		</tr>
</table>
';
?>
</body>
</html>

