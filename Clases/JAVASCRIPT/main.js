console.log("Holiwis");

let elementoDOM = document.getElementById('textoSaludo');
console.log(elementoDOM);

let contenidoDOM = document.querySelector('#contenido');
console.log(contenidoDOM);

const btnApretable = document.querySelector('#botonMagico')

const btnArraycito = document.querySelector('#btnArraycito')



console.log(elementoDOM.innerHTML);
console.log(elementoDOM.innerText);

elementoDOM.innerHTML = "<h2>Chauchis</h2>"

contenidoDOM.innerHTML = "<h3>Este texto esta inyectado con JS</h3>"

//Metodos Elementos
btnApretable.addEventListener('click',() => {
    alert('Avada Kedavra')
    console.log("funcionó el boton");
    let dato = prompt("Ingresame tu nombre porfa. No preguntes pa que")
    console.log(dato);
})

//Meotodo Js
//Almacenar datos en local para el usuario
let arraycito = [1,2,3];
console.log(arraycito);

//localStorage -> almacenamiento local del usuario
//LocalStorage -> diseñado para guardar objetos
localStorage.setItem('arraycito',JSON.stringify(arraycito));
let datita = localStorage.getItem('arracito');

//mostramos los datos del localStorage que son un string
console.log(datita);
//devolver la data a su tipo original
let datitaArray = JSON.parse(datita);
console.log(datitaArray);


btnArraycito.addEventListener('click',() => {
    console.log("Estoy andando");
    arraycito.push(4);
    console.log(arraycito);

    localStorage.setItem('arraycito',JSON.stringify(arraycito));
    console.log(localStorage.getItem('arraycito'));

})
