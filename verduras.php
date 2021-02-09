<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./estilo.css">
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

<form action="verduras.php" method="POST">
	<?php
		$var_sel1 = "SELECT * FROM verduras";
		$respuesta1 = mysqli_query($obj_conexion, $var_sel1);

		while($mostrar=mysqli_fetch_array($respuesta1)){
	?>

	<input type="checkbox" name="check_list[]" value="<?php echo $mostrar['nombre'] ?>" <?php echo ($mostrar['checked'] == 1) ? 'checked="checked"' : ''; ?>>
  	<label> <?php echo $mostrar['nombre'] ?> </label><br>

	<?php
		}
	?>
<input type="submit" name="submit" value="Enviar">
</form>
</form>

<?php

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

?>

</body>
</html>