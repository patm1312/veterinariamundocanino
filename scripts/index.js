const d = document;
//menu  de navegacion version movil
const nav = d.querySelector(".nav");
//tamaño del navegador cuando se carga por primera vez el navegador.
let size =  screen.width;
const imglogo = d.querySelector(".header__boxLogo--imgLogo");
const botonCita = d.querySelector(".main__botonCita");
//contenedor de la imagen grande
const container = d.querySelector(".container");
//contenedor de la imagen pequeña
const poster_container = d.querySelector(".poster__description");
//imagen grande y pequeña de los poster de lapagina de home.
const imgPostermayor = d.querySelectorAll(".poster__img--mayor");
const imgPostermenor = d.querySelectorAll(".poster__img--menor");


d.addEventListener("click", (e)=>{
    nav.classList.remove("nav_responsive");
    //si le di click al enlace hm
    if(e.target.matches('.enlace_hm')){
        e.preventDefault();
        nav.classList.toggle("nav_responsive");
    }
})
function responsive(size){
    botonCita.classList.add("poster__img--menor");
    
    if(size < 550){   
        //cuando el tamaño de la ventana del  navegador sea manor a 500muestre la imagen de logo larga
        imglogo.setAttribute("src", "assets/images/logolarge.png");
        //muestre la imagen mas pequeña
        for (let index = 0; index < imgPostermenor.length; index++) {
           imgPostermenor[index].classList.remove("poster__img--menor")
        }
        for (let index = 0; index < imgPostermayor.length; index++) {
            imgPostermayor[index].classList.add("poster__img--mayor")
         }
    }else{
        imglogo.setAttribute("src", "assets/images/logotransp.png");
        for (let index = 0; index < imgPostermenor.length; index++) {
            imgPostermenor[index].classList.add("poster__img--menor")
         }
         for (let index = 0; index < imgPostermayor.length; index++) {
             imgPostermayor[index].classList.remove("poster__img--mayor")
          }
    }
}
responsive(size);
//cada vez que se redimensiona el tamaño  del navegador se ejecuta la funcion.
window.addEventListener('resize',(e)=>{
    responsive(innerWidth)
})
