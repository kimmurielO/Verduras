
function pruebaV2(verduraPulsadaValor, verduraPulsadaCheck){

    var arrayNombres= new Array();
    var arrayMarcados= new Array();

    arrayNombres[0]= verduraPulsadaValor;
    arrayMarcados[0]= verduraPulsadaCheck;

    var datos  = [];
    var objeto = {};

    for(var i= 0; i < arrayNombres.length; i++) {

        var nombre = arrayNombres[i];

        datos.push({ 
            "name"      : arrayNombres[i],
            "marcado"   : arrayMarcados[i]
        });
    }

    objeto.datos = datos;
    console.log(JSON.stringify(objeto));
}