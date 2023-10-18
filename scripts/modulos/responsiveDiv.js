const d = document;
// Capturamos todos los elementos que tengan la clase
const responsiveDiv = document.querySelectorAll('.responsiveDiv');
export default function resizeForSquareAppearance(event){
    responsiveDiv.forEach((element) => {
        // Modifica la altura a partir de la anchura del elemento
        element.style.height = `${element.clientWidth}px`;
    })
}