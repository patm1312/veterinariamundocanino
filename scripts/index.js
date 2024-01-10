import modal from "./modulos/modal.js";
import Dig_form from "./modulos/validarFormDig.js";
import contact_form from "./modulos/validarFormulario.js";
import responsiveMenu from "./modulos/hm.js";
 import modalAcciones from "./modulos/modalPerfil.js";
import slider from "./modulos/slider.js";
import smallAdd from "./modulos/sliderAdd.js";
import sliderAdd from "./modulos/sliderAdd.js";
import perfilResponsive from "./modulos/perfil.js";
import resizeForSquareAppearance from "./modulos/responsiveDiv.js";
import filter from "./modulos/filtro.js";
import usuariosAdmin from "./modulos/usuariosAdmin.js";
import adminPublic from "./modulos/adminPublic.js";
import openWindowImg from "./modulos/windowOPen.js";
import form_calendario from "./modulos/calendario.js";
import { Validar_file } from "./modulos/validar__file.js";
const d = document;
//en la variable seccion guardo el resultado de ver si estoy  ejecutando  el modulo de adopta mascota, si es true  es porque encuentra el input hiodden que esta en la pgina de adopta.php, y ejecuto la funcion modal.

if (d.getElementById("adopta_mascota") != null){
        //funcion que se ejecuta para la ventana modal del filtro de adopta mascotas, solo  si estoy  en el modulo de adoptar mascota
        //parametro 1 es el boton de filtrar, el parametro 2, es el  boton de enviar solicitud, el cerrar es la x de cerrar formulario 
        console.log("se eejcuta modal")
        modal(".modalOpen", ".modalClose", ".cerrar");
    }
    
if (d.getElementById("home") != null){
    slider()
    sliderAdd()
    
}
// Evento cuando se redimensiona la ventana
window.addEventListener("resize",(e)=>{
    if (d.getElementById("producto") != null){
        console.log('ejecuta la funcion');
        console.log(d.getElementById("producto"));
        resizeForSquareAppearance(e);
    }else{
        console.log('No');
    }
})
// Evento cuando se carga el contenido
d.addEventListener("DOMContentLoaded",(e)=>{
    if (d.getElementById("producto") != null){
        console.log(d.getElementById("producto"))
        resizeForSquareAppearance(e);
    }else{
        console.log('no');
    }
})
if (d.getElementById("hiddenPerfil") != null){
    d.addEventListener("scroll",(e)=>{
        perfilResponsive();
    })
}
if (d.querySelector(".contact-form") != null){
    contact_form()
}
//se eejcuta la funcion de validar formulario, el de escribir  codigo enviado, solo si es diferente a null:
if (d.querySelector(".formdig") != null){
    Dig_form();
}
    d.addEventListener("click", (e)=>{
         if(e.target.matches('.accion_perfil')){
            console.log('modal accions');
            modalAcciones(e)
        }else{
            //si se da click en algun parte del documento se ejecuta esta funcion que sirve para el menu hm y  el menu grande 
            responsiveMenu(e);
        }
        if (d.getElementById("adopta_mascota") != null){
            //esta funcios se activa solo en el modulo  de adopta mascota para la interaccion con el filtro
            filter(e);
        }
        if (d.getElementById("homeAdmin") != null){
            //esta funcios se activa solo en el modulo  de adopta mascota para la interaccion con el filtro
            usuariosAdmin(e);
            //funcion que abre una imagen en nueva pestaña al hacer click en un icono, en la pagina de admin publicaciones
            openWindowImg(e);
        }
        
        if (d.getElementById("AdminPublic") != null){
            //esta funcios se activa solo en el modulo  de adopta mascota para la interaccion con el filtro
            adminPublic(e);
        }
        if (d.getElementById("input_file") != null){
            //esta funcios se activa solo para validar las imagenes o archivos que envia el usuario
            if(e.target.matches('.input_file--img')){
                // const validarArchivoDimension = new Validar_file();
                // validarArchivoDimension.validar_dimension(e);
            }
        }
    })
    if (d.getElementById("input_file") != null){
        //esta funcios se activa solo para validar las imagenes o archivos que envia el usuario
        const validarArchivo = new Validar_file();
        validarArchivo.validar_tamanio();
    }
    if (d.getElementById("calendario") != null){
        //este escript sirve para  activar o desactivar botn de envio cuando el usuario hace un cambio en los chechbox de pland e vacnacion o desparacitacion
        form_calendario();
    }
