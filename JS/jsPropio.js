/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function reset() {
                  document.getElementById("miFormulario").reset();
            }
function cambia(){ //debido a que poniendo disabled en color, este no me deja leerlo en controlador pongo esto para que le quite el disabled en el mismo momento de enviarlo
            document.getElementById("color").removeAttribute("disabled");
        }