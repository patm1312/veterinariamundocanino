 export default function responsiveHistorial(){
    //funcion del  window, para la tabala de historial medico rsponsive
    let ancho = window.innerWidth;
    function responsive(ancho){
        console.log('responsive historial')
        //si el ancho es mejor o  igual a 730,
        const $divTableBig = document.getElementById('HmedicoB');
        const $divTableSmall= document.getElementById('HmedicoS');
        if(ancho <= 1000){
            $divTableSmall.classList.add('blockH');
            $divTableBig.classList.remove('blockH');
        }else{
            $divTableSmall.classList.remove('blockH');
            $divTableBig.classList.add('blockH');

            $divTableBig.classList.add('noneH');
            $divTableSmall.classList.remove('blockH');
          
        }
    }//ejecuto  la funcion con el parametro
    responsive(ancho);
    //la funcion se ejecuta tambien cuando se redimensiona el tamaño  del navegador: ver documentacion 1.
    window.addEventListener("resize", (e)=>{
        ancho = window.innerWidth;
        responsive(ancho)
    })
    
}