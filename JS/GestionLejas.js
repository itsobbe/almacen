/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function lejas(str) {

    var xmlhttp = new XMLHttpRequest();
    
    if (str == "nulo") {
        
        document.getElementById("lejasDisponibles").innerHTML = "";
        return;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        /*Como el explorer va por su cuenta, el objeto es un ActiveX */
    }

    xmlhttp.onreadystatechange = function () {
        
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            
            document.getElementById("lejasDisponibles").innerHTML = xmlhttp.responseText; /*Seleccionamos el elemento que recibirá el flujo de datos*/
            
        }
    }
    xmlhttp.open("GET", "../CONTROLADORES/getDisponibles.php?lejasDisponibles=" + str, true);
    /*Mandamos al PHP encargado de traer los datos, el valor de referencia */
    xmlhttp.send();
}// muestra
