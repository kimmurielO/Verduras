<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="pruebaV.js"></script>
</head>

<body>

<h1>Lista</h1>

  <input type="checkbox" name="verdura1" value="verdura1" onclick="seleccionado2(this)">
  <label for="verdura1"> Lechuga </label><br>
  <input type="checkbox" name="verdura1" value="verdura2" onclick="seleccionado2(this)">
  <label for="verdura1"> Repollo</label><br>
  <input type="checkbox" name="verdura1" value="verdura3" onclick="seleccionado2(this)">
  <label for="verdura1"> Lombarda</label><br><br>

<script>

function seleccionado(verduraPulsada){
    //alert("Clicked, new value = " + verduraPulsada.checked);
    //alert("Clicked, new value = " + verduraPulsada.value);

    //var salida = verduraPulsada.value;

    //var json = JSON.stringify(salida, null, 4);
    //alert(json);

}
</script>

<script>
    function seleccionado2(verduraPulsada){
        pruebaV2(verduraPulsada.value, verduraPulsada.checked);
    }
</script>

</body>
</html>


<?php
//$str_datos = file_get_contents("listaVerd.json");
//$datos = json_decode($str_datos,true);
 
//echo "Prueba: ".$datos["datos"]["name"][0]."n";
 
// Modifica el valor, y escribe el fichero json de salida
//
//$datos["datos"]["name"] = verduraPulsada.value;
 
//$fh = fopen("listaVerd.json", 'w')
      //or die("Error al abrir fichero de salida");
//fwrite($fh, json_encode($datos,JSON_UNESCAPED_UNICODE));
//fclose($fh);
?>