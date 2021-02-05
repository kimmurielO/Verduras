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

    if(!$obj_conexion)
    {
        //echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        //echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }

    // Prueba para ver si puedo cargar la lista guardada en el html
    $var_sel = "SELECT checked FROM verduras WHERE nombre='Lechuga'";
	$pru = $obj_conexion->query($var_sel);
	$rows=mysqli_fetch_array($pru);

	$var_sel2 = "SELECT checked FROM verduras WHERE nombre='Repollo'";
	$pru2 = $obj_conexion->query($var_sel2);
	$rows2=mysqli_fetch_array($pru2);

	$var_sel3 = "SELECT checked FROM verduras WHERE nombre='Lombarda'";
	$pru3 = $obj_conexion->query($var_sel3);
	$rows3=mysqli_fetch_array($pru3);

	// Actualizar cuando actualice el form

?>

<form action="verduras.php" method=POST>
  <input type="checkbox" name="check_list[]" value="Lechuga" <?php echo ($rows[0] == 1) ? 'checked="checked"' : ''; ?> >
  <label> Lechuga </label><br>
  <input type="checkbox" name="check_list[]" value="Repollo" <?php echo ($rows2[0] == 1) ? 'checked="checked"' : ''; ?>>
  <label> Repollo</label><br>
  <input type="checkbox" name="check_list[]" value="Lombarda" <?php echo ($rows3[0] == 1) ? 'checked="checked"' : ''; ?>>
  <label> Lombarda</label><br><br>
  <input type="submit" name="submit" value="Enviar">
</form>

<?php

	$cons_usuario="root";
    $cons_contra="";
    $cons_base_datos="listaVerd";
    $cons_equipo="localhost";

    $obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

    if(isset($_POST['submit'])){//Para ejecutar PHP script en Submit

    	$control = 1;
    	$var_cons1 = "UPDATE verduras SET checked=false";
		$obj_conexion->query($var_cons1);

		if(!empty($_POST['check_list'])){

			foreach($_POST['check_list'] as $selected){

				//Modifico la BBDD
				$var_cons = "UPDATE verduras SET checked=true WHERE nombre ='$selected'";
				$obj_conexion->query($var_cons);
			}
		}
	}

	mysqli_close($obj_conexion);

?>

</body>
</html>