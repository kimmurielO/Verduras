<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body>

<h1>Lista</h1>

<?php
	$cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="listaVerd";
    $cons_equipo="localhost";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

    $control=0;

?>

<!--<form action="verduras.php" method=POST>
  <input type="checkbox" name="check_list[]" value="Lechuga" <?php echo ($rows[0] == 1) ? 'checked="checked"' : ''; ?> >
  <label> Lechuga </label><br>
  <input type="checkbox" name="check_list[]" value="Repollo" <?php echo ($rows2[0] == 1) ? 'checked="checked"' : ''; ?>>
  <label> Repollo</label><br>
  <input type="checkbox" name="check_list[]" value="Lombarda" <?php echo ($rows3[0] == 1) ? 'checked="checked"' : ''; ?>>
  <label> Lombarda</label><br><br>
  <input type="submit" name="submit" value="Enviar">
</form>-->

<form action="verduras.php" method="POST">
	<?php
		$var_sel4 = "SELECT * FROM verduras";
		$pru4 = mysqli_query($obj_conexion, $var_sel4);

		while($mostrar=mysqli_fetch_array($pru4)){
	?>

	<input type="checkbox" name="check_list[]"  value="<?php echo $mostrar['nombre'] ?>" <?php echo ($mostrar['checked'] == 1) ? 'checked="checked"' : ''; ?>>
  	<label> <?php echo $mostrar['nombre'] ?> </label><br>

	<?php
		}
	?>
<input type="submit" name="submit" value="Enviar">
</form>
</form>

<?php

	//$asistencias['id'];

	/*$cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="listaVerd";
    $cons_equipo="localhost";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
*/
    if(isset($_POST['submit'])){//Para ejecutar PHP script en Submit
    	$control++;
    	$var_cons1 = "UPDATE verduras SET checked=false";
		$obj_conexion->query($var_cons1);

		if(!empty($_POST['check_list'])){

			foreach($_POST['check_list'] as $selected){
				echo $selected;

				//Modifico la BBDD
				$var_cons = "UPDATE verduras SET checked=true WHERE nombre ='$selected'";
				$obj_conexion->query($var_cons);
			}
		}
	}

	mysqli_close($obj_conexion);

	unset($_POST['submit']);
	$url = 'verduras.php';
	

	if ($control == 1){
		$control=0;
		header('Location: '.$url);
	}

	//header( "refresh:5; url=verduras.php" );

?>

</body>
</html>