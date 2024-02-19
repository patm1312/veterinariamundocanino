export default function sendF(){
    const $options = document.querySelectorAll('.filter_prod');
    const $form_filter_prod = document.querySelector('.filtro_productos');
    $form_filter_prod.addEventListener('click' ,(e)=>{
        $form_filter_prod.submit();
    })
   
} 